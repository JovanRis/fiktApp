    <?php       
        include("header.php");         
     ?>


<body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="50">

   <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
          <li data-target="#myCarousel" data-slide-to="1"></li>
          <li data-target="#myCarousel" data-slide-to="2"></li>
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner" role="listbox">

          <div class="item active">
            <img src="images/fikt1.jpg" alt="Fikt 1" width="1200" height="700">
            <div class="carousel-caption">
            </div>      
          </div>
    
          <div class="item">
            <img src="images/fikt2.jpg" alt="Fikt 2" width="1200" height="700">
            <div class="carousel-caption">
          </div>      
      </div>
    </div>

         
    

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
    
   <div id="band" class="container text-left">
   <h3> DEMOLA FIKT  </h3>
        <p>
        За факултетите,Демола нуди можност за изградба на одржливи односи со компаниите и им ја нуди потребната гледна  точка за потребите на пазарот.
        Деловните контакти кои ние ги обезбедуваме не се само корисни за училиштата кои се вклучени,туку и за студентите во иста толкава мера.
        </p>
        <p>
        За истражувачите,Демола претставува рудник на нови податоци,теми и идеи.
        Демола случаите се однесуваат на идните иновации,па наместо само истражување на она што веќе го има,вие ќе ја имате видливоста на она што допрва треба да биди.
        </p>
        <p>
        Професорите исто така можат да се вклучат во проектите што ќе им помогне да ги развијат нивните педагошки вештини и методи.Демола проектите имаат јасна и компатибилна структура,што прави лесно да можат да се додаваат проектите во било кој универзитетски каталог.
        </p>
            </div>
        </div>

    
</div> <!-- End of outer-wrapper which opens in header.php -->
<?php 
    include ("footer.php");
 ?>