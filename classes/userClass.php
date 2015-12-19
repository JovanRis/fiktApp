<?php

require_once 'db.php';

class User
{
    private $user='';
    private $pass='';
    private $db;
    
    public function __construct()
    {
        $this->db = new DB();
    }
    
    public function getPwHash()
    {
        return $this->pass;
    }
    
    function login($user,$pass)
    {
        $this->user=$user;
        $this->pass=$pass;
        $ret = $this->db->loginStudent($this->user,$this->pass);
        return $ret;
    }
    
    function register($user,$pass,$firstname, $lastname, $email)
    {
        $ret = $this->db->registerStudent($this->user,$this->pass,$firstname, $lastname, $email);
        
        if($ret == true)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
}

?>