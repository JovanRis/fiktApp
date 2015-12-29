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
        
    if (!mysqli_set_charset($this->conn, "utf8")) {
        printf("Error loading character set utf8: %s\n", mysqli_error($this->conn));
        exit();
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
        $user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        
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
        $user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        $firstname = $this->conn->real_escape_string($firstname);
        $lastname = $this->conn->real_escape_string($lastname);
        $email = $this->conn->real_escape_string($email);
        
        $sql = "INSERT INTO `Student`(`Username`, `pwHash`, `firstname`, `lastname`, `email`) VALUES ('".$user."','".$pwhash."','".$firstname."','".$lastname."','".$email."')";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    function getStudentProjects($studentID){
        
        $studentID = $this->conn->real_escape_string($studentID);
        
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
        $user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        
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
        $user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        $details = $this->conn->real_escape_string($details);
        $email = $this->conn->real_escape_string($email);
        $imgUrl = $this->conn->real_escape_string($imgUrl);
        
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
        $projectName = $this->conn->real_escape_string($projectName);
        $category = $this->conn->real_escape_string($category);
        $discription = $this->conn->real_escape_string($discription);
        $companyID = $this->conn->real_escape_string($companyID);
        
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
        $companyID = $this->conn->real_escape_string($companyID);
        
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
            $companyID = $this->conn->real_escape_string($companyID);
        
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
        $companyID = $this->conn->real_escape_string($companyID);
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
        $sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, p.completed, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE p.active = 1 and p.completed = 0 ";
        
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
        $Category = $this->conn->real_escape_string($Category);
        $sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE `Category` = '".$Category."' AND p.active = 1 and p.completed = 0 ";
        
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
        $project_id = $this->conn->real_escape_string($project_id);
        $student_id = $this->conn->real_escape_string($student_id);
        $sql = "INSERT INTO `SignUps`(`fk_projectId`, `fk_studentId`) VALUES ('".$project_id."','".$student_id."')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    function deleteStudentFromSignups($studentID){
        $studentID = $this->conn->real_escape_string($studentID);
        $sql = "DELETE FROM `SignUps` WHERE fk_studentId = '".$studentID."'";
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
        $projectID = $this->conn->real_escape_string($projectID);
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
        
        
        $sql = "SELECT * from `ProjectComments` WHERE `fk_ProjectID` = '".$projectID."'";
        $result = $this->conn->query($sql);
        $r2 = array();
        if ($result->num_rows > 0) {
        // output data of each row
            while($row = $result->fetch_assoc()) {
            array_push($r2,$row);
            }
        } else {
            $r1 = "There are no comments";
        }
        
        
        
        $r = $r[0];
        $r['SignedUp'] = $r1;
        $r['comments'] = $r2;
        return $r;
        
    }
    
    
        function getCompletedProjects(){
        $sql = "SELECT p.id_pk, p.ProjectName, p.Category, p.Discription, c.CompanyName, p.completed, (SELECT count( * )FROM SignUps WHERE fk_projectId = p.id_pk) as cnt
                FROM `Project` p
                LEFT JOIN `Company` c ON p.fk_CompanyID = c.id_pk
                WHERE p.completed = 1 ";
        
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
    
    function addProjectComment($projectID,$comment,$clientTime){
        $comment = $this->conn->real_escape_string($comment);
        $projectID = $this->conn->real_escape_string($projectID);
        $clientTime = $this->conn->real_escape_string($clientTime);
        
        $sql = "INSERT INTO `ProjectComments`(`fk_ProjectID`, `Date_Created`, `Comment`) VALUES ('".$projectID."','".$clientTime."' ,'".$comment."')";
        
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    



    ///////////////////////////////////////////////////////////////////////////
    //////////////////////////////Admin Part///////////////////////////////////
    ///////////////////////////////////////////////////////////////////////////

function loginAdmin($user,$pwhash)
    {
        $user = $this->conn->real_escape_string($user);
        $pwhash = $this->conn->real_escape_string($pwhash);
        
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
        $companyID = $this->conn->real_escape_string($companyID);
        $sql = "UPDATE `fiktApp`.`Company` SET `active` = '1' WHERE `Company`.`id_pk` = '".$companyID."'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    function approveProject($projectID){
        $projectID = $this->conn->real_escape_string($projectID);
        $sql = "UPDATE `fiktApp`.`Project` SET `active` = '1' WHERE `Project`.`id_pk` = '".$projectID."'";
        if ($this->conn->query($sql) === TRUE) {
            return true;
        } else {
            echo "Error: " . $sql . "<br>" . $this->conn->error;
            return false;
        }
    }
    
    function finishProject($projectID){
        $projectID = $this->conn->real_escape_string($projectID);
        $sql = "UPDATE `Project` SET `completed` = '1' WHERE `Project`.`id_pk` = '".$projectID."'";
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
        $sessionName = $this->conn->real_escape_string($sessionName);
        $startDate = $this->conn->real_escape_string($startDate);
        $endDate = $this->conn->real_escape_string($endDate);
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