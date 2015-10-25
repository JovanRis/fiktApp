  <?php       
        include("header.php");         
     ?>


<div id="main">
    <h2>Login</h2>
        
            <fieldset>
            <legend>Log on</legend>
            <ol>
                <li>
                    <input type="radio" name="logtype" value="student" checked>Student
                    <input type="radio" name="logtype" value="company">Company
                    <input type="radio" name="logtype" value="university">University
                    
                </li>
                <li>
                    <label for="username">Username:</label> 
                    <input type="text" name="username" value="" id="username" />
                </li>
                <li>
                    <label for="password">Password:</label>
                    <input type="password" name="password" value="" id="password" />
                </li>
            </ol>
            <input type="submit" name="submit" value="Login" />
            
        </fieldset>
    </form>
</div>

<?php include ("footer.php"); ?>