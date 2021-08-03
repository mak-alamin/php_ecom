<?php


class m00002_create_categories_table{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $db->createTable('categories',
            "id INT AUTO_INCREMENT PRIMARY KEY,
                name VARCHAR(255) NOT NULL,
                product_ids INT(11) NOT NULL,
                image VARCHAR(255) NOT NULL,
                description TEXT(2000) NOT NULL,
                status TINYINT(4) NOT NULL"
        );
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $db->dropTable('categories');
    }
}
