
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Demola-FIKT</title>
        <link href="Site.css" rel="stylesheet" type="text/css" />
        <meta name="viewport" content="width=device-width, initial-scale=1"> 


    </head>
    <body>
       
        <header>
            <div class="content-wrapper">
                <div class="float-left">
                    <p class="site-title"><a href="/index.php">DEMOLA-FIKT </a></p>
                </div>
              <div class="float-right">
                    <section id="login">
                        <ul id="login">
                        <?php
                       
                            echo '<li><a href="login.php">Login</a></li>' . "\n";
                            echo '<li><a href="register.php">Register</a></li>' . "\n";
                        
                        ?>
                        </ul>
                    </section>
                </div>

                
            </div>

                <section class="navigation" data-role="navbar">
                    <nav>
                        <ul id="menu">
                            <li><a href="home.php">Home</a></li>
                            
                        </ul>
                    </nav>
            </section>
        </header>
       
   </body>
</html>