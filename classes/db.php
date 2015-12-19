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
    
    function getStudentProjects($studentID){
        $sql = "SELECT `id_pk`
                FROM Project p LEFT JOIN SignUps su ON p.id_pk = su.fk_projectId
                WHERE su.fk_studentId = '".$studentID."'";
                
                $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row['id_pk']);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;
                
        
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
    
    public function getInactiveCompanies(){
    
        
        $sql = "SELECT * from `Company` WHERE `active` = '0' ";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }
        mysql_free_result($result);

        return $r;
    }
    
    public function checkIfApproved($companyID){
        
        $sql = "SELECT `active` FROM `Company` WHERE `id_pk` = '".$companyID."'";
        $result = $this->conn->query($sql);
                
        if ($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            return $r['active'];
        
        } else {
            return 0;
        }
    }
    
        public function getCompanyInfo($companyID){
        
        $sql = "SELECT `CompanyName`,`CompanyDetails`,`imgUrl` FROM `Company` WHERE `id_pk` = '".$companyID."'";
        $result = $this->conn->query($sql);
                
        if ($result->num_rows > 0) {
            $r = $result->fetch_assoc();
            return $r;
        
        } else {
            return 0;
        }
        
    }
    
    function getCompanyProjects($companyID){
        $sql = "SELECT `id_pk`
                FROM Project p 
                WHERE p.fk_companyID = '".$companyID."'";
                
                $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row['id_pk']);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;
                
        
    }
    
    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Project Part/////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////
    
    function getAllProjects(){
        $sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE p.active = 1 ";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;
    }
    
    function getProjectByCategory($Category){
        $sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE `Category` = '".$Category."' AND p.active = 1 ";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }

        mysql_free_result($result);
        
        return $r;
    }
    
    function signUpForProject($project_id,$student_id){
        $sql = "INSERT INTO `SignUps`(`fk_projectId`, `fk_studentId`) VALUES ('".$project_id."','".$student_id."')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    public function getInactiveProjects(){
        
        $sql = "SELECT * from `Project` WHERE `active` = '0' ";

        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }
        mysql_free_result($result);

        return $r;
    }
    
    function getprojectByID($projectID){
        $sql = "SELECT * from `Project` Where `id_pk` = '".$projectID."'";
        
        $result = $this->conn->query($sql);
        $r = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r,$row);
            }
        } else {
            return -1;
        }
        
        $sql = "SELECT st.firstname,st.lastname, st.email FROM `SignUps` as si left join Student as st on si.fk_studentid = st.id_pk WHERE si.fk_projectid = '".$projectID."'";
        
        $result = $this->conn->query($sql);
        $r1 = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r1,$row);
            }
        } else {
            $r1 = "There are no signed up students";
        }
        
        
        $r = $r[0];
        $r['SignedUp'] = $r1;
        return $r;
        
    }
    


    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Admin Part///////////////////////////////////
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
    
    function approveCompany($companyID){
        $sql = "UPDATE `fiktApp`.`Company` SET `active` = '1' WHERE `Company`.`id_pk` = '".$companyID."'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    function approveProject($projectID){
        $sql = "UPDATE `fiktApp`.`Project` SET `active` = '1' WHERE `Project`.`id_pk` = '".$projectID."'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
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