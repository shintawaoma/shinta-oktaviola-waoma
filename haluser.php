<?php 
require_once( "sparqllib.php" );
 
$db = sparql_connect( "http://localhost:3030/FILM/sparql" );
if( !$db ) { print $db->errno() . ": " . $db->error(). "\n"; exit; }
sparql_ns( "rooms","http://vocab.deri.ie/rooms#" );
 
$sparql = "PREFIX foaf:<http://xmlns.com/foaf/0.1/>
PREFIX dbo:<http://dbpedia.org/ontology/>
PREFIX movie: <http://data.linkedmdb.org/resource/movie/>
SELECT ?title ?actor?date?Genre?time
WHERE {
  ?person dbo:title ?title.
  ?person dbo:Actor ?actor.
  ?person dbo:date ?date.
  ?person dbo:time ?time.
  ?person dbo:Genre ?Genre.
  FILTER (?time < '127 Minutes')
} order by (?title)";

$buku="PREFIX dbo:   <http://dbpedia.org/ontology/> 
PREFIX book: <http://purl.org/NET/book/vocab#> 


SELECT ?judul?penulis?jumlah
WHERE {
  graph<http://localhost:3030/FILM/data/buku>{
     ?person dbo:jlh_halaman?jumlah.
     ?person dbo:judul?judul.
     ?person dbo:penulis?penulis.
    
  }

}  ";
$result = $db->query( $sparql ); 
if( !$result ) { print $db->errno() . ": " . $db->error(). "\n"; exit; } 
$fields = $result->field_array( $result );

$resultbuku=$db->query( $buku); 
$fieldsbuku = $resultbuku->field_array( $resultbuku);

include "koneksi.php";
session_start();
if (!isset($_SESSION['username'])) {
    header("location:endpointni.php#login");
}
if (isset($_SESSION['username'])){
    $username=$_SESSION['username'];
}
?>
<!DOCTYPE html>
<html lang="en">
<title>Moviefam user</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="icon" type="image/jpg" href="film.jpg">

<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-quarter img{margin-bottom: -6px; cursor: pointer}
.w3-quarter img:hover{opacity: 0.6; transition: 0.3s}
</style>
<body class="w3-light-grey">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-black w3-animate-right w3-top w3-text-light-grey w3-large" style="z-index:3;width:250px;font-weight:bold;display:none;right:0;" id="mySidebar">
<div>
<?php if (isset($_SESSION["tester"])):?>
  <a href="logout.php" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-32">LOGOUT</a>
<?php endif; ?> 
</div>
  <a href="#about" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">ABOUT US</a> 
  <a href="rdforang.php" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">OTHER RDF</a> 
  <a href="#contact" onclick="w3_close()" class="w3-bar-item w3-button w3-center w3-padding-16">ADD MOVIE</a>
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">Moviefam</span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main w3-content" style="max-width:1600px;margin-top:83px">
  
  <!-- Photo grid -->
<div class=" w3-theme w3-row-padding ">
  <h3 class="w3-center">Best Movie Under 127 Min</h3>
<?php while($row = $result->fetch_array()): ?>
    <div class="w3-third w3-section">
     <div  class="w3-card-4 w3-center w3-padding w3-round-xxlarge">
    <img src="film.jpg" width="25%">
  <?php foreach ($fields as $field):?>
    <div class="w3-bottombar">
    <?php echo $field; ?> : <?php echo$row[$field]; ?>
    </div>
  <?php endforeach; ?>
  <br><br>
  <form action="http://103.194.171.75/" target="_blank">
  <button class="w3-button w3-teal w3-round-large">Watch</button>
  <button class="w3-button w3-blue w3-round-large">Trailer</button>
  </form>
  </div>
  </div>
<?php endwhile; ?>
</div>

  <!-- Pagination -->
  <div class="w3-center w3-padding-32">
