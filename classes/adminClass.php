<?php

require_once 'db.php';

class Admin
{
    private $user='';
    private $pass='';
    private $db;
    
    public function __construct($user,$pass)
    {
        $this->user=$user;
        $this->pass=$pass;
        $this->db = new DB();
    }
    
   public function getPwHash()
    {
        return $this->pass;
    }
    
    function login()
    {
        $ret = $this->db->loginAdmin($this->user,$this->pass);
        return $ret;
    }
    
    function createSession($sessionName,$startDate, $endDate)
    {
        $ret = $this->db->createSession($sessionName,$startDate, $endDate);
        
        if($ret == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function approveCompany($companyID){
        return $this->db->approveCompany($companyID);
    }
    
    function approveProject($projectID){
        return $this->db->approveProject($projectID);
    }
    
    function finishProject($projectID){
        return $this->db->finishProject($projectID);
    }
    
}

?>