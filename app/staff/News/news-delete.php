<?php
session_start();
include("../../config/config.php");


// This action is called when the Delete link is clicked
if (isset($_GET["id"]) && $_GET["id"] != "") {
    $id = $_GET["id"];

    // Delete record from the database
    $sql_delete = "DELETE FROM news WHERE newsID=" . $id;
    if (mysqli_query($conn, $sql_delete)) {
        echo "Record deleted successfully<br>";
        echo '<a href="index.php">Back</a>';
    } else {
        echo "Error deleting record: " . mysqli_error($conn) . "<br>";
        echo '<a href="index.php">Back</a>';
    }
}

mysqli_close($conn);
?>