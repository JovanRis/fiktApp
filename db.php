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
    
    public function __destruct()
    {
        $this->conn->close();
    }
    
    function loginStudent($user,$pwhash)
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
    
    function registerStudent($user,$pwhash)
    {
        $sql = "INSERT INTO `Students`(`Username`, `pwHash`) VALUES ('".$user."','".$pwhash."')";
        echo $sql;
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
}




?>