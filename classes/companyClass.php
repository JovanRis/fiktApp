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
        $this->pass=$pass;
        $this->db = new DB();
    }
    
    public function getPwHash()
    {
        return $this->pass;
    }
    
    function login()
    {
        $ret = $this->db->loginCompany($this->user,$this->pass);
        return $ret;

    }
    
    function register($user,$pass,$details,$email,$imgUrl)
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
    
    public static function getInactiveCompanies(){
        $ret = DB::getInactiveCompanies();
        return $ret;
    }
    
    public static function checkIfApproved($companyID)
    {
        $ret = DB::checkIfApproved($companyID);
        return $ret;
    }
    
    public static function getCompanyInfo($companyID){
        $ret = DB::getCompanyInfo($companyID);
        return $ret;
    }
}

?>