<?php
    require "../../config/config.php";
    //ini query untuk send action post senang cerita untuk view profile laa
    $sql = ' SELECT guest.*, useracc.*
                FROM guest
                JOIN account ON guest.accID = useracc.accID
                WHERE guest.guestID = '.$guestID;
    $guestdata = fetchOne($sql);
    
    if ($guestdata!= null) {
        $guestID = $guestdata['guestID'];
        $accountID = $guestdata['accID'];
        $birthdate = $guestdata['birthdate'];
        $address =  $guestdata['address'];
        $postcode = $guestdata['postcode'];
        $city = $guestdata['city'];
        $state = $guestdata['state'];
        $country = $guestdata['country'];
    }
    
?>
<!--ini header untuk profile punya -->
<div>
	<h1>My Profile</h1>
	</div>
		<!--php function for navbar kalau kau buat-->
		