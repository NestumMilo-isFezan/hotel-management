<?php
session_start();
include("../../config/config.php");

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = $_POST['payid'];
    $pay = $_POST['amountpay'];
    $balance = $_POST['amountpay'] - $_POST['total_price'];
    $paymethod = $_POST['paymethod'];

    $sql = "INSERT INTO payment (bookID, amountpay, balance, method) VALUES ('$id', '$pay', '$balance', '$paymethod')";

    if(mysqli_query($conn, $sql)){
        echo '<div class = "content">
            <div class = "table-title">
                <h2>Successful</h2>
                <div class = "icon">
                    <img src = "../../img/success.png">
                    <div class = "desc">
                        <p>Payment Successful ! :)</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 4000);
          </script>';
    }
    else{
        echo '<div class = "content">
            <div class = "table-title">
                <h2>Unsuccessful</h2>
                <div class = "icon">
                    <img src = "../../img/db-error.png">
                    <div class = "desc">
                        <p>SQL error: ' . mysqli_error($conn) . '</p>
                    </div>
                </div>
            </div>
        </div>
        <script>
            setTimeout(function() {
                window.location.href = "index.php";
            }, 4000);
          </script>';
    }
}

mysqli_close($conn);
?>