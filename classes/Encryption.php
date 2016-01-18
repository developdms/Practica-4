<?php

class Encryption {

    public static function base64Encrypt($string, $key) {
        $result = '';
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) + ord($keychar));
            $result.=$char;
        }
        return base64_encode($result);
    }

    public static function base64Decrypt($string, $key) {
        $result = '';
        $string = base64_decode($string);
        for ($i = 0; $i < strlen($string); $i++) {
            $char = substr($string, $i, 1);
            $keychar = substr($key, ($i % strlen($key)) - 1, 1);
            $char = chr(ord($char) - ord($keychar));
            $result.=$char;
        }
        return $result;
    }
    
    public static function md5Encrypt($string, $key = NULL) {
        if ($key !== NULL){
            return md5($string.$key);
        }
        return md5($string);
    }
    
    public static function sha1Encrypt($string, $key = NULL) {
        if ($key !== NULL){
            return sha1($string.$key);
        }
        return sha1($string);
    }

}
