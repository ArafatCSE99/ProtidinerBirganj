<?php

include "../../connection.php";

$id=$_POST["id"];

$sql = "SELECT a.*,b.name as category_name FROM news a,category b where a.category_id=b.id and a.id=$id";
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
                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
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