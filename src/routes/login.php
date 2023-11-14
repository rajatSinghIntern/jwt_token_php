<?php
require_once('../vendor/autoload.php');
require_once('./data_tables/user.php');
require_once('./token/jwt_token.php');

class login{
    public function doLogin($username, $pass){
        $user = new user();
        $row = $user->checkUser($username, $pass);
        if($row){
            $secret_key = "i.am.noob";
            echo("Id username email password<br>");
        
            $uid = $row["id"];
            $date   = new DateTimeImmutable();
            $start_time = $date->getTimestamp();
            $valid_from = $date->getTimestamp();
            $expire_at = $date->modify('+6 minutes')->getTimestamp();
            $domainName = "i.am.noob";
            $algo = 'HS512';
        
            
            $tok = new jwt_token();
            $jwt = $tok->getToken($uid, $username, $domainName, $secret_key, $start_time, $valid_from, $expire_at, $algo);
            $output = array('status' => 'login ok', 'token' => $jwt);
            print_r(json_encode($output));
        }
            
        else{
            $output = array('status' => 'login failed', 'reson' => 'wrong credentials.');
            print_r(json_encode($output));
        }
    }
}

?>