<?php

/**
 * Config Class
 * 
 * Class to handle config operations
 * 
 * 
 */
class Config {

    /**
     * Mechanism to access variable globally
     * @var Array $_vars
     */
    public static $_vars = array();


    # constructor

    public function __construct() {
        
    }

    

    public static function Getdata() {
        //return qs("SELECT * FROM config");
    }


}

?>