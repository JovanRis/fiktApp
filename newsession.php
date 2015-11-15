    <?php       
        include("header.php");         
     ?>


   <div id="main">
       <div class="col-md-4">
           <div class="btn-group-vertical">
             
                    <button onclick="location.href='newsession.php'" type='button' class='btn btn-success btn-md' >New Session</button>
                    <button type='button' class='btn btn-success btn-md'>Coding</button>
                    <button type='button' class='btn btn-success btn-md'>Desing</button>
                    <button type='button' class='btn btn-success btn-md'>Comunications</button>
                    <button type='button' class='btn btn-success btn-md'>Education</button>

           </div>
        </div>
        <div class="col-md-8">
        
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
    <!-- Ovde od ko ce  se kreira Sesija da se napraj <div class="well">  i pre nego imeto na sesijata  -->
        
        <h3>Active Session</h3>
        <div class="well">
        </div>
        </div>
    </div>

<?php 
    include ("footer.php");
 ?>