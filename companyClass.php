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
            echo "User exists";
        }
        else {
            echo "User does not exist";
        }
    }
    
    function register()
    {
        $ret = $this->db->registerStudent($this->user,$this->pass,"company details go here");
        
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