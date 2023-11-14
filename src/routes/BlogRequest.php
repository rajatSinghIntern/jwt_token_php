<?php
require_once('../vendor/autoload.php');
require_once('./data_tables/blog.php');
require_once('./token/jwt_token.php');

class BlogRequest{
    public function getBlog($token){
        $secret_key = "i.am.noob";
        $algo = 'HS512';
        $token_obj = new jwt_token();
                
        $data = $token_obj->getData($token, $secret_key, $algo);
        $uid = $data->uid;
    
        $blogs = new blog();
        $out = $blogs->getBlogs($uid);
    
        if($out != 0){
            return(json_encode($out));
        } else{
            $output = array('status' => 'failed', 'reason' => 'something went wrong');
            return(json_encode($output));
        }    
    }
}
?>