<!--     <div class="w3-bar">
      <a href="#" class="w3-bar-item w3-black w3-button">1</a>
      <a href="#2" class="w3-bar-item w3-button w3-hover-black">2</a>
      <a href="#3" class="w3-bar-item w3-button w3-hover-black">3</a>
      <a href="#4" class="w3-bar-item w3-button w3-hover-black">4</a>
    </div> -->
  </div>
  
  <!-- About section -->
  <div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="about">
    <h4><b>About Us</b></h4>
    <br>
    <img src="rj.jpg" alt="Me" class="w3-image " width="300" height="350">
        <div class="w3-content w3-justify" style="max-width:600px">
          <h4>Mohammad Raja </h4>
          <p>Hi, meet me raja . I am Owner of this Movie Website .I Study in Sumatera Utara University in FASILKOM-TI Department. My College ID is 181401048. I need to tell you a secret about me that i am a d
          and i'm new here 
          </p>
          <p>Instagram :  <a style ="color: blue;"href="https://www.instagram.com/rajaadlmunthe/" target="_blank">  https://www.instagram.com/rajaadlmunthe/</a></p>
          <p>tel: 081329867303</p>
        </div>
      <hr class="w3-opacity">
      <img src="jesi.jpg" alt="Jesi" class="w3-image " width="300" height="350">
        <div class="w3-content w3-justify" style="max-width:600px">
          <h4>Jessica Grasiela</h4>
          <p>Hi, meet me Jesi . I am Front-End of this Movie Website .I Study in Sumatera Utara University in FASILKOM-TI Department. My College ID is 181401045
          and i'm new here 
          </p>
          <p>Instagram :  <a style ="color: blue;"href="https://www.instagram.com/jessicagracielaa/" target="_blank">   https://www.instagram.com/jessicagracielaa/</a></p>
          <p>tel: 0813#########</p>
        </div>
      <hr class="w3-opacity">
      <img src="Shinta.jpg" alt="Shinta" class="w3-image " width="300" height="350">
        <div class="w3-content w3-justify" style="max-width:600px">
          <h4>Shinta Waoma</h4>
          <p>Hi, meet me Shinta . I am Front-End of this Movie Website .I Study in Sumatera Utara University in FASILKOM-TI Department. My College ID is 181401039
          and i'm new here 
          </p>
          <p>Instagram :  <a style ="color: blue;"href="https://www.instagram.com/shintawaoma/" target="_blank">   https://www.instagram.com/shintawaoma/</a></p>
          <p>tel: 0813#########</p>
        </div>
      <hr class="w3-opacity">
      <img src="fathur.jpg" alt="fathur" class="w3-image " width="300" height="350">
        <div class="w3-content w3-justify" style="max-width:600px">
          <h4>Fathur Rachman</h4>
          <p>Hi, meet me Fathur . I am Back-end of this Movie Website .I Study in Sumatera Utara University in FASILKOM-TI Department. My College ID is 181401060
          and i'm new here 
          </p>
          <p>Instagram :  <a style ="color: blue;"href="https://www.instagram.com/fathurnst1/" target="_blank">   https://www.instagram.com/fathurnst1/</a></p>
          <p>tel: 0813#########</p>
        </div>
  </div>

  <!-- Contact section -->
  <div class="w3-container w3-light-grey w3-padding-32 w3-padding-large" id="contact">
    <div class="w3-content" style="max-width:600px">
      <h4 class="w3-center"><b>Add Movie </b></h4>
      <p style="text-align: center;">Do you want me to add some movie here? please fill this form</p>
      <form action="aksi_request.php" method="POST">
        <div class="w3-section">
          <label>Title</label>
          <input class="w3-input w3-border" type="text" name="Title" required>
        </div>
        <div class="w3-section">
          <label>Actor</label>
          <input class="w3-input w3-border" type="text" name="Actor" required>
        </div>
        <div class="w3-section">
          <label>Genre</label>
          <input class="w3-input w3-border" type="text" name="Genre" required>
        </div>
        <div class="w3-section">
          <label>Date</label>
          <input class="w3-input w3-border" type="text" name="Date" placeholder="YYYY-MM-DD" required>
        </div>
        <div class="w3-section">
          <label>Duration</label>
          <input class="w3-input w3-border" type="text" name="Duration"  required>
        </div>
        <button type="submit" class="w3-button w3-block w3-black w3-margin-bottom" value="SWrequest">Send Request</button>
      </form>
    </div>
  </div>


  <!-- Footer -->
    <footer class="w3-container w3-padding-32 w3-grey">  
    <div class="w3-row-padding">
      <div class="w3-third">
        <h3>INFO</h3>
        <p>All materials and contents (text, graphics, and every attributes) of This Website website are copyrights and trademarks of Moviefam. No part of this website may be reproduced in any form without our written permission. Misuse of the entire content or any part, multiply, translate, use, or utilize it without written permission from Moviefam will be subject to criminal and / or civil penalties. </p>      
      </div>
    
      <div class="w3-third">
        <h3>BLOG POSTS</h3>

      </div>

      <div class="w3-third">
        <h3>POPULAR TAGS</h3>
        <a href="rdforang.php"><p>
          <span class="w3-tag w3-black w3-margin-bottom">Books</span>
        </p></a>
      </div>
    </div>
  </footer>
   
<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
  document.getElementById("mySidebar").style.display = "block";
  document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
  document.getElementById("mySidebar").style.display = "none";
  document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery

</script>


</body>
</html>