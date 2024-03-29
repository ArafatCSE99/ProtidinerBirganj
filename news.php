<?php

include "connection.php";

$newsid=$_GET["id"];
           
$sql = "SELECT * FROM basic_info";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
     $name=$row["name"];
     $web_address=$row["web_address"];
     $email_address=$row["email_address"];
     $address=$row["address"];
     $mobile_no=$row["mobile_no"];

  }
} 

if(isset($_GET["active_category"])){
  $active_category_id=$_GET["active_category"];
  $sql = "SELECT * FROM category where id=$active_category_id";
  echo "<script>document.location.hash = 'single_post_content';</script>";
}
else
{
  $sql = "SELECT * FROM category order by id asc limit 1";
}
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $active_category_id=$row["id"];
     $active_category_name=$row["name"];
  }
} 

?>  


<!DOCTYPE html>
<html>
<head>
<title><?php echo $name; ?></title>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="assets/css/animate.css">
<link rel="stylesheet" type="text/css" href="assets/css/font.css">
<link rel="stylesheet" type="text/css" href="assets/css/li-scroller.css">
<link rel="stylesheet" type="text/css" href="assets/css/slick.css">
<link rel="stylesheet" type="text/css" href="assets/css/jquery.fancybox.css">
<link rel="stylesheet" type="text/css" href="assets/css/theme.css">
<link rel="stylesheet" type="text/css" href="assets/css/style.css">
<!--[if lt IE 9]>
<script src="assets/js/html5shiv.min.js"></script>
<script src="assets/js/respond.min.js"></script>
<![endif]-->

<style>
  body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
  }
  
  .header {
    text-align: center;
  }
  
  .header h1 {
    font-size: 46px;
    color: transparent;
    background: linear-gradient(to right, red, green);
    -webkit-background-clip: text;
    background-clip: text;
    text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.5);
  }
</style>

</head>
<body>
<div id="preloader">
  <div id="status">&nbsp;</div>
</div>
<a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
<div class="container">
  <header id="header">
    <div class="row">
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_top">
          <div class="header_top_left">
            <ul class="top_nav">
              <li><a href="index.php">Home</a></li>
              <li><a href="#">Abouts</a></li>
              <li><a href="#">Contact</a></li>
            </ul>
          </div>
          <div class="header_top_right">
            <p id="dateDisplay"></p>
          </div>
        </div>
      </div>
      <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="header_bottom">
            <div class="logo_area" style="float: left; width: 30% !important;"><a href="index.php" class="logo"><img src="images/BP_logo.jpg" alt="" height="100px;" width="150px;" style="opacity:0;"></a>    
            </div>
          <div class="header" style="float: centre;">
            <center><div class="logo_area" style="float: centre; width: 400px !important;"><a href="index.php" class="logo"><img src="images/BP_banner.jpg" alt="" height="80px;" width="2000px !important;"></a></center>   
          </div>
          
          <!--<div class="add_banner"><a href="#"><img src="images/addbanner_728x90_V1.jpg" alt=""></a></div> -->
        </div>
      </div>
    </div>
  </header>
  <section id="navArea">
    <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
      </div>
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav main_nav">
          <li class="active"><a href="index.php"><span class="fa fa-home desktop-home"></span><span class="mobile-show">Home</span></a></li>
         
          <?php

$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $category_id=$row["id"];
     echo "<li><a href='index.php?active_category=$category_id'>".$row["name"]."</a></li>";

  }
} 

          ?>

          
          
        </ul>
      </div>
    </nav>
  </section>
  <section id="newsSection">
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="latest_newsarea"> <span>Latest News</span>
          <ul id="ticker01" class="news_sticker">
<?php
$sql = "SELECT * FROM news where is_active=1 order by id desc limit 0,10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     echo "<li><a onclick='GetNewsDetails($id)'><img src='$image_url' alt=''>".$row['headline']."</a></li>";
  }
} 
?>

            
            
          </ul>
          <div class="social_area">
            <ul class="social_nav">
              <li class="facebook"><a href="#"></a></li>
              <li class="twitter"><a href="#"></a></li>
              <li class="flickr"><a href="#"></a></li>
              <li class="pinterest"><a href="#"></a></li>
              <li class="googleplus"><a href="#"></a></li>
              <li class="vimeo"><a href="#"></a></li>
              <li class="youtube"><a href="#"></a></li>
              <li class="mail"><a href="#"></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
  
  <section id="contentDiv">

    <?php

