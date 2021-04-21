<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION HISTORY</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
</head>

<body>

	<div class="container">
        <h1 class="text-center pt-4">TRANSACTION HISTORY</h1>

       <br>
       <div class="table-responsive-sm">
    <table class="table table-hover table-striped table-condensed table-bordered">
        <thead>
            <tr>
                <th class="text-center">SN</th>
                <th class="text-center">SENDER</th>
                <th class="text-center">RECEIVER</th>
                <th class="text-center">AMOUNT</th>
            </tr>
        </thead>
        <tbody>
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


            $sql ="select * from transactionhistory";

            $query =mysqli_query($conn, $sql);

            while($rows = mysqli_fetch_assoc($query))
            {
            ?>
              <tr>
              <td class="py-2"><?php echo $rows['SN']; ?></td>
              <td class="py-2"><?php echo $rows['SENDER']; ?></td>
              <td class="py-2"><?php echo $rows['RECEIVER']; ?></td>
              <td class="py-2"><?php echo $rows['AMOUNT']; ?> </td>
              </tr>

          <?php

            }

        ?>
        </tbody>
    </table>

    </div>
</div>
<div class=" hqq nav-btns">
<button type="button" onclick="location.href='indexx.html'" class="btn btn-outline-dark">HOME</button>
</div>
</body>
</html>
