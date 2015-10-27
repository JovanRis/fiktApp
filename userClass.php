<?php

require 'db.php';

class User
{
    private $user='';
    private $pass='';
    private $db;
    
    public function __construct($user,$pass)
    {
        $this->user=$user;
        $this->pass=md5($pass);
        $this->db = new DB();
    }
    
    function login()
    {
        $ret = $this->db->loginStudent($this->user,$this->pass);
        if($ret == true)
        {
            echo "User exists";
        }
        else {
            echo "User does not exist";
        }
    }
    
    
    function register($user,$pwhash,$firstname, $lastname, $email)
    {
        $ret = $this->db->registerStudent($user,$pwhash,$firstname, $lastname, $email);
        
        if($ret == true)
        {
            echo "<br> user registered successfully";
        }
        else
        {
            echo "<br> registration failed";
        }
        
    }
}

?>