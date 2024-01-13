<?php 
// Prepare To Fetch Data
session_start();
$hotelID = $_SESSION['hotelID'];
$uploadpath = "../../upload/";
include "../../config/config.php";

if(!isset($_SESSION['userID'])){
    header('lcoation');
}

// Fetch hotel and Room Data
$hoteldata = fetchOne("SELECT * FROM hotel WHERE hotelID=$hotelID");
$hotelicon = $uploadpath."home/home_icon.png";
if($hoteldata!=null){
    $hotelname = $hoteldata['hotelname'];
    $info = $hoteldata['info'];
    $about= $hoteldata['about'];
    $hotelimg = "../../upload/home/".$hoteldata['img_path'];

    $contact = $hoteldata['contact'];
    $email = $hoteldata['email'];

    $address = $hoteldata['address'];
    $city = $hoteldata['city'];
    $postcode = $hoteldata['postcode'];
    $statename = $hoteldata['state'];
    $countryname = $hoteldata['country'];
    $fulladdress = "$address, "."$city, "."$postcode, "."$statename, "."$countryname ";
}


?>