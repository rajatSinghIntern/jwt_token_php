<?php
class database{
    public $conn;
    public function __construct(){
        $this->conn = new mysqli("localhost", "root", "", "test");
        if($this->conn->connect_error){
            echo("Could not Connect: {$this->conn->connect_error}.");
            die;
        }
    }
}

?>