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
    
    
    
    
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Student Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
    
    
    
    
    function loginStudent($user,$pwhash)
    {
        $sql = "SELECT *
                FROM `Student`
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
    
    function registerStudent($user,$pwhash,$firstname, $lastname, $email)
    {
        $sql = "INSERT INTO `Student`(`Username`, `pwHash`, `firstname`, `lastname`, `email`) VALUES ('".$user."','".$pwhash."','".$firsname."','".$lastname."','".$email."')";
        echo $sql;
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    
    
    
    
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Company Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
    
    
        function loginCompany($user,$pwhash)
    {
        $sql = "SELECT *
                FROM `Company`
                WHERE `CompanyName` LIKE '".$user."'";
                
        $result = $this->conn->query($sql);
        $r = $result->fetch_assoc();

        mysql_free_result($result);
        
        if($user == $r['CompanyName'] && $pwhash == $r['CompanyPass'])
        {
            return true;
        }
        else {
            return false;
        }
    }
    
    
        function registerCompany($user,$pwhash,$details,$email,$imgUrl)
    {
        $sql = "INSERT INTO `Company`(`CompanyName`, `CompanyPass`, `CompanyDetails`, `email`, `imgUrl`) VALUES ('".$user."','".$pwhash."','".$details."','".$email."','".$imgUrl."')";
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