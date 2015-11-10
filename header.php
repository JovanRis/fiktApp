
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
               
                    echo '<li><a href="login.php" class="btn btn-success"><span class="glyphicon glyphicon-user"></span>Login</a></li>' . "\n";
                    echo '<li><a href="register.php" class="btn btn-success">Register</a></li>' . "\n";
                
                ?>
                </ul>
         </div>
    </div>        
    <div class="row">
        <div class="col-md-4"></div>
         <div class="col-md-6"> 
         <div class="btn-group">
         <button onclick="location.href='index.php'" type="button" class="btn btn-success btn-lg">Home</button>
            <div class="btn-group">
            <button type="button" class="btn btn-success btn-lg" >For Students</button>
                <div class="btn-group">
                <button type="button" class="btn btn-success btn-lg" >For Companies</button>
                     <div class="btn-group">
                     <button type="button" class="btn btn-success btn-lg" >For FIKT</button> 
                         <div class="btn-group">
                         <button onclick="location.href='project.php'" type="button" class="btn btn-success btn-lg">Projects</button>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         </div> 
     <div class="col-md-2"></div>
    </div>   
         
        </header>
       
   </body>
</html>