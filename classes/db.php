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
            return $r['id_pk'];
        }
        else {
            return -1;
        }
    }
    
    function registerStudent($user,$pwhash,$firstname, $lastname, $email)
    {
        $sql = "INSERT INTO `Student`(`Username`, `pwHash`, `firstname`, `lastname`, `email`) VALUES ('".$user."','".$pwhash."','".$firstname."','".$lastname."','".$email."')";
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
                WHERE `CompanyName` = '".$user."'";

                
        $result = $this->conn->query($sql);
        $r = $result->fetch_assoc();

        mysql_free_result($result);

        if($user == $r['CompanyName'] && $pwhash == $r['CompanyPass'])
        {
            return $r['id_pk'];
            
        }
        else {
            return -1;
        }
    }
    
    
        function registerCompany($user,$pwhash,$details,$email,$imgUrl)
    {
        $sql = "INSERT INTO `Company`(`CompanyName`, `CompanyPass`, `CompanyDetails`, `email`, `imgUrl`) VALUES ('".$user."','".$pwhash."','".$details."','".$email."','".$imgUrl."')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    function createProject($projectName,$category,$discription,$companyID)
    {
        $sql = "INSERT INTO `Project`(`ProjectName`, `Category`, `Discription`, `fk_CompanyID`) VALUES ('".$projectName."','".$category."','".$discription."','".$companyID."')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Project Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
    function getAllProjects(){
        $sql = "SELECT p.pk_id,p.ProjectName,p.Category,p.Discription,c.CompanyName FROM `Project` p JOIN `Company` c ON p.pk_id = c.id_pk WHERE 1";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            echo "0 results";
        }

        mysql_free_result($result);
        
        return $r;
    }
    
    function getProjectByCategory($Category){
        $sql = "SELECT p.pk_id,p.ProjectName,p.Category,p.Discription,c.CompanyName FROM `Project` p JOIN `Company` c ON p.pk_id = c.id_pk WHERE `Category` = '".$Category."'";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            echo "0 results";
        }

        mysql_free_result($result);
        
        return $r;
    }
    


    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Admin Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

function loginAdmin($user,$pwhash)
    {
        $sql = "SELECT *
                FROM `Admin`
                WHERE `Username` LIKE '".$user."'";
                
        $result = $this->conn->query($sql);
        $r = $result->fetch_assoc();

        mysql_free_result($result);

        if($user == $r['Username'] && $pwhash == md5($r['Password']))
        {
            return $r['id_pk'];
        }
        else {
            return -1;
        }
    }
    
    
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Session Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

    function createSession($sessionName,$startDate, $endDate)
    {
        echo $sessionName; echo "<br>";
        echo $startDate; echo "<br>";
        echo $endDate; echo "<br>";
        $sql = "INSERT INTO `Session`(`SessionName`, `StartDate`, `EndDate`) VALUES ('".$sessionName."','".$startDate."','".$endDate."')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
}
?>