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
        return $ret;

    }
    
    function register($user,$pwhash,$details,$email,$imgUrl)
    {
        $ret = $this->db->registerCompany($this->user,$this->pass,$details,$email,$imgUrl);
        
        if($ret == true)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
    function createProject($projectName,$category,$discription,$companyID)
    {
        $ret = $this->db->createProject($projectName,$category,$discription,$companyID);
        
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