<?php
include("../../directory.php");
include(CONFIG_DIR."/config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $roomID = $_POST['roomID'];
        $guestID = $_POST['guestID'];
        $services = $_POST['services'];
        $checkin = strtotime($_POST["checkin"]);
        $checkin = date('Y-m-d H:i:s', $checkin);
        $checkout = strtotime($_POST["checkout"]);
        $checkout = date('Y-m-d H:i:s', $checkout);
        $totalprice = $_POST['totalprice'];

        $sql = "INSERT INTO booking(roomID, guestID, serviceID, check_in, check_out, total_price, status)
        VALUES($roomID, $guestID, $services, '$checkin', '$checkout', $totalprice, 'available')";

        mysqli_query($conn, $sql);

        mysqli_close($conn);
    }
?>