$sql = "UPDATE news SET view_count=view_count+1 WHERE id=$newsid";
$conn->query($sql);


$sql = "SELECT a.*,b.name as category_name FROM news a,category b where a.category_id=b.id and a.id=$newsid";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
     $news=$row['news'];
     $short_news=substr($news, 0, 1000)." . . .";
     $reporter=$row["reporter"];
     $category_name=$row["category_name"];
     $category_id=$row["category_id"];
     $created_date=$row["created_date"];
  }
}


?>

<!--<section id="contentSection"> -->
    <div class="row" style="margin:0px 18px 0px 18px;"> 
      <div class="col-lg-12 col-md-12 col-sm-12"> 
        <div class="left_content" style='height:1000px !important; '>
          <div class="single_page">
            <ol class="breadcrumb">
              <li><a href="../index.html">Home</a></li>
              <li><a href="#"><?php echo $category_name; ?></a></li>
              <!--<li class="active">Mobile</li> -->
            </ol>
            <h1><?php echo $headline; ?></h1>
            <div class="post_commentbox"> <a href="#"><i class="fa fa-user"></i><?php echo $reporter; ?></a> <span><i class="fa fa-calendar"></i><?php echo $created_date; ?></span> <a href="#"><i class="fa fa-tags"></i><?php echo $category_name; ?></a> </div>
            <div class="single_page_content"> <img class="img-center" src="<?php echo $image_url; ?>" alt="" style="width:500px !important; height:300px !important;">
              <p style="font-size:20px;"><?php echo $news; ?></p>
              
            </div>
            <div class="social_link">
              <ul class="sociallink_nav">
                <li><a href="https://www.facebook.com/sharer/sharer.php?u="><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a onclick="PrintNews()"><i class="fa fa-print"></i></a></li>
              </ul>
            </div>
            <div class="related_post">
              <h2>Related Post <i class="fa fa-thumbs-o-up"></i></h2>
              <ul class="spost_nav wow fadeInDown animated">

              <?php
$sql = "SELECT * FROM news where is_active=1 and id!=$id and category_id=$category_id order by id desc limit 0,3";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
     $news=$row['news'];
     $short_news=substr($news, 0, 1000)." . . .";
  
echo "<li>
<div class='media'> <a class='media-left' onclick='GetNewsDetails($id)'> <img src='$image_url' alt=''> </a>
  <div class='media-body'> <a class='catg_title' onclick='GetNewsDetails($id)'>$headline</a> </div>
</div>
</li>";
     
  }
} 
?>              
              </ul>
            </div>
          </div>
        </div>
      
      </div>
      
    </div>
  <!--</section>-->
  </section>
  <section id="sliderSection">
    <div class="row" >
      <div class="col-lg-8 col-md-8 col-sm-8" >
        <div class="slick_slider">
        
        <?php
$sql = "SELECT * FROM news where is_active=1 order by id desc limit 0,10";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
     $news=$row['news'];
     $short_news=substr($news, 0, 1000)." . . .";
  
echo "<div class='single_iteam'> <a onclick='GetNewsDetails($id)'> <img src='$image_url' style='' alt=''></a>
     <div class='slider_article' >
       <a class='slider_tittle' href='#' style='text-align: justify !important; text-justify: inter-word;  color:#000; padding:0px; font-size:20px; height:36px;'><b>$headline</b></a>
       <br><p>$short_news</p>
     </div>
   </div>";
     
  }
} 
?>

          

        </div>
      </div>
      <div class="col-lg-4 col-md-4 col-sm-4">
        <div class="latest_post">
          <h2><span>Popular post</span></h2>
          <div class="latest_post_container">
            <div id="prev-button"><i class="fa fa-chevron-up"></i></div>
            <ul class="latest_postnav">
             
