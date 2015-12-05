<?php
    require_once "header.php";
    require_once "classes/projectClass.php";
    
    $studentsPerProject = 5;

?>

<div id="main">
   <div class="col-md-2">
       <div class="btn-group-vertical">
          <!-- Ako e najaven kako Kompanija da mozi da dodaj  -->
          <?php
            if ($_SESSION['userType'] == 'company') {
                echo htmlspecialchars_decode("<button onclick= &quot; location.href='newproject.php' &quot; type= &quot; button &quot; class= &quot; btn btn-success btn-md &quot; >New Project</button>");
            }

            echo htmlspecialchars_decode("
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=coding'; &quot; >Coding</button>
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=design'; &quot; >Design</button>
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=communication'; &quot; >Communication</button>
                <button type='button' class='btn btn-success btn-md' onclick= &quot; location.href='?p=education'; &quot; >Education</button>
            ");
            ?>
       </div>
    </div>
    
    <?php

    if (isset($_GET['signup'])) {   //if signing up for project execute this
        $projectObj = new Project();
        $r = $projectObj->signUpForProject($_GET['signup'],$_SESSION['userID']);
        if($r){
            echo "Signed up successfully!";
        }
        else {
            echo "Signup failed!";
        }
        
    }
    else{   //if not signing up execute this
    ?>


   <div class="col-md-8">
    <?php
        $projectObj = new Project();
        $projects;

    if (isset($_GET['p'])) {
        $projects = $projectObj->getProjects($_GET['p']);
    }
    else {
        $projects = $projectObj->getProjects('all');
    }

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
	                        <?php
	    	                if ($_SESSION['userType'] == 'student' && $projects[$p - 1]['cnt'] < $studentsPerProject ) {
	                        ?>
	                        <div class="panel-footer" style='text-align: right;'> <?php
	                    	echo htmlspecialchars_decode("<button type='button' style='margin-right: 60px;' class='btn btn-success btn-md' onclick= &quot; location.href='?signup=" . $projects[$p - 1]['id_pk'] . "' &quot; >Sign Up</button>") ?>
	                    	<span>Spots left: <?php echo $studentsPerProject-$projects[$p - 1]['cnt'] ?> </span>
			                </div>
	                        <?php
	                        }
	                        ?>
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
    <?php
    }
    ?>
</div>
</div>


<?php
include ("footer.php");

?>