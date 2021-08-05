<?php 

 namespace APP\Core;

 use APP\Core\Application;
 
 class Model{
     public function insertData($tablename, $data)
     {
         $keys =  implode(', ' , array_keys($data));

         foreach ($data as $key => $value) {
             if ($key == 'password') {
                 $value = password_hash($value, PASSWORD_DEFAULT);
             }
             $data[$key] = "'" . $value . "'";
         }

         $values = implode(', ', array_values($data));
         
         $inserted =  Application::$app->db->query("INSERT INTO $tablename ($keys) VALUES ($values)");

         return $inserted;
     }

     public function getAllData($tablename)
     {
        $data = Application::$app->db->fetchData("SELECT * FROM $tablename");

        return $data;
     }

     public function getData($tablename, $condition)
     {
        $data = Application::$app->db->fetchData("SELECT * FROM $tablename WHERE $condition");

        return $data;
     }

     public function deleteData()
     {
         
     }

     public function updateData()
     {
         
     }
 }