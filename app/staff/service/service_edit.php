<?php
session_start();
include("../../config/config.php");
?>

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>

<body onLoad="show_AddEntry()">

    <div >
        <h1>Manage Service</h1>
    </div>

    <h2>Type Of Service Available</h2>

    <?php
    $id= "";
    $name = "";
    $description = "";
    $price = "";
    $status = "";

    if(isset($_GET["id"]) && $_GET["id"] != ""){
        $serviceid = $_GET["id"];
        $hotel_id = $_SESSION["hotelID"];

        $sql = "SELECT * FROM hotelservice WHERE serviceID = '$serviceid' AND hotelID = '$hotel_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["serviceID"];
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $status = $row["servicestatus"];
        }
    }
    mysqli_close($conn);
    ?>

    <div style="padding:0 10px;">
        <h3>Edit Service in the Hotel</h3>
        <p>Required field with mark*</p>

        <form method="POST" action="service_edit_action.php" enctype="multipart/form-data">
            <!--hidden value: id to be submitted to action page-->
            <input type="hidden" id="serviceid" name="serviceid" value="<?= $id ?>">
            <table border="1"> 
                <tr>
                    <td>Service Name*</td>
                    <td>:</td>
                    <td>
                        <?php
                        if ($name != "") {
                            echo '<input type="text" name="name" size="5" value="' . $name . '" required>';
                        } 
                        else {
                        ?>
                            <input type="text" name="name" required>
                        <?php
                        }
                        ?>                                   
                    </td>
                </tr>
                <tr>
                    <td>Description*</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="description" cols="20" required><?php echo $description; ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price (RM)*</td>
                    <td>:</td>
                    <td>
                        <?php
                        if ($price != "") {
                            echo '<input type="text" name="price" size="5" value="' . $price . '" required>';
                        } 
                        else {
                        ?>
                            <input type="text" name="price" required>
                        <?php
                        }
                        ?>                                   
                    </td>
                </tr>
                <tr>
                    <td>Status*</td>
                    <td>:</td>
                    <td>
                        <select size="1" name="status" id="status" required>
                            <option value="">&nbsp;</option>
                            <?php
                            if ($status == "Available")
                                echo '<option value="Available" selected>Available</option>';
                            else
                                echo '<option value="Available">Available</option>';

                            if ($status == "Unavailable")
                                echo '<option value="Unavailable" selected>Unavailable</option>';
                            else
                                echo '<option value="Unavailable">Unavailble</option>';
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right"> 
                    <input type="submit" value="Submit" name="B1">                
                    <input type="reset" value="Reset" name="B2">
                    </td>
                </tr>
            </table>    
        </form>
    </div>
</body>
</html>