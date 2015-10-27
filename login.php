  <?php       
        include("header.php"); 
        require 'userClass.php';
        require 'companyClass.php';
     ?>


<div id="main">
    <h2>Login</h2>
    <?php 
    
    if(isset($_POST['submit']))
    {
        $radioCheck = $_POST['logtype'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        
        if($radioCheck == "student")
        {
            $userObj = new User($user,$pass);
            
            if($userObj->login($user,$pass))
            {
                echo "login successful";
            }
            else {
                echo "wrong username or password";
            }
            
        }
        elseif ($radioCheck == "company") 
        {
            $companyObj = new Company($user);
            
            if($companyObj->login($user,$pass))
            {
                echo "login successful";
            }
            else {
                echo "wrong username or password";
            }
        }
    }
    else {
        echo "<form id='loginForm' action='login.php' method='POST'>
        
            <fieldset>
            <legend>Log on</legend>
            <ol>
                <li>
                    <input type='radio' name='logtype' value='student' checked>Student
                    <input type='radio' name='logtype' value='company'>Company
                    <input type='radio' name='logtype' value='university'>University
                    
                </li>
                <li>
                    <label for='username'>Username:</label> 
                    <input type='text' name='username' value='' id='username' />
                </li>
                <li>
                    <label for='password'>Password:</label>
                    <input type='password' name='password' value='' id='password' />
                </li>
            </ol>
            <input type='submit' name='submit' value='Login' />
            
        </fieldset>
        </form>";
    }
    ?>
    
</div>

<?php include ("footer.php"); ?>