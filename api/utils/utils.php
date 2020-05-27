<?php
require_once '../vendor/autoload.php';

define("USERS_ROOT", dirname(dirname(__DIR__)).'\\users');
define("HTTP", "http://");
define("USERS", "users");

class Utils
{
    public static function verify_google_token($token) {
        $client_id = "55827698592-8qj8mci54h1k0jboe3nlc1b6bsl2rl9d.apps.googleusercontent.com";
        $client = new Google_Client(['client_id' => $client_id]);
        return $client->verifyIdToken($token);
    }

    public static function create_dir($email){
        $path = USERS_ROOT.'/'.$email;
        if(!file_exists($path))
            mkdir($path);
        return USERS_ROOT;
    }

    public static function remove_dir($email) {
        $path = USERS_ROOT.'/'.$email;
        self::delete_files($path);
    }

    private static function delete_files($target){
        if(is_dir($target) === true){
            $content = scandir($target);
            unset($content[0], $content[1]);
            foreach ($content as $c => $contentName) {
                $current = $target.'/'.$contentName;
                $filetype = filetype($current);

                if($filetype == 'dir') {
                    self::delete_files($current);
                } else {
                    unlink($current);
                }

                unset($content[$c]);
            }
            rmdir($target);
        }
    }

    public static function get_image_path($db_image_path) {
        return HTTP.Connectivity::getHost().'/'.USERS.'/'.$db_image_path;
    }

    public static function load_image($path, $img_encoded, $img_name){
        list($_, $img_encoded) = explode(';', $img_encoded);
        list(, $img_encoded)   = explode(',', $img_encoded);
        $img_encoded = base64_decode($img_encoded);
        $img_path = $path.'/'.$img_name;
        file_put_contents($img_path, $img_encoded);
        return USERS_ROOT.$path.'/'.$img_name;
    }
}