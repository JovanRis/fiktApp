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
        }
        
        if($companyObj->login())
        {
            $loginSuccess = true;
        }
        
        if($loginSuccess == true)
        {
            echo "login successfull";
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
                    <input type='text' class='form-control' name='username' value='' id='username' />
                </li>
                <li>
                    <label for='password'>Password:</label>
                    <input type='password' class='form-control'  name='password' value='' id='password' />
                </li>
            </ol>
            <input type='submit' class='btn btn-default' name='submit' value='Login' />
            
        </fieldset>
        </form>";
    }
    ?>
    
</div>

<?php include ("footer.php"); ?>