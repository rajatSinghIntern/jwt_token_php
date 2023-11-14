<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('../vendor/autoload.php');
require_once('./routes/login.php');
require_once('./routes/BlogRequest.php');

if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $username = $_REQUEST['username'];
    $pass = $_REQUEST['password'];

    $l = new login();
    $l->doLogin($username, $pass);
}
else if($_SERVER['REQUEST_METHOD'] === 'GET'){
    $headers = getallheaders();
    if(!isset($headers["Authorization"])){
        print_r(json_encode(array('status'=>'failed', 'message'=>'jwt token not present in headers.')));
        die;
    }
    $token = $headers["Authorization"];
    $b = new BlogRequest();
    $b->getBlog($token);
}
else{
    print_r(json_encode(array('status'=>'failed request', 'message'=>'request type not allowed!')));
}

?>