<?php

require_once 'db.php';

class Project{
    
    public function __construct()
    {
        $this->db = new DB();
    }
    
    function getProjects($Category){
        if($Category == 'all'){
            return $this->db->getAllProjects();
        }
        else {
            return $this->db->getProjectByCategory($Category);
        }
    }
    
    function signUpForProject($project_id,$student_id){
                
        return $this->db->signUpForProject($project_id,$student_id);
    }
    
    function createProject($projectName,$category,$discription,$companyID)
    {
        $ret = $this->db->createProject($projectName,$category,$discription,$companyID);
        
        if($ret == true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }
    
    function getProjectByID($projectID){
        $ret = $this->db->getProjectByID($projectID);
        return $ret;
    }
    
    public function getInactiveProjects(){
        $ret = $this->db->getInactiveProjects();
        return $ret;
    }
    
}

?>