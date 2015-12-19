    <?php       
       require_once("header.php");    
       require_once("classes/adminClass.php");
       require_once("classes/companyClass.php");
       require_once("classes/projectClass.php")
     ?>
     
    <script type="text/javascript" src="http://code.jquery.com/jquery-2.1.4.min.js"></script> 
    <script src="//cdn.jsdelivr.net/webshim/1.14.5/polyfiller.js"></script>
    <script>
    webshims.setOptions('forms-ext', {types: 'date'});
    webshims.polyfill('forms forms-ext');
    $.webshims.formcfg = {
    en: {
        dFormat: '-',
        dateSigns: '-',
        patterns: {
            d: "yy-mm-dd"
        }
    }
    };
    </script>
     

   <div id="main">
   
  

         <div class='col-md-4'>
           <div class='btn-group-vertical'>
                    <button onclick="location.href='?p=newsession'" type='button' class='btn btn-success btn-md' id='newsessionbtn' >New Session</button>
                    <button onclick="location.href='?p=approvecompany'" type='button' class='btn btn-success btn-md' id='approvecompanybtn' >Approve Companies</button>
                    <button onclick="location.href='?p=approveproject'" type='button' class='btn btn-success btn-md' id='approveprojectbtn' >Approve Projects</button>
           </div>
        </div>
        
        
        <div class='col-md-8'>
         <?php 
        
        if($_SESSION['isAdminLoggedIn'] == false)
        {
            if(isset($_POST['submit']))
            {
                $user = $_POST['username'];
                $pass = $_POST['password'];
                
                $adminObj = new Admin($user, md5($pass));
                
                $_SESSION['isAdminLoggedIn'] = false;
                $loginSuccess = false;
                
                if($adminObj->login() > -1)
                {
                    $loginSuccess = true;
                    $_SESSION['userType'] = 'admin';
                    $_SESSION['username'] = $user;
                    $_SESSION['pwHash'] = $adminObj->getPwHash();
                    $_SESSION['isAdminLoggedIn'] = true;
                }
                
                if($loginSuccess == true)
                {
                    echo "login successfull <br> logged in as: ".$_SESSION['userType'];
                    header("Refresh:2; url=admin.php");
                }
                else {
                    echo "wrong username or password";
                }
            }
            else
            {
            echo"<form id='loginForm' role='form' action='admin.php' method='POST'>
            
                <fieldset>
                <legend>Log on</legend>
                <ol>
                    <li>
                        <label for='username'>Username:</label> 
                        <input type='text' class='form-control' name='username' value='' id='username' />
                    </li>
                    <li>
                        <label for='password'>Password:</label>
                        <input type='password' class='form-control' name='password' value='' id='password' />
                    </li>
                </ol>
                <input type='submit' class='btn btn-default' name='submit' value='Login' />
                
            </fieldset>
            </form>
            <br>";
            }
        }
       else
       {
           if(isset($_POST['submit-newsession']))
           {
               
                 $adminObj = new Admin($_SESSION['username'],$_SESSION['pwHash']);
                 $sessionName = $_POST['namesession'];
                 $startDate = $_POST['startdate'];
                 $endDate = $_POST['enddate'];
                 
                
                if($adminObj->createSession($sessionName,$startDate,$endDate))
                 {
                      echo "Session added successfuly";
                 }
                 else
                 {
                      echo "Session adding error";
                 }
            }
            elseif(isset($_POST['submit-approvecompany'])){
                $adminObj = new Admin($_SESSION['username'],$_SESSION['pwHash']);
                foreach($_POST['iCom'] as $idCom){
                    $adminObj->approveCompany($idCom);
                }

            }
            elseif(isset($_POST['submit-approveproject'])){
                $adminObj = new Admin($_SESSION['username'],$_SESSION['pwHash']);
                foreach($_POST['iPro'] as $idPro){
                    $adminObj->approveProject($idPro);
                }
            }
            else
            {
                if($_GET['p'] == 'newsession'){
                    
                    echo "<form id='newsession' role='form' action='admin.php' method='POST'>
                            <fieldset>
                                <legend>Create Session</legend>
                                    <ol>
                                        <li>
                                            <label for='namesession'>Session Name:</label> 
                                            <input type='text' class='form-control' name='namesession' id='namesession' />
                                        </li>
                                        <li>
                                            <label for='startdate'>Enter start date of Session</label> 
                                            <input type='date' class='form-control' name='startdate' id='startdate' ><br>
                                            <label for='enddate'>Enter end date of Session</label> 
                                            <input type='date' class='form-control' name='enddate' id='enddate' ><br>
                                        </li>
                                    </ol>
                                    <input type='submit' class='btn btn-default' name='submit-newsession' value='Create Session' />
                            </fieldset>
                        </form>";
                }
                elseif($_GET['p'] == 'approvecompany') {
                    $companyObj = new Company();
                    $inactiveCompanies = $companyObj->getInactiveCompanies();
                    ?>
                    <form id='approvecompany' role='form' action='admin.php' method = 'POST'>
                        <fieldset>
                            <legend>Approve Companies</legend>
                                    <ol style="aligh:left;">
                                    <?php
                                        foreach($inactiveCompanies as $iCom){
                                         ?>
                                         <li>
                                            <label><input type='checkbox' class='form-control' name='iCom[]' value="<?php echo $iCom['id_pk'] ?>" > <?php echo $iCom['CompanyName'] ?></label>
                                         </li>
                                         <?php
                                        }
                                        ?>
                                    </ol>
                            <input type='submit' class='btn btn-default' name='submit-approvecompany' value='Approve Companies' />
                        </fieldset>
                    </form>
                    <?php
                }
                elseif($_GET['p'] == 'approveproject') {
                    $projectObj = new Project();
                    $inactiveProjects = $projectObj->getInactiveProjects();
                    ?>
                    
                    <form id='approveproject' role='form' action='admin.php' method = 'POST'>
                        <fieldset>
                            <legend>Approve Companies</legend>
                                    <ol style="aligh:left;">
                                    <?php
                                        foreach($inactiveProjects as $iPro){
                                         ?>
                                         <li>
                                            <label><input type='checkbox' class='form-control' name='iPro[]' value="<?php echo $iPro['id_pk'] ?>" > <?php echo $iPro['ProjectName'] ?></label>
                                         </li>
                                         <?php
                                        }
                                        ?>
                                    </ol>
                            <input type='submit' class='btn btn-default' name='submit-approveproject' value='Approve Projects' />
                        </fieldset>
                    </form>
                    
                    <?php
                }
                else {
                    echo "Select an option";
                }

           }
       }
             ?>
        </div>
        
        
        
        
    </div>

<?php 
    include ("footer.php");
 ?>