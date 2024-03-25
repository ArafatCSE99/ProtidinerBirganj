
<?php
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


?>

<style>
  /* CSS styles for the table */
  #newsTbl {
    border-collapse: collapse;
    width: 100%;
  }

  #newsTbl th, #newsTbl td {
    border: 1px solid #ddd;
    padding: 8px;
    text-align: left;
    vertical-align: top; /* Align text to the top of cells */
  }

  #newsTbl th {
    background-color: #C8B1AD;
    color: black;
  }

  #newsTbl tbody tr:hover {
    background-color: #f5f5f5;
  }
</style>

<div class="page-header">
              <h3 class="page-title"> News </h3>
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a>News Centre</a></li>
                  <li class="breadcrumb-item active" aria-current="page">News</li>
                </ol>
              </nav>
</div>

<div class="row">
              <div class="col-md-12 grid-margin stretch-card">
                
              
              
              <div class="card">
                  
              <div class="card-body">
                    
              <h4 class="card-title">News List</h4>                 
                    <table id="newsTbl">
                      <thead style="background-color:#C8B1AD; color:black;">
                        <tr>
                          <th> # </th>
                          <th> Head Line </th>
                          <th> News </th> 
                          <th> Image </th> 
                          <th> Category </th>
                          <th> Active Status </th> 
                          <th> Action </th>                  
                        </tr>
                      </thead>
                      <tbody>
<?php
$sql = "SELECT * FROM News";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
     $slno++;
     $id=$row["id"];
     $headline=$row["headline"];
     $news=$row["news"];
     $category_id=$row["category_id"];
     $image_url="API/".$row["image_url"];
     
     $is_active="Inactive";
     if($row["is_active"]==1)
     {
        $is_active="Active";
     }

$category_name="";
$sqlc = "SELECT * FROM Category where id=$category_id";
$resultc = $conn->query($sqlc);
if ($resultc->num_rows > 0) {
  // output data of each row
  while($rowc = $resultc->fetch_assoc()) {
      $category_name=$rowc["name"];
  }
}
  
     echo "<tr style='height:300px; '>";
     echo "<td>".$slno."</td>";
     echo "<td class='headline'>".$headline."</td>";
     echo "<td class='news'>".$news."</td>";
     echo "<td class='image_url'><img src='$image_url'  width='100px;'  height='100px;' style='border-radius:0% !important;' ></td>";
     echo "<td class='category_name'>".$category_name."</td>";
     echo "<td class='is_active'>".$is_active."</td>";
     
     echo "<td> 
     <i class='fa fa-edit' aria-hidden='true' style='cursor: pointer;' onclick='EditNews($id,this)'></i>
     &nbsp;&nbsp;
     <i class='fa fa-trash' aria-hidden='true' style='cursor: pointer;' onclick=\"Delete($id,'news')\"></i>    
     </td>"; 
     echo "</tr>";

  }
} 

?>
                       
                      </tbody>
                    </table>
                    
                    
              </div>
              
              <div class="card-body">
                    <h4 class="card-title">Add News</h4>
                    
                    <form class="forms-sample">
                      <div class="form-group">
                        <label for="headline">Head Line</label>
                        <input type="text" class="form-control" id="headline" placeholder="News Head Line" >
                      </div>
                      <div class="form-group">
                        <label for="News">News</label>
                        <textarea class="form-control" rows="8" id="news" placeholder="News Details" style="resize: both;"></textarea>
                      </div>

                      <div class="container mt-5">
<label for="imageInput">Upload News Image</label>
  <input type="file" id="imageInput" class="form-control-file">
  <div id="imagePreview" class="mt-3"></div>
</div>

<br>
                      <label for="sel1" class="form-label">Select News Category:</label>
    <select class="form-select" id="category_id" >
    <?php
$sql = "SELECT * FROM category";
$result = $conn->query($sql);
$slno=0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    $id=$row["id"];
    $name=$row["name"];
    echo "<option value='$id'>".$name."</option>";
  }
}
?>
    </select>

                      <div class="form-check form-check-success">
                            <label > 
                            Is Active <input style="margin-left:20px;"  id="isactive" type="checkbox" class="form-check-input" checked/>  
                            </label>
                        </div>
                      <button type="button" onclick="saveImage()" class="btn btn-primary mr-2">Submit</button>
                      <button class="btn btn-light">Cancel</button>
                    </form>
                  </div>

                 

                </div>
              </div>


<script>
$(document).ready(function() {
    // Function to preview image after validation
    $("#imageInput").change(function(){
      var file = this.files[0];
      var reader = new FileReader();
      reader.onload = function(e) {
        $("#imagePreview").html('<img src="'+e.target.result+'" class="img-fluid preview-image">');
      };
      reader.readAsDataURL(file);
    });
  });
</script>