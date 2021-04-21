<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "customers";

$conn = mysqli_connect($servername,$username,$password,$database);
if(!$conn){
  die("sorry".mysqli_connect_error());
}
else{
  //echo "Connection to db successful<br>";
}

$sql = "SELECT * FROM `customers`";
$result = mysqli_query($conn,$sql);
$num = mysqli_num_rows($result);
if($num > 0){
}
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Customer List</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
  </head>
  <body>
    <h1>CUSTOMERS</h1>
    <div class="row">
      <div class="col">
        <div class="table-responsive-sm">
   	      <table class="table table-hover table-striped table-condensed table-bordered">
            <thead>
              <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>EMAIL</th>
                <th>BALANCE</th>
                <br>
              </tr>
            </thead>  
            <tbody>
              <?php while($row=mysqli_fetch_array($result)):?>
                <tr>
                <td><?php echo $row['ID'];?></td>
                <td><?php echo $row['NAME'];?></td>
                <td><?php echo $row['EMAIL'];?></td>
                <td><?php echo $row['BALANCE'];?></td>
                </tr>
              <?php endwhile;?>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="btn">
    <button type="button" onclick="location.href='indexx.html'" class="btn btn-outline-dark">HOME</button>
    </div>
  </body>
</html>
