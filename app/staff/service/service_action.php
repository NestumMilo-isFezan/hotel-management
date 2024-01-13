<?php
session_start();
include('../../config/config.php');

//variables
$action ="";
$id="";
$name = "";
$description = "";
$price =" ";
$status = "";

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $hotelID = 1;
    $id = $_POST['serviceID'];
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $status = $_POST['status'];

    $sql = "INSERT INTO hotelservice (hotelID, name, description, price, servicestatus)
    VALUES ('" . $hotelID . "', '" . $name . "', '" . $description . "', '" . $price . "','" . $status . "')";

    $status = insertTo_DBTable($conn, $sql);

    if($status){
        echo '<div class = "content">
            <div class = "table-title">
                <h2>Successful</h2>
                <div class = "icon">
                    <img src = "../../img/success.png">
                    <div class = "desc">
                        <p>Successful Add Service</p>
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
                        <p>SQL went wrong..</p>
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

//Function to insert data to database table
function insertTo_DBTable($conn, $sql){
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
        return false;
    }
}
?>