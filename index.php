    <?php       
        require_once("header.php");         
     ?>
     
     <?php
     if(isset($_SESSION['userType'])){
         if($_SESSION[userType] == 'student'){
            require_once("classes/userClass.php");
            $studentObj = new User();
            $projects = $studentObj->getActiveProjects($_SESSION['userID']);
            //print_r($projects);
            ?> 
            <div id="main">
            <?php
            
            foreach($projects as $project){
                ?>
                <div class="panel panel-success">
                    <div  class="panel-heading"><?php echo $project['ProjectName'] ?></div>
                    <div class="panel-body"><?php echo $project['Discription'] ?></div>
                    <div>
                    <?php
                    foreach($project['SignedUp'] as $colegue){
                        ?>
                            <div class="panel-footer"> <?php echo $colegue['firstname']." ".$colegue['lastname']." ".$colegue['email']; ?> </div>
                        <?php
                    }
                    ?>
                    </div>
                    
                    <div>
                    Comments:
                    <?php 
                    
                    foreach($project['comments'] as $comment){                           //komentari od kompanija
                        echo "<div class='panel-footer' >".$comment['Comment']." ".$comment['Date_Created']."</div>";
                    }
                    ?>
                    </div>
                    
                </div>
                <?php
            }
            ?>
            </div>
            <?php
         }
         if($_SESSION['userType']=='company'){
            require_once("classes/companyClass.php");
            $companyObj = new Company();
            $projects = $companyObj->getActiveProjects($_SESSION['companyID']);
            
            ?> 
            <div class="container">
            <?php
            foreach($projects as $project){
                ?>
                <div>
                    <div class="container text-left"><h3><?php echo $project['ProjectName'] ?></h3></div>
                    <div class="container text-left"><p><?php echo $project['Discription'] ?></p></div>
                    <div class="container text-left">
                    <?php
                    if(is_array($project['SignedUp'])){
                    foreach($project['SignedUp'] as $colegue){
                        ?>
                            <div class="container text-left"> <?php echo $colegue['firstname']." ".$colegue['lastname']." ".$colegue['email']; ?> </div>
                        <?php
                    }}
                    else{
                        echo $project["SignedUp"];
                    }
                    ?>
                    </div>
                </div>
                <?php
            }
            ?>

            <?php
         }
     }
     else{
     ?>

    <div id='main' class = 'container'>
      <div class="col-md-12">
    <?php

        require_once("classes/projectClass.php");
           
        $projectObj = new Project();
        $projects;
    
    $projects = $projectObj->getCompletedProjects();
    //print_r($projects);

    ?>
    
        <div class="well">
        <?php
            $p = 1;
            for ($i = 0; $i < count($projects) / 3; $i++) {
                echo "<div class='row'>";
                for ($q = 0; $q < 3; $q++) {
	                if ($p > count($projects)) {
		                continue;
	                }
        ?>
        
            <div class="col-xs-6 col-sm-4">
                <div class="panel-group">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h4 class="panel-title">
                                <a data-toggle="collapse" href="#collapse<?php
                            echo $p; ?>"> <?php
                            echo $projects[$p - 1]['ProjectName'] ?> </a>
                            </h4>
                        </div>
                        <div id="collapse<?php
	    	                    echo $p; ?>" class="panel-collapse collapse">
	                        <div class="panel-body"> <?php
	    	                    echo $projects[$p - 1]['Discription'] . "<br />";
	    	                    echo "<b>" . $projects[$p - 1]['CompanyName'] . "</b>";?>                  
	                        </div>

	                        <div class="panel-footer" style='text-align: right;'> <?php
	                    	echo htmlspecialchars_decode("<button type='button' style='margin-right: 60px;' class='btn btn-success btn-md' onclick= &quot; location.href='projectDetails.php?pid=" . $projects[$p - 1]['id_pk'] . "' &quot; >Details</button>") ?>
	                    	
			                </div>

                    	</div>
                	</div>
            	</div>
        	</div>
             <?php
	                $p++;
                }
            ?> 
    	</div>
   
        
            <?php
            }
            ?>
    </div>  
    
    </div>
        
        <?php } ?>
    
    
</div> <!-- End of outer-wrapper which opens in header.php -->



<?php 
    include ("footer.php");
 ?>