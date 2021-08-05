<?php

namespace APP\Core;

class Database
{

    public $pdo;
    public $stmt;

    public function __construct($host, $dbname, $username, $password)
    {
        try {
            $this->pdo = new \PDO("mysql:host=$host;dbname=$dbname", $username, $password);

            // echo "Connected successfully";

        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function createTable(string $tableName, string $columns)
    {
        $sql = "CREATE TABLE IF NOT EXISTS $tableName ( $columns );";
        $this->pdo->exec($sql);
    }

    public function dropTable(string $tableName)
    {
        $sql = "DROP TABLE $tableName;";
        $this->pdo->exec($sql);
    }

    public function query($sql): bool
    {
        $this->stmt = $this->pdo->prepare($sql);
        return $this->stmt->execute();
    }


    public function fetchData($sql): array
    {
        $this->stmt = $this->pdo->prepare($sql);
        $this->stmt->execute();

        return $this->stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function applyMigrations()
    {
        $this->createMigrationsTable();
        $appliedMigrations = $this->getAppliedMigrations();

        $files = scandir(Application::$rootDir . '/migrations');

        $toApplyMigrations = array_diff($files, $appliedMigrations);

        $newMigrations = [];
        foreach ($toApplyMigrations as $migration) {

            if ($migration === '.' || $migration === '..') {
                continue;
            }

            require_once Application::$rootDir . "/migrations/" . $migration;

            $className = pathinfo($migration, PATHINFO_FILENAME);

            $instance = new $className();

            $this->Log('Applying Migration ' . $migration);

            $instance->up();

            $this->Log('Applied Migration ' . $migration);

            $newMigrations[] = $migration;
        }

        if (!empty($newMigrations)) {
            $this->saveMigrations($newMigrations);
        } else {
            $this->Log('All migrations are applied.');
        }
    }

    public function createMigrationsTable()
    {
        $this->pdo->exec("CREATE TABLE IF NOT EXISTS migrations (
            id INT AUTO_INCREMENT PRIMARY KEY,
            migration VARCHAR (255),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )");
    }

    public function getAppliedMigrations()
    {
        $statement = $this->pdo->prepare("SELECT migration FROM migrations");
        $statement->execute();

        return $statement->fetchAll(\PDO::FETCH_COLUMN);
    }

    public function saveMigrations(array $migrations)
    {
        $migrations = array_map(fn ($m) => "('$m')", $migrations);

        $migrations = implode(',', $migrations);

        $statement = $this->pdo->prepare("INSERT INTO migrations (migration) VALUES 
            $migrations;
        ");

        $statement->execute();
    }

    protected function Log($message)
    {
        echo '[' . date('Y-m-d H-i-s') . '] ' . $message . PHP_EOL;
    }
}