<?php
$sql = "SELECT * FROM news where is_active=1 order by view_count desc limit 0,6";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
    
    echo "<li>
     <div class='media'> <a onclick='GetNewsDetails($id)' class='media-left'> <img alt='' src='$image_url'> </a>
       <div class='media-body'> <a onclick='GetNewsDetails($id)' class='catg_title'>$headline</a> </div>
     </div>
   </li>";
     
  }
} 
?>

             
              
            </ul>
            <div id="next-button"><i class="fa  fa-chevron-down"></i></div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section id="contentSection">
    <div class="row">
      <div class="col-lg-8 col-md-8 col-sm-8">
        <div class="left_content">
          
        <div class="single_post_content" id="single_post_content">
            <h2><span><?php echo $active_category_name; ?></span></h2>
           
           
            <div class="single_post_content_left">
              <ul class="business_catgnav  wow fadeInDown">
                
              <?php
              // Active Category Top News 
$sql = "SELECT * FROM news where category_id=$active_category_id and is_active=1 order by id desc limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
     $news=$row['news'];
     $short_news=substr($news, 0, 1000)." . . .";

            echo "<li>
                  <figure class='bsbig_fig'> <a onclick='GetNewsDetails($id)' class='featured_img'> <img alt='' src='$image_url' width='425px' height='283px'> <span class='overlay'></span> </a>
                    <figcaption> <a onclick='GetNewsDetails($id)'>$headline</a> </figcaption>
                    <p>$short_news</p>
                  </figure>
                </li>";

  }
} 
            ?>
              </ul>
            </div>

            <div class="single_post_content_right">
              <ul class="spost_nav">
              
              <?php
              // Active Category Other Top News 
$sql = "SELECT * FROM news where category_id=$active_category_id and is_active=1 order by id desc limit 1,5";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
            echo "<li>
            <div class='media wow fadeInDown'> <a onclick='GetNewsDetails($id)' class='media-left'> <img alt='' src='$image_url' width='72px' height='72px'> </a>
              <div class='media-body'> <a onclick='GetNewsDetails($id)' class='catg_title'>$headline</a> </div>
            </div>
          </li>";
  }
} 
            ?>

               

              </ul>
            </div>
          </div>

         
          <?php 
      $counter=1;
      $sqlc = "SELECT *from  category where id in (select category_id from news where is_active=1) limit 0,10";
      $resultc = $conn->query($sqlc);
      
      if ($resultc->num_rows > 0) {
        // output data of each row
        while($rowc = $resultc->fetch_assoc()) {  
          $category_id=$rowc["id"];
          $category_name=$rowc["name"];

          ?>

       <?php if($counter%2!=0){ ?>

         <div class="fashion_technology_area"> <!-- Start 01 -->
            
            <div class="fashion"> <!-- Fasion Start -->
              <div class="single_post_content">
                <h2><span><?php echo $category_name; ?></span></h2>
                <ul class="business_catgnav wow fadeInDown">
                 
<?php
// Active Category Top News 
$sql = "SELECT * FROM news where category_id=$category_id and is_active=1 order by id desc limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
     $news=$row['news'];
     $short_news=substr($news, 0, 1000)." . . .";

     echo  "<li>
     <figure class='bsbig_fig'> <a onclick='GetNewsDetails($id)' class='featured_img'> <img alt='' src=' $image_url' width='425px' height='283px'> <span class='overlay'></span> </a>
       <figcaption> <a onclick='GetNewsDetails($id)'>$headline</a> </figcaption>
       <p>$short_news</p>
     </figure>
   </li>";


  }
} 
            ?>
                 
                </ul>
                <ul class="spost_nav">

<?php
// Active Category Other Top News 
$sql = "SELECT * FROM news where category_id=$category_id and is_active=1 order by id desc limit 1,2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];

    echo "<li>
     <div class='media wow fadeInDown'> <a onclick='GetNewsDetails($id)'' class='media-left'> <img alt='' src='$image_url'  width='72px' height='72px'> </a>
       <div class='media-body'> <a onclick='GetNewsDetails($id)' class='catg_title'> $headline</a> </div>
     </div>
   </li>";
            
  }
} 
?>

                 
                  
                </ul>
              </div>
            </div> <!-- Fasion End -->

            <?php } else { ?>

            <div class="technology"> <!-- Technology Start -->
              <div class="single_post_content">
                <h2><span><?php echo $category_name; ?></span></h2>
                <ul class="business_catgnav">
                <?php
// Active Category Top News 
$sql = "SELECT * FROM news where category_id=$category_id and is_active=1 order by id desc limit 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];
     $news=$row['news'];
     $short_news=substr($news, 0, 1000)." . . .";

     echo  "<li>
     <figure class='bsbig_fig wow fadeInDown'> <a onclick='GetNewsDetails($id)' class='featured_img'> <img alt='' src=' $image_url' width='425px' height='283px'> <span class='overlay'></span> </a>
       <figcaption> <a onclick='GetNewsDetails($id)'>$headline</a> </figcaption>
       <p>$short_news</p>
     </figure>
   </li>";


  }
} 
            ?>           
                 

                </ul>
                <ul class="spost_nav">
