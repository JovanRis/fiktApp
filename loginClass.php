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
        $ret = $this->db->login($this->user,$this->pass);
        if($ret == true)
        {
            echo "User exists";
        }
        else {
            echo "User does not exist";
        }
        
    }
}

?>