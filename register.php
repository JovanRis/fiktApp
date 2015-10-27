  <?php       
        include("header.php");       
        require_once "companyClass.php";
        require_once "userClass.php";
     ?>


<div id="main">
    <h2>Register an account</h2>
        <?php 
        if(isset($_POST['submit']))
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $radioCheck = $_POST['logtype'];
            
            
            if($radioCheck == "student")
            {
                 $userObj = new User($username, $password);
                 if($userObj-> register($user,$pwhash,$firstname, $lastname, $email))
                 {
                      echo "User register successful";
                 }
                 else
                 {
                      echo "User register error";
                 }
                 
            }
            elseif ($radioCheck == "company") 
            {
                $companyObj = new Company ($username, $password);
                if($companyObj-> register($user,$pwhash,"deteils go here",$email,"imgUrl goes here"))
                {
                      echo "Company register successful";
                 }
                 else
                 {
                      echo "Company register error";
                 }
            } 
            elseif($radioCheck == "university")
            {
                
            }
        }
        else
        {
            echo " <form id='registerForm' action='register.php' method='POST'>
            <fieldset>
                <legend>Register an account</legend>
                <ol>
                <li>
                 
                    <input type='radio' name='logtype' value='student' checked>Student
                    <input type='radio' name='logtype' value='company'>Company
                    <input type='radio' name='logtype' value='university'>University
                   
                </li>
                  <li>
                    <label for='firstname'>Firstname:</label> 
                    <input type='text' name='firstname' value='' id='firstname' />
                </li>
                 <li>
                    <label for='lastname'>Lastname:</label> 
                    <input type='text' name='lastname' value='' id='lastname' />
                </li>
                 <li>
                    <label for='email'>Email:</label> 
                    <input type='text' name='email' value='' id='email' />
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
                <input type='submit' name='submit' value='Register' />
               
            </fieldset>
        </form>";
        }
        ?>
        
     </div>

<?php
    include ("footer.php");
?>