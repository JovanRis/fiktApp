   <?php       
        include("header.php"); 
        
        require_once 'classes/userClass.php';
        require_once 'classes/companyClass.php';
        require_once 'classes/adminClass.php';
     ?>


<div id="main">
    <h2>Login</h2>
    <?php 
    
    if(isset($_POST['submit']))
    {
        $radioCheck = $_POST['logtype'];
        $user = $_POST['username'];
        $pass = $_POST['password'];
        $userObj = new User($user,md5($pass));
        $companyObj = new Company($user,md5($pass));
        $adminObj = new Admin($user, $pass); // S: Ovde e bez md5 oti direktno e vnesen pass vo db
        
        $_SESSION['isAdminLoggedIn'] = false;
        $loginSuccess = false;
        
        
        if($userObj->login() > -1)
        {
            $loginSuccess = true;
            $_SESSION['userType'] = 'student';
            $_SESSION['username'] = $user;
        }
        
        $companyID = $companyObj->login();

        if($companyID > -1)
        {
            $loginSuccess = true;
            $_SESSION['userType'] = 'company';
            $_SESSION['username'] = $user;
            $_SESSION['companyID'] = $companyID;
            $_SESSION['pwHash'] = $companyObj->getPwHash();
        }
        
        if($adminObj->login() > -1)
        {
            $loginSuccess = true;
            $_SESSION['userType'] = 'admin';
            $_SESSION['username'] = $user;
            $_SESSION['isAdminLoggedIn'] = true;
        }
        
        if($loginSuccess == true)
        {
            echo "login successfull <br> logged in as: ".$_SESSION['userType'];
            header("Refresh:2; url=index.php");
        }
        else {
            echo "wrong username or password";
        }
    }
    else {
        echo "<div class = 'container'>
        <form id='loginForm' role='form' action='login.php' method='POST'>
        
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
        </div>";
    }
    ?>
    
</div>

<?php include ("footer.php"); ?>