<?php
// Active Category Other Top News 
$sql = "SELECT * FROM news where category_id=$category_id and is_active=1 order by id desc limit 1,2";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $id=$row["id"];
     $image_url="Admin/API/".$row["image_url"];
     $headline=$row['headline'];

    echo "<li>
    <div class='media wow fadeInDown'> <a onclick='GetNewsDetails($id)' class='media-left'> <img alt='' src='$image_url' width='72px' height='72px'> </a>
      <div class='media-body'> <a onclick='GetNewsDetails($id)' class='catg_title'> $headline</a> </div>
    </div>
  </li>";
            
  }
} 
?>   
                  
                </ul>
              </div>
            </div> <!-- Technology End -->

          </div> <!-- End 01 -->

          <?php } ?>

          <?php $counter++; } }  if($counter%2==0){ echo "</div>"; }  ?>
          
          
        </div>
      </div>
          
      <div class="col-lg-4 col-md-4 col-sm-4">
        <aside class="right_content">
          
          <div class="single_sidebar" style="margin-top:300px;">
            <ul class="nav nav-tabs" role="tablist">
              <li role="presentation" class="active"><a href="#category" aria-controls="home" role="tab" data-toggle="tab">Category</a></li>
              <li role="presentation"><a href="#video" aria-controls="profile" role="tab" data-toggle="tab">Video</a></li>
              <li role="presentation"><a href="#comments" aria-controls="messages" role="tab" data-toggle="tab">Comments</a></li>
            </ul>
            <div class="tab-content">
              <div role="tabpanel" class="tab-pane active" id="category">
                <ul>
<?php             
$sql = "SELECT * FROM category";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $category_id=$row["id"];
     echo "<li class='cat-item'><a href='index.php?active_category=$category_id'>".$row["name"]."</a></li>";

  }
} 
?>                     
                </ul>
              </div>
              <div role="tabpanel" class="tab-pane" id="video">
                <div class="vide_area">
                  <!-- <iframe width="100%" height="250" src="http://www.youtube.com/embed/h5QWbURNEpA?feature=player_detailpage" frameborder="0" allowfullscreen></iframe> -->
                </div>
              </div>
              <div role="tabpanel" class="tab-pane" id="comments">
                
              </div>
            </div>
          </div>
          
          <div class="single_sidebar wow fadeInDown">
            <h2><span>Links</span></h2>
            <ul>
              <li><a href="https://birganj.dinajpur.gov.bd/">Birganj Upazilla</a></li>
              
            </ul>
          </div>
        </aside>
      </div>
    </div>
  </section>
  <footer id="footer">
    <div class="footer_top">
      <div class="row">
      <!--  <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInLeftBig">
          <h2>Top Category</h2>
            <ul class="tag_nav">


          
        </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4">
          <div class="footer_widget wow fadeInDown">
            <h2>News Tag</h2>
            <ul class="tag_nav">

             
            </ul>
          </div>
        </div>
