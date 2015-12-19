<?php

require_once 'db.php';

class Company
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
        $ret = $this->db->loginCompany($this->user,$this->pass);
        return $ret;

    }
    
    function register($user,$pass,$details,$email,$imgUrl)
    {
        $ret = $this->db->registerCompany($user,$pass,$details,$email,$imgUrl);
        
        if($ret == true)
        {
            return true;
        }
        else
        {
            return false;
        }
        
    }
    
    public function getInactiveCompanies(){
        $ret = $this->db->getInactiveCompanies();
        return $ret;
    }
    
    public function checkIfApproved($companyID)
    {
        $ret = $this->db->checkIfApproved($companyID);
        return $ret;
    }
    
    public function getCompanyInfo($companyID){
        $ret = $this->db->getCompanyInfo($companyID);
        return $ret;
    }
    
    function getActiveProjects($companyID){
        $currentProjectIDs = $this->db->getCompanyProjects($companyID);
    //print_r($currentProjectIDs);
        $currentProjects = array();
        for($i=0;$i<count($currentProjectIDs);$i++){
            array_push($currentProjects,$this->db->getprojectByID($currentProjectIDs[$i]));
        }
        return $currentProjects;
    }
}

?>