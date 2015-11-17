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
        //$this->pass=md5($pass);
        $this->pass=$pass;  // S: Ovde e bez md5 oti direktno e vnesen pass vo db
        $this->db = new DB();
    }
    
    function login()
    {
        $ret = $this->db->loginAdmin($this->user,$this->pass);
        return $ret;
    }
    
}

?>