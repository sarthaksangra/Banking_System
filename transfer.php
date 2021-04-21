<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSFER MONEY</title>
    <link rel="stylesheet"  href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>
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
  // echo "Connection to db successful<br>";
}

    $sql = "SELECT * FROM customers";
    $result = mysqli_query($conn,$sql);
?>

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
  // echo "Connection to db successful<br>";
}
?>
<div class="container">
        <h1 class="text-center pt-4">TRANSFER MONEY</h1>
        <br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                    <table class="table table-hover table-sm table-striped table-condensed table-bordered">
                        <thead>
                            <tr>
                            <th scope="col" class="text-center py-2">NAME</th>
                            <th scope="col" class="text-center py-2">E-EMAIL</th>
                            <th scope="col" class="text-center py-2">BALANCE</th>
                            <th scope="col" class="text-center py-2">TRANSACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                <?php
                    while($rows=mysqli_fetch_assoc($result)){
                ?>
                    <tr>

                        <td class="py-2"><?php echo $rows['NAME']?></td>
                        <td class="py-2"><?php echo $rows['EMAIL']?></td>
                        <td class="py-2"><?php echo $rows['BALANCE']?></td>
                        <td><a href="user_details.php?id= <?php echo $rows['ID'] ;?>"> <button type="button" class="btn">Transfer</button></a></td>
                    </tr>
                <?php
                    }
                ?>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
         </div>
         <div class=" hqq nav-btns">
         <button type="button" onclick="location.href='indexx.html'" class="btn btn-outline-dark">HOME</button>
         </div>
</html>
