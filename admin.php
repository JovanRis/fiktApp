    <?php       
       require_once("header.php");       
     ?>
     

   <div id="main">
   
   
       <div class="col-md-4">
           <div class="btn-group-vertical">
             
                    <button onclick="location.href='admin.php'" type='button' class='btn btn-success btn-md' id='newsessionbtn' >New Session</button>

           </div>
        </div>
        
        
        <div class="col-md-8">
        
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
         <br>
        
             <form id='newsession' role='form' action='admin.php' method='POST'>
              <fieldset>
                <legend>Create Session</legend>
                <ol>
                    <li>
                        <label for='namesession'>Session Name:</label> 
                        <input type='text' class='form-control' name='namesession' id='namesession' />
                    </li>
                    <li>
                        <label for='startdate'>Enter start date of Session</label> 
                        <input type='date' class='form-control' name='startdate' id='startdate' ><br>
                        <label for='enddate'>Enter end date of Session</label> 
                        <input type='date' class='form-control' name='enddate' id='enddate' ><br>
                    </li>
                </ol>
                <input type='submit' class='btn btn-default' name='submit' value='Create Session' />
               </fieldset>
             </form>
        </div>
        
        
        
        
    </div>

<?php 
    include ("footer.php");
 ?>