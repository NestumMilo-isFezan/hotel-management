<?php
require "../template/adminpart.php";

if(isset($_GET["book"]) && $_GET["book"] != ""){
    $bookid = $_GET['book'];
    $sql = "UPDATE booking SET status = 'checkin' WHERE bookID = $bookid";

    if(mysqli_query($conn, $sql)){
        echo '<div class = "content">
            <div class = "table-title">
                <h2>Successful</h2>
                <div class = "icon">
                    <img src = "../../img/success.png">
                    <div class = "desc">
                        <p>Successful Check In Guest</p>
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
?>