<?php
session_start();
include("../../config/config.php");
?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  
</head>

<body onLoad="show_AddEntry()">
    <div>
        <h1>Roomtype Edit</h1>
    </div>

    <h2>List of Roomtype</h2>

    <?php
    $id = "";
    $name = "";
    $description = "";
    $price = "";
    $capacity = "";
    $room_imgpath = "";

    if (isset($_GET["id"]) && $_GET["id"] != "") {
        $roomtype_id = $_GET["id"];
        $hotel_id = $_SESSION["hotelID"];

        $sql = "SELECT * FROM roomtype WHERE typeID = '$roomtype_id' AND hotelID = '$hotel_id'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row["typeID"];
            $name = $row["name"];
            $description = $row["description"];
            $price = $row["price"];
            $capacity = $row["capacity"];
            $room_imgpath = $row["room_imgpath"];
        }
    }

    mysqli_close($conn);
    ?>

    <div>
        <h3>Edit Roomtype</h3>
        <p>Required field with mark*</p>

        <form method="POST" action="roomtype_edit_action.php" enctype="multipart/form-data">
            <!--hidden value: id to be submitted to action page-->
            <input type="hidden" id="rtid"name="rtid" value="<?= $id ?>">
            <table border="1">
                <tr>
                    <td>Name*</td>
                    <td>:</td>
                    <td>
                        <?php
                        if ($name != "") {
                            echo '<input type="text" name="name" size="5" value="' . $name . '" required>';
                        } else {
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
                    <td>Price*</td>
                    <td>:</td>
                    <td>
                        <?php
                        if ($price != "") {
                            echo '<input type="text" name="price" size="5" value="' . $price . '" required>';
                        } else {
                        ?>
                            <input type="text" name="price" required>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Capacity*</td>
                    <td>:</td>
                    <td>
                        <?php
                        if ($capacity != "") {
                            echo '<input type="text" name="capacity" size="5" value="' . $capacity . '" required>';
                        } else {
                        ?>
                            <input type="text" name="capacity" required>
                        <?php
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <td>Photo</td>
                    <td>:</td>
                    <td>
                        <input type="text" disabled value="<?= $room_imgpath; ?>">
                    </td>
                </tr>
                <tr>
                    <td>Upload photo</td>
                    <td>:</td>
                    <td>
                        Max size: 1.0mb<br>
                        <input type="file" name="fileToUpload" id="fileToUpload" accept=".jpg, .jpeg, .png">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right">
                        <input type="submit" value="Submit" name="B1">
                        <input type="button" value="Reset" name="B2" onclick="resetForm()">
                        <input type="button" value="Clear" name="B3" onclick="clearForm()">
                    </td>
                </tr>
            </table>
        </form>
    </div>

</body>
</html>