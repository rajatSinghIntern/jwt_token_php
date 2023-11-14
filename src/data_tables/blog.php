<?php
require_once('./data_tables/database.php');

class blog extends database{
    public function getBlogs($uid){
        $sql = "SELECT * from blogs where uid='{$uid}'";

        $result = $this->conn->query($sql);
    
        if($result->num_rows > 0){
            $out = array();
            while($row = $result->fetch_assoc()){
                $out[$row['title']] = $row['content'];
            }
            return $out;
        }
        else{
            return 0;
        }
    }
}
?>