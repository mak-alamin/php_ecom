<?php


class m00001_users
{
    public function up()
    {
        echo 'Applying Migration' . PHP_EOL;
        $db = \app\core\Application::$app->db;

        $sql = "CREATE TABLE  users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        name VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        phone VARCHAR(255) NOT NULL,
        password VARCHAR(255) NOT NULL
    );";

        $db->pdo->exec($sql);
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;

        $sql = "DROP TABLE users;";
        $db->pdo->exec($sql);
    }
}
