    <?php       
        include("header.php");         
     ?>


   <div id="main">
   
       <?php 
       if(isset($_POST['submit']))
       {
             $companyObj = new Company($user,$pass);
            
             $category = $_POST['projecttype'];
             $projectname = $_POST['projectname'];
             $discription = $_POST['projectdescription'];
             
            if($companyObj->createProject($projectName,$category,$discription,$_SESSION['companyID']))
             {
                  echo "Project added successfuly";
             }
             else
             {
                  echo "Project adding error";
             }
        }
        else
        { 
        echo"<div class='col-md-4'>
               <div class='btn-group-vertical'>
                  <!-- Ako e najaven kako Kompanija da mozi da dodaj  -->
                  <button onclick='location.href='newproject.php'' type='button' class='btn btn-success btn-md'>New Project</button>
                  <!-- Ovde ce se iscituvaat proektite so bile napraeni prethodno -->
                  <button type='button' class='btn btn-success btn-md'>Coding</button>
                  <button type='button' class='btn btn-success btn-md'>Desing</button>
                  <button type='button' class='btn btn-success btn-md'>Comunications</button>
                  <button type='button' class='btn btn-success btn-md'>Education</button>
               </div>
            </div>
            <div class='col-md-8'>
            <fieldset>
                    <legend>New Project</legend>
                    <ol>
                    <li>
                     
                        <input type='radio' name='projecttype' value='coding' checked>Coding
                        <input type='radio' name='projecttype' value='desing'>Desing
                        <input type='radio' name='projecttype' value='communication'>Comunications
                        <input type='radio' name='projecttype' value='education'>Education
                       
                    </li>
                    <li>
                        <label for='firstname'>Project Name:</label> 
                        <input type='text' class='form-control' name='projectname' value='' id='projectname' />
                    </li>
                     <li>
                        <label for='lastname'>Project Description:</label> 
                       <textarea rows='4' cols='50' name='projectdescription' id='projectdescription'>Enter Desription of Project here...
                       </textarea>
                    </li>
                     
                    <input type='submit' class='btn btn-default' name='submit' value='NewProject' />
                   
            </fieldset>
            
            </div>";
        }
            ?>
    </div>

</div> <!-- End of outer-wrapper which opens in header.php -->
<?php 
    include ("footer.php");
 ?>