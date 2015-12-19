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
                <div>
                    <div><h3><?php echo $project['ProjectName'] ?></h3></div>
                    <div><p><?php echo $project['Discription'] ?></p></div>
                    <div>
                    <?php
                    foreach($project['SignedUp'] as $colegue){
                        ?>
                            <div> <?php echo $colegue['firstname']." ".$colegue['lastname']." ".$colegue['email']; ?> </div>
                        <?php
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


   <div id="main">
   
        <h3>Completed Projects</h3>
        <div class="well">
             <div class="row">
             
               <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse1">Name of Project</a>
                                  </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse">
                                      <div class="panel-body">Project Description</div>
                                      <div class="panel-footer">Name of Company</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse2">Name of Project</a>
                                  </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse">
                                      <div class="panel-body">Project Description</div>
                                      <div class="panel-footer">Name of Company</div>
                            </div>
                        </div>
                    </div> 
                </div>
                    
                <div class="clearfix visible-xs"></div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                   <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse3">Name of Project</a>
                                  </h4>
                            </div>
                            <div id="collapse3" class="panel-collapse collapse">
                                      <div class="panel-body">Project Description</div>
                                      <div class="panel-footer">Name of Company</div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            
                         <div class="row">
             
               <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse4">Name of Project</a>
                                  </h4>
                            </div>
                            <div id="collapse4" class="panel-collapse collapse">
                                      <div class="panel-body">Project Description</div>
                                      <div class="panel-footer">Name of Company</div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                    <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse5">Name of Project</a>
                                  </h4>
                            </div>
                            <div id="collapse5" class="panel-collapse collapse">
                                      <div class="panel-body">Project Description</div>
                                      <div class="panel-footer">Name of Company</div>
                            </div>
                        </div>
                    </div> 
                </div>
                    
                <div class="clearfix visible-xs"></div>
                
                <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                   <div class="panel-group">
                        <div class="panel panel-success">
                            <div class="panel-heading">
                                  <h4 class="panel-title">
                                    <a data-toggle="collapse" href="#collapse6">Name of Project</a>
                                  </h4>
                            </div>
                            <div id="collapse6" class="panel-collapse collapse">
                                      <div class="panel-body">Project Description</div>
                                      <div class="panel-footer">Name of Company</div>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
        </div>
        
        <?php } ?>
    
    
</div> <!-- End of outer-wrapper which opens in header.php -->



<?php 
    include ("footer.php");
 ?>