  <?php       
        include("header.php"); 
        
        require_once 'userClass.php';
        
        require_once 'companyClass.php';
        
     ?>


<div id="main">
    <h2>Login</h2>
    <?php 
    
    if(isset($_POST['submit']))
    {
        $radioCheck = $_POST['logtype'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $userObj = new User($user,$pass);
        $companyObj = new Company($user,$pass);
        
        $loginSuccess = false;
        
        
        if($userObj->login())
        {
            $loginSuccess = true;
            $_SESSION['userType'] = 'student';
        }
        
        if($companyObj->login())
        {
            $loginSuccess = true;
            $_SESSION['userType'] = 'company';
        }
        
        if($loginSuccess == true)
        {
            echo "login successfull <br> logged in as: ".$_SESSION['userType'];
        }
        else {
            echo "wrong username or password";
        }
    }
    else {
        echo "<form id='loginForm' action='login.php' method='POST'>
        
            <fieldset>
            <legend>Log on</legend>
            <ol>
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