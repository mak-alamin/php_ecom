<?php


class m00001_users{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $db->createTable('users',
            "id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                email VARCHAR(255) NOT NULL,
                username VARCHAR(255) NOT NULL,
                phone VARCHAR(255) NOT NULL,
                password VARCHAR(255) NOT NULL,
                role ENUM('super_admin', 'admin', 'editor', 'contributor', 'author', 'customer', 'subscriber') NOT NULL"
        );
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $db->dropTable('users');
    }
}
