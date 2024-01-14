<?php
session_start();
include("../../config/config.php");

//variables
$hotelID="";
$action="";
$id="";
$newstitle = "";
$article = "";
$descriptiom =" ";
$remark = "";

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //values for add or edit
    $hotelID = 1;
    $newstitle = $_POST["newstitle"];
    $article = $_POST["article"];
    $descriptiom = trim($_POST["descriptiom"]);
    $remark = trim($_POST["remark"]);
    
    $sql = "INSERT INTO news (hotelID, newstitle, article, descriptiom, remark)
    VALUES (" . $hotelID . ", '" . $newstitle . "', '" . $article . "', '" . $descriptiom . "', '" . $remark . "')";
        
$status = insertTo_DBTable($conn, $sql);
    
if ($status) {
        echo "Form data saved successfully!<br>";
        echo '<a href="index.php">Back</a>';
} 
else {
        echo '<a href="index.php">Back</a>';
     }

}







//close db connection
mysqli_close($conn);

//Function to insert data to database table
function update_DBTable($conn, $sql){
    if (mysqli_query($conn, $sql)) {
        return true;
    } else {
        echo "Error: " . $sql . " : " . mysqli_error($conn) . "<br>";
return false;
    }
}
?>