-->
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class=" wow fadeInRightBig">
            
            <p>
           
<span style="font-size:16px;"><b>যোগাযোগ</b></span><hr>
বীরগঞ্জ প্রতিদিন <br>
সম্পাদক মন্ডলীর সভাপতি-মো. ইয়াকুব আলী বাবুল <br>
সম্পাদক -মো. আব্দুর রাজ্জাক <br>
মোবাইল-০১৭১৬৪৪৬৩৩৮ <br>
ইমেল- birganjpratidin@gmail.com <br>
                  
            </p> 
            
          </div>
        </div>
      </div>
    </div>
    <div class="footer_bottom">
      <p class="copyright">Copyright &copy; 2024 <a href="index.php">Birganj Protidin</a></p>
      <p class="developer"><a href="http://mkrow.site" target="_blank" style='color:white;'>Developed By Mkrow Services</a></p>
    </div>
  </footer>
</div>
<script src="assets/js/script.js"></script> 
<script src="assets/js/jquery.min.js"></script> 
<script src="assets/js/wow.min.js"></script> 
<script src="assets/js/bootstrap.min.js"></script> 
<script src="assets/js/slick.min.js"></script> 
<script src="assets/js/jquery.li-scroller.1.0.js"></script> 
<script src="assets/js/jquery.newsTicker.min.js"></script> 
<script src="assets/js/jquery.fancybox.pack.js"></script> 
<script src="assets/js/custom.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/gh/AhmedMRaihan/BanglaDateJS@master/src/buetDateTime.js"></script>
</body>
</html>

<script>
  
  // Get current date
var currentDate = new Date();

// Define months and days arrays
var months = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
var days = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];

// Get various date components
var year = currentDate.getFullYear();
var month = months[currentDate.getMonth()];
var day = currentDate.getDate();
var dayOfWeek = days[currentDate.getDay()];

// Format the date
var formattedDate = dayOfWeek + ", " + month + " " + day + ", " + year;

// Output the formatted date
console.log(formattedDate);
//$("#dateDisplay").text(formattedDate);
  
/*
  function gregorianToBengali(gregorianDate) {
    // Define Bengali month names
    var bengaliMonths = [
        "বৈশাখ", "জ্যৈষ্ঠ", "আষাঢ়", "শ্রাবণ", "ভাদ্র", "আশ্বিন",
        "কার্তিক", "অগ্রহায়ণ", "পৌষ", "মাঘ", "ফাল্গুন", "চৈত্র"
    ];

    // Corresponding Bengali month start days in Gregorian calendar
    var bengaliMonthStart = [
        new Date(2024, 4, 14), // Baishakh
        new Date(2024, 5, 14), // Jyaistha
        new Date(2024, 6, 14), // Asharh
        new Date(2024, 7, 15), // Shraban
        new Date(2024, 8, 16), // Bhadra
        new Date(2024, 9, 17), // Ashwin
        new Date(2024, 10, 17), // Kartik
        new Date(2024, 11, 16), // Agrahayan
        new Date(2024, 12, 16), // Poush
        new Date(2025, 1, 15), // Magh
        new Date(2025, 2, 14), // Falgun
        new Date(2025, 3, 15) // Chaitra
    ];

    // Determine Bengali year
    var bengaliYear = gregorianDate.getFullYear() - 593;

    // Find Bengali month
    var i = 0;
    for (i = 0; i < 12; i++) {
        if (gregorianDate >= bengaliMonthStart[i]) {
            break;
        }
    }

    var bengaliMonth = bengaliMonths[i];
    var bengaliDay = gregorianDate.getDate();

    return bengaliDay + " " + bengaliMonth + ", " + bengaliYear + " বঙ্গাব্দ";
}

// Get current date
//var currentDate = new Date();

// Convert and display in Bengali calendar format
console.log(gregorianToBengali(currentDate)); */
var dateConverted = new buetDateConverter().convert(" j F, Y বঙ্গাব্দ || l A gটা iমিনিট");
$("#dateDisplay").text(formattedDate+"  ||  "+dateConverted);

</script>