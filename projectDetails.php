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
    
        <h2> <?php echo $currentProject['ProjectName'];?> </h2>
        <div> <?php echo $currentProject['Category']; ?> </div>
        <p> <?php echo $currentProject['Discription']; ?> </p>    
        
        <div><?php echo $companyDetails['CompanyName'] ?></div>
        <div><?php echo $companyDetails['CompanyDetails'] ?></div>
        <div style = "height:200px; width: 350px;"><img src="<?php echo $companyDetails['imgUrl'] ?>" alt="companyImg" style="max-height:100%; max-width:100%;"></div>
        
        
        <div>
        Currently signed up:
        <?php 
        
        foreach($currentProject['SignedUp'] as $student){                           //Prijaveni studenti
            echo "<div>".$student['firstname']." ".$student['lastname']."</div>";
        }
        ?>
        
        </div>
        
        <?php
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