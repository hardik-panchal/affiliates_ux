<?php

/**
 * User Class
 * 
 * User login
 * 
 
 * @version 1.0
 * @package LySoft
 * 
 */
class User {
    # constructor

    public static $user_data = array();

    public function __construct() {
        
    }


    /**
     * Checks the login
     * @param String $user_name
     * @param String $password
     * @return boolean
     */
    public static function doLogin($user_name, $password) {
        $password = md5($password);
        self::$user_data = qs("select * from users where (email = '{$user_name}' OR user_name = '{$user_name}' ) and password = '{$password}'");        
        return empty(self::$user_data) ? false : true;
    }

    /**
     *
     * @param String $user_name
     */
    public static function setSession($user_name) {
        // d(self::$user_data);
        $_SESSION['user'] = self::$user_data;
    }

    /**
     *  Kill the session
     */
    public static function killSession() {
        session_destroy();
        unset($_SESSION);
    }

    function generate_password($length = 12, $special_chars = true) {
        $chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
        if ($special_chars)
            $chars .= '!@#$%^&*()';
        $password = '';
        for ($i = 0; $i < $length; $i++)
            $password .= substr($chars, mt_rand(0, strlen($chars) - 1), 1);
        return $password;
    }

}

?>