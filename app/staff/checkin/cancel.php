<?php
session_start();
include('config.php');

if(isset($_GET["book"]) && $_GET["book"] != ""){

    $sql = "DELETE FROM booking WHERE bookID=" . $_GET['book'];

    if(mysqli_query($conn, $sql)){
        echo '<div class = "content">
            <div class = "table-title">
                <h2>Successful</h2>
                <div class = "icon">
                    <img src = "../../img/success.png">
                    <div class = "desc">
                        <p>Successful Remove Book Record</p>
                    </div>
                </div>
            </div>
        </div>';
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
        </div>';
    }
}

mysqli_close($conn);
?>