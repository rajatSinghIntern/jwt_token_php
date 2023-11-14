<?php
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
require_once('../vendor/autoload.php');

class jwt_token{
    public function getToken($uid, $username, $domainName, $secret_key, $start_time, $valid_from, $expire_at, $algo){
        // data preparation
        $request_data = [
            'iat' => $start_time,
            'iss' => $domainName,
            'nbf' => $valid_from,
            'exp' => $expire_at,
            'userName' => $username,
            'uid' => $uid
        ];
    
        $jwt = JWT::encode($request_data, $secret_key, $algo);
        return $jwt;
    }

    public function getData($token, $secret_key, $algo){
        $key = new Key($secret_key, $algo);
        $data = JWT::decode($token, $key);
        return $data;
    }
}
?>