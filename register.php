  <?php       
        include("header.php");   
        require_once 'classes/userClass.php';
        require_once 'classes/companyClass.php';


     ?>

<script type="text/javascript">

  function checkPassword(str)
  {
    var re = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}$/;
    return re.test(str);
  }

  function checkForm(form)
  {
    if(form.username.value == "") {
      alert("Error: Username cannot be blank!");
      form.username.focus();
      return false;
    }
    
    if(!checkPassword(form.password.value)) {
        alert("The password you have entered is not valid! The password must contain at least one number, one lowercase, one uppercase letter and size of at least six characters");
        form.password.focus();
        return false;
    }
    
    return true;
  }

</script>

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
                 $userObj = new User($username, md5($password));
                 if($userObj-> register($username,$password,$firstname, $lastname, $email))
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
                $companyObj = new Company ($username, md5($password));
                if($companyObj-> register($username,$password,"deteils go here",$email,"imgUrl goes here"))
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
            echo " <form id='registerForm' action='register.php' method='POST' onsubmit='return checkForm(this);'>
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
                    <input type='text' class='form-control' name='firstname' value='' id='firstname' />
                </li>
                 <li>
                    <label for='lastname'>Lastname:</label> 
                    <input type='text' class='form-control' name='lastname' value='' id='lastname' />
                </li>
                 <li>
                    <label for='email'>Email:</label> 
                    <input type='text' class='form-control' name='email' value='' id='email' />
                </li>
                    <li>
                        <label for='username'>Username:</label> 
                        <input type='text' class='form-control' name='username' value='' id='username' />
                    </li>
                    <li>
                        <label for='password'>Password:</label>
                        <input type='password' class='form-control' name='password' value='' id='password' />
                    </li>
                </ol>
                <input type='submit' class='btn btn-default' name='submit' value='Register' />
               
            </fieldset>
        </form>";
        }
        ?>
        
     </div>

<?php
    include ("footer.php");
?>