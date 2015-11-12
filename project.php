    <?php       
        include("header.php");         
     ?>


   <div id="main">
       <div class="col-md-4">
           <div class="btn-group-vertical">
              <!-- Ako e najaven kako Kompanija da mozi da dodaj  -->
              <?php
                if($_SESSION['userType'] == 'company'){
                    echo htmlspecialchars_decode("<button onclick= &quot; location.href='newproject.php' &quot; type= &quot; button &quot; class= &quot; btn btn-success btn-md &quot; >New Project</button>");
                }
                echo "
                    <button type='button' class='btn btn-success btn-md'>Coding</button>
                    <button type='button' class='btn btn-success btn-md'>Desing</button>
                    <button type='button' class='btn btn-success btn-md'>Comunications</button>
                    <button type='button' class='btn btn-success btn-md'>Education</button>
                ";
              
              ?>
           </div>
        </div>
        <div class="col-md-8"></div>
    </div>

</div> <!-- End of outer-wrapper which opens in header.php -->
<?php 
    include ("footer.php");
 ?>