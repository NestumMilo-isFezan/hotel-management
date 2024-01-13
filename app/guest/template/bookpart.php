<?php 
// Prepare To Fetch Data
session_start();
$hotelID = $_SESSION['hotelID'];
$uploadpath = "../../upload/";
include "../../config/config.php";

if(!isset($_SESSION['userID'])){
    header('loation');
}

if(!isset($_GET['room'])){
    header("refresh:0; url=../../index.php");
}
else{
    $roomID = $_GET['room'];
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

    // Room  Data
    $roomdata = fetchOne("SELECT room.*, roomtype.*
                            FROM room JOIN roomtype
                            ON room.typeID=roomtype.typeID
                            WHERE room.hotelID=$hotelID AND room.roomID= $roomID");

    $roomNo = $roomdata['roomNo'];
    $roomname = $roomdata['name'];
    $roomdesc = $roomdata['description'];
    $roomprice = $roomdata['price'];
    $capacity = $roomdata['capacity'];

    $roomimg = $uploadpath . "roomtype/" . $roomdata['room_imgpath'];

    if(!file_exists($roomimg) || $roomdata['room_imgpath']=="") { 
        $roomimg = $uploadpath . "roomtype/default.jpg";
    }

}


?>