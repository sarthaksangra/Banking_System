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

if(isset($_POST['submit']))
{
    $from = (isset($_GET['id']) ? $_GET['id'] : '');;
    $to = $_POST['to'];
    $amount = $_POST['amount'];

    $sql = "SELECT * from customers where id=$from";
    $query = mysqli_query($conn,$sql);
    $sql1 = mysqli_fetch_array($query); // returns array or output of user from which the amount is to be transferred.

    $sql = "SELECT * from customers where id=$to";
    $query = mysqli_query($conn,$sql);
    $sql2 = mysqli_fetch_array($query);

    if (($amount) < 0) {
        echo '<script>';
        echo ' alert("Please enter correct amount.")';  // showing an alert box.
        echo '</script>';
    }

    else if ($amount > $sql1['BALANCE']) {
        echo '<script>';
        echo ' alert("Bad Luck! Insufficient Balance")';  // showing an alert box.
        echo '</script>';
    }

    else if ($amount == 0) {

        echo "<script>";
        echo "alert('Oops! Zero value cannot be transferred')";
        echo "</script>";
    }

    else {
                $sql = "SELECT * from customers where id=$to";
                $query = mysqli_query($conn, $sql);
                $sql2 = mysqli_fetch_array($query);

                $sender = $sql1['NAME'];
                $receiver = $sql2['NAME'];

                // deducting amount from sender's account
                $newbalance = $sql1['BALANCE'] - $amount;
                $sql = "UPDATE customers set BALANCE=$newbalance where id=$from";
                mysqli_query($conn,$sql);


                // adding amount to reciever's account
                $newbalance = $sql2['BALANCE'] + $amount;
                $sql = "UPDATE customers set BALANCE=$newbalance where id=$to";
                mysqli_query($conn,$sql);


                $sql = "INSERT INTO transactionhistory('SENDER', 'RECEIVER', 'AMOUNT') VALUES ('$sender','$receiver','$amount')";
                $query=mysqli_query($conn,$sql);

                
                echo "<script> alert('Transaction Successful !!');
                window.location='indexx.html';
      </script>";
                

                $newbalance= 0;
                $amount =0;
        }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSACTION</title>
    <link rel="stylesheet" href="style2.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<body>


	<div class="container">
        <h1 class="text-center pt-4">TRANSACTION</h1>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "customers";

            $conn = mysqli_connect($servername,$username,$password,$database);
            if(!$conn){
              die("sorry".mysqli_connect_error());
            }
            else
            {
              // echo "Connection to db successful<br>";
            }

                $sid = (isset($_GET['id']) ? $_GET['id'] : '');
                $sql = "SELECT * FROM  customers where id='$sid'";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error : ".$sql."<br>".mysqli_error($conn);
                }
            $row=mysqli_fetch_array($result)  ;
            ?>
            <form method="post" name="tcredit" class="tabletext" ><br>
            <div class="row">
                <div class="col">
                    <div class="table-responsive-sm">
                        <table class="table table-striped table-condensed table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">ID</th>
                                    <th class="text-center">NAME</th>
                                    <th class="text-center">EMAIL</th>
                                    <th class="text-center">BALANCE</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-2"><?php echo $row['ID'] ?></td>
                                    <td class="py-2"><?php echo $row['NAME'] ?></td>
                                    <td class="py-2"><?php echo $row['EMAIL'] ?></td>
                                    <td class="py-2"><?php echo $row['BALANCE'] ?></td>
                                </tr>
                            </tbody>    
                        </table>
                    </div>
                </div>
            </div>
        <br><br><br>
        <label  >TRANSFER TO:</label>
        <select name="to" class="form-control" required>
            <option value="" disabled selected>Choose</option>
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $database = "customers";

            $conn = mysqli_connect($servername,$username,$password,$database);
            if(!$conn){
              die("sorry".mysqli_connect_error());
            }
            else
            {
              //echo "Connection to db successful<br>";
            }

                $sid=(isset($_GET['id']) ? $_GET['id'] : '');
                $sql = "SELECT * FROM customers where id!=$sid";
                $result=mysqli_query($conn,$sql);
                if(!$result)
                {
                    echo "Error ".$sql."<br>".mysqli_error($conn);
                }
                while($rows = mysqli_fetch_assoc($result)) {
            ?>
                <option class="table" value="<?php echo $rows['ID'];?>" >

                    <?php echo $rows['NAME'] ;?> (BALANCE:
                    <?php echo $rows['BALANCE'] ;?> )

                </option>
            <?php
                }
            ?>
            <div>
        </select>
        <br>
        <br>
            <label>AMOUNT:</label>
            <input type="number" class="form-control" name="amount" required>
            <br><br>
                <div class="text-center" >
            <button class="btn btn-dark" name="submit" type="submit" id="myBtn" style="color:white">TRANSFER</button>
            </div>
        </form>
    </div>
    <div class=" hqq nav-btns">
    <button type="button" onclick="location.href='indexx.html'" class="btn btn-dark">HOME</button>
    </div>
</body>
</html>
