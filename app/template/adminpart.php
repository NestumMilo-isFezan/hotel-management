<?php 
// Prepare To Fetch Data
session_start();
$hotelID = $_SESSION['hotelID'];
include (CONFIG_DIR."/config.php");


if(isset($_SESSION['staffID'])){
        // Fetch Staff Data
        $userID = $_SESSION['staffID'];
        $staffdata = fetchOne("SELECT * FROM staff WHERE staffID=$userID");
        $userIcon = ICON_DIR."/user_icon.png";
        
        $staffID = $staffdata['staffID'];
        $hotelID = $staffdata['hotelID'];
        $firstName = $staffdata['firstName'];
        $lastName = $staffdata['lastName'];
        $contact = $staffdata['contact'];

        // Fetch Hotel Data
        $hoteldata = fetchOne("SELECT * FROM hotel WHERE hotelID=$hotelID");
        $hotelicon = UPLOAD_DIR."/home/home_icon.png";

        $hotelname = $hoteldata['hotelname'];
        $info = $hoteldata['info'];
        $about= $hoteldata['about'];
        $hotelimg = UPLOAD_DIR."/home/".$hoteldata['img_path'];
    
        $contact = $hoteldata['contact'];
        $email = $hoteldata['email'];
    
        $address = $hoteldata['address'];
        $city = $hoteldata['city'];
        $postcode = $hoteldata['postcode'];
        $statename = $hoteldata['state'];
        $countryname = $hoteldata['country'];
        $fulladdress = "$address, "."$city, "."$postcode, "."$statename, "."$countryname ";

}
else{
    header('Location: ../index.php');
}
?>