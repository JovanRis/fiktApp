
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Demola-FIKT</title>
        <link href="Site.css" rel="stylesheet" type="text/css" />
       <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
       
  <link href="http://fonts.googleapis.com/css?family=Lato" rel="stylesheet" type="text/css">
  <link href="http://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
 
        <meta name="viewport" content="width=device-width, initial-scale=1"> 
        <?php 
        session_start();
        ?>



    </head>
    <body>
       
        <header>
    <div class="row">
            <div class="col-md-4">
                <div class="site-logo">
                    
                   <a href="index.php"> </a>
                   <img src="fict_logo.png" alt="FIKT-LOGO" width="250px" height="100px" >
                    
                </div>
            </div>
             
        <div class="col-md-6"></div>

        <div class="col-md-2">
                <ul id="login">
                <?php
                
                if(isset($_SESSION['username']))
                {
                    echo "<li>".$_SESSION['username']." <a href='?logout=true' class='btn btn-success'>Logout</a>  </li>";
                }
                else {
                    echo '<li><a class="btn btn-success" href="login.php"><span class="glyphicon glyphicon-user"></span> Login</a></li>' . "\n";
                    echo '<li><a class="btn btn-success" href="register.php" ><span class="glyphicon glyphicon-log-in"></span> Register</a></li>' . "\n";
                }
               
                if(isset($_GET['logout']))
                {
                    $_SESSION = array();
                    session_destroy();
                     header("Refresh:2; url=login.php");
                }
                ?>
                </ul>
         </div>
    </div>        
    <div class="row">
        <div class="col-xs-12 col-md-4"></div>
         <div class="col-xs-12 col-md-6" > 
         
    <nav  class="navbar navbar-default"  role="navigation">
          <div class="navbar-header" >
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#myNavbar"aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
          
          </div>

         <div class="collapse navbar-collapse" id="myNavbar">
         
                 <ul class="nav navbar-nav">
                    <li><a class="btn btn-success btn-lg" href='index.php' ><span class="glyphicon glyphicon-home"></span>Home</a></li>
                    <li><a class="btn btn-success btn-lg" href='forStudents.php'>For Students</a></li>
                    <li><a class="btn btn-success btn-lg" href='forCompanies.php'>For Companies</a></li> 
                    <li><a class="btn btn-success btn-lg" href='forFikt.php'>For FIKT</a></li> 
                    <li><a class="btn btn-success btn-lg" href='project.php' >Projects</a></li>
                 </ul>
           
         </div>
    </nav>
            
  </div>
</div> 
         
        <div class=" col-xs-12 col-md-2"></div>
        </div>   
         
         
         
     </header>
       

