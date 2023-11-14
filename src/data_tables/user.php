<?php
require_once('./data_tables/database.php');

class user extends database{
    public function checkUser($username, $pass){
        $sql = "SELECT * from user where username='{$username}' and password='{$pass}'";
        $result = $this->conn->query($sql);
        if($result->num_rows>0){
            $row = $result->fetch_assoc();
            return $row;
        }
        else{
            return 0;
        }
    }
}


?>