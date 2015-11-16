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
    
}

?>