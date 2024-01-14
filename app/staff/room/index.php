<?php
session_start();
include("../../config/config.php");
?>
<!DOCTYPE html>
<html>

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>

<body>

    <div>
        <h1>Room</h1>
    </div>

    <div>
        <table border="1">
            <tr>
                <th width="20%">RoomID</th>
                <th width="20%">HotelID</th>
                <th width="20%">TypeID</th>
                <th width="20%">Room Status</th>
                <th width="15%">Room No</th>
                <th width="10%">Action</th>
            </tr>

            <?php
                $sql = "SELECT room.*, roomtype.* FROM room LEFT JOIN roomtype ON room.typeID = roomtype.typeID";

                $result = mysqli_query($conn, $sql);

                if (!$result) {
                    die('Query failed: ' . mysqli_error($conn));
                }
                
                if (mysqli_num_rows($result) > 0) {
                    
                    // output data of each row
                    $numrow=1;
                    while($row = mysqli_fetch_assoc($result)) {
                        echo "<tr>";
                        echo "<td>" . $numrow . "</td><td>". $row["hotelID"] . " " . $row["typeID"]. "</td><td>" . $row["roomstatus"] .
                            "</td><td>" . $row["roomNo"] ."</td>";
                        echo '<td> <a href="room_edit.php?id=' . $row["roomID"] . '">Edit</a>&nbsp;|&nbsp;';
                        echo '<a href="room_delete.php?id=' . $row["roomID"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                        echo "</tr>" . "\n\t\t";
                        $numrow++;
                    }
                } else {
                    echo '<tr><td colspan="6">0 results</td></tr>';
                } 
                
                mysqli_close($conn);
            ?>
        </table>

    <?php
        if(isset($_SESSION["hotelID"])){
    ?>
        <div >
        <input type= "button"  onClick="show_AddEntry()" style="cursor: pointer;" value= "Add New"/>
        <input type= "button"  onClick="cancelRegister()" style="cursor: pointer;" value="Cancel"/>
        </div>
    
    <?php
    }
    ?>
    </div>

    <div >
    
        <p>Required field with mark*</p>

        <form method="POST" action="room_action.php" enctype="multipart/form-data">
            <table border="3">
            <tr>
                <td>Room Status*</td>
                <td>:</td>
                <td>
                    <input type="text" name="roomstatus" required>                                    
                </td>
            </tr>
            <tr>
                <td>Room No*</td>
                <td>:</td>
                <td>
                    <input type="number" name="roomNo" required>                                    
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