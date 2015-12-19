    <?php
    require_once "header.php";
    require_once "classes/projectClass.php";
    require_once "classes/companyClass.php";
    
    $studentsPerProject = 5;
    
    $projectObj = new Project();
   
    if (isset($_GET['signup'])) {   //if signing up for project execute this
        if(isset($_SESSION['userID'])){
        $r = $projectObj->signUpForProject($_GET['signup'],$_SESSION['userID']);
        if($r){
            echo "<div style ='margin:50px;'>Signed up successfully!</div>";
        }
        else {
            echo "<div style ='margin:50px;'>Signup failed!</div>";
        }
        }
        else{
            echo "<div style ='margin:50px;'>Please sign In</div>";             //ova ne se gleda bez margini
        }
        
    }
    else{   //if not signing up execute this
    $projectID = $_GET['pid'];
    $currentProject = $projectObj->getProjectByID($projectID);
        
    $companyObj = new Company();
    $companyDetails = $companyObj->getCompanyInfo($currentProject['fk_CompanyID']);
    //print_r ($companyDetails);
    
    ?>
    
    
    <div id='main'>
    
        <h2><?php echo $currentProject['ProjectName']; ?></h2>                      <?//detali za proekto ?>
        <?php echo $currentProject['Category']; ?>
        <p><?php echo $currentProject['Discription']; ?></p>    
        
        <?php echo $companyDetails['CompanyName'] ?>                                <?//detali za kompanijata so proekto ?>
        <?php echo $companyDetails['CompanyDetails'] ?>
        <img src="<?php echo $companyDetails['imgUrl'] ?>" alt="companyImg">
        
        
        
        <?php 
        
        foreach($currentProject['SignedUp'] as $student){                           //Prijaveni studenti
            echo $student['firstname']." ".$student['lastname']."<br>";
        }
        
        
        
        if(count($currentProject['SignedUp']) < $studentsPerProject){               //button za signup ako ima mesto
        ?>
            <button type='button' style='margin-right: 60px;' class='btn btn-success btn-md' onclick="location.href='?signup= <?php echo $projectID ?>'">Sign Up</button>
       <?php 
        }
        ?>
    
    </div>
    
    <?php 
    } 
    ?>
    
    
    <?php
        include ("footer.php");
    ?>