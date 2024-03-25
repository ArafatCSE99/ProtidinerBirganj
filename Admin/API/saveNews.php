<?php

    $id=$_POST['id'];
    $headline=$_POST['headline'];
    $news=$_POST['news'];
    $category_id=$_POST['category_id'];
    $is_active=$_POST['is_active'];
    $image_url=$_POST['image_url'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pbdb";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


$sqlc = "SELECT * FROM news where id=$id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {

    $sql = "UPDATE news set headline='$headline',news='$news',category_id='$category_id',is_active='$is_active',image_url='$image_url' where id=$id ";

}
else{
    $sql = "INSERT INTO news (`category_id`, `headline`, `news`, `image_url`, `is_active`)
    VALUES ('$category_id','$headline','$news','$image_url', '$is_active')";
}



if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>