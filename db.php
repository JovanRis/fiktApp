<?php

class DB
{
    
    private static $conn;

    public function __construct()
    {
        $this->conn = new mysqli("localhost","root","7076","fiktApp");
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

    }
    
    function login($user,$pwhash)
    {
        $sql = "SELECT *
                FROM `Students`
                WHERE `Username` LIKE '".$user."'";
                
        $result = $this->conn->query($sql);
        $r = $result->fetch_assoc();

        mysql_free_result($result);
        
        if($user == $r['Username'] && $pwhash == $r['pwHash'])
        {
            return true;
        }
        else {
            return false;
        }
    }
}




?>