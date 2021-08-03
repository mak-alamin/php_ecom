<?php


class m00003_create_products_table{
    public function up()
    {
        $db = \app\core\Application::$app->db;
        $db->createTable('products',
            "id INT AUTO_INCREMENT PRIMARY KEY,
                cats_id INT(11) NOT NULL,
                name VARCHAR(255) NOT NULL,
                mrp FLOAT(20) NOT NULL,
                price FLOAT(20) NOT NULL,
                qty INT(11) NOT NULL,
                image VARCHAR(255) NOT NULL,
                short_desc TEXT(500) NOT NULL,
                description TEXT(2000) NOT NULL,
                meta_title VARCHAR(255) NOT NULL,
                meta_desc VARCHAR(500) NOT NULL,
                status TINYINT(4) NOT NULL"
        );
    }

    public function down()
    {
        $db = \app\core\Application::$app->db;
        $db->dropTable('products');
    }
}
