<?php
session_start();
include("../../config/config.php");

//variables
$hotelID="";
$action="";
$newsID="";
$newstitle = "";
$article = "";
$descriptiom =" ";
$remark = "";

//this block is called when button Submit is clicked
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    //values for add or edit
    $hotelID = 1;
    $newsID = $_POST["nid"];
    $newstitle = $_POST["newstitle"];
    $article = $_POST["article"];
    $descriptiom = trim($_POST["descriptiom"]);
    $remark = trim($_POST["remark"]);

$sql="UPDATE news SET newstitle= '$newstitle', article ='$article', descriptiom = '$descriptiom', 
remark = '$remark' WHERE newsID = $newsID AND hotelID = '$hotelID'";
        
$status = update_DBTable($conn, $sql);
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