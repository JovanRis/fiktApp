<?php

require_once 'db.php';

class Company
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
        $ret = $this->db->loginCompany($this->user,$this->pass);
        if($ret == true)
        {
            return true;
        }
        else {
            return false;
        }
    }
    
    function register($user,$pwhash,$details,$email,$imgUrl)
    {
        $ret = $this->db->registerCompany($user,$pwhash,$details,$email,$imgUrl);
        
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