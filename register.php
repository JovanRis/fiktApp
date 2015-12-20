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
  
    function showCompanyDetails(){
        document.getElementById("firstnameItem").style.display = "none";
        document.getElementById("lastnameItem").style.display = "none";
        document.getElementById("companyDetailsItem").style.display = "block";
        document.getElementById("companyImgItem").style.display = "block";
    }
  
    function showStudentDetails(){
        document.getElementById("firstnameItem").style.display = "block";
        document.getElementById("lastnameItem").style.display = "block";
        document.getElementById("companyDetailsItem").style.display = "none";
        document.getElementById("companyImgItem").style.display = "none";
    }

</script>

<div id="main">
    <h2>Register an account</h2>
        <?php 
        if(isset($_POST['submit']))
        {
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $comDetails = $_POST['companyDetails'];
            $comImg = $_POST['companyImg'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $radioCheck = $_POST['logtype'];

            
            if($radioCheck == "student")
            {
                 $userObj = new User();
                 if($userObj-> register($username,md5($password),$firstname, $lastname, $email))
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
                $companyObj = new Company ();
                
                if($companyObj-> register($username,md5($password),$comDetails,$email,$comImg))
                {
                      echo "Company register successful";
                 }
                 else
                 {
                      echo "Company register error";
                 }
            } 
        }
        else
        {
        ?> <form id='registerForm' action='register.php' method='POST' onsubmit='return checkForm(this);'>
            <fieldset>
                <legend>Register an account</legend>
                <ol>
                <li>
                    <input type='radio' name='logtype' value='student' checked onclick="showStudentDetails();">Student
                    <input type='radio' name='logtype' value='company' onclick="showCompanyDetails();">Company
                </li>
                <li id="firstnameItem">
                    <label for='firstname'>Firstname:</label>
                    <input type='text' class='form-control' name='firstname' value='' id='firstname' />
                </li>
                <li id="lastnameItem">
                    <label for='lastname'>Lastname:</label> 
                    <input type='text' class='form-control' name='lastname' value='' id='lastname' />
                </li>
                
                
                
                <li id="companyDetailsItem" style="display:none;">
                    <label for='companyDetails'>Company details:</label> 
                    <input type='text' class='form-control' name='companyDetails' value='' id='companyDetails' />
                </li>
                <li id="companyImgItem" style="display:none;">
                    <label for='companyImg'>Company logo url:</label> 
                    <input type='text' class='form-control' name='companyImg' value='' id='companyImg' />
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
        </form>
        
        <?php
        }
        ?>
        
     </div>

<?php
    include ("footer.php");
?>