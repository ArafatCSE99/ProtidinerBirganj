<?php

    $id=$_POST['id'];
    $name=$_POST['name'];
    $is_active=$_POST['is_active'];

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


$sqlc = "SELECT * FROM category where id=$id";
$resultc = $conn->query($sqlc);

if ($resultc->num_rows > 0) {

    $sql = "UPDATE category set name='$name',is_active='$is_active' where id=$id ";

}
else{
    $sql = "INSERT INTO category (`name`, `is_active`)
    VALUES ('$name', '$is_active')";
}



if ($conn->query($sql) === TRUE) {
  echo "Data Saved Successfully !!";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>