<?php
session_start();
include("config.php");
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset = "UTF-8">
        <meta name = "viewport" content = "width=device-width, initial-scale = 1.0">
        <title>Hotel Management System</title>
        <link rel = "stylesheet" href = "css/style.css">
        <link rel = "stylesheet" href = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>

    <body>
        <div class = "content">
            <h1>Manage Check In</h1>

            <div class = "table-content">
                <table border="1" width="100%" id="projectable">
                    <tr>
                        <th width="5%">No</th>
                        <th width="35%">Guest Name</th>
                        <th width="15%">Room No.</th>
                        <th width="15">Check In Date</th>
                        <th width="15%">Check Out Date</th>
                        <th width="15%">Modify</th>
                    </tr>
                    <?php
                    $sql = "SELECT booking.*, room.*, guest.* FROM booking
                    JOIN room ON booking.roomID = room.roomID
                    JOIN guest ON booking.guestID = guest.guestID";
                    $result = mysqli_query($conn, $sql);
                    if (!$result) {
                        die('Query failed: ' . mysqli_error($conn));
                    }

                    if (mysqli_num_rows($result) > 0) {
                        // output data of each row
                        $numrow = 1;
                        while ($row = mysqli_fetch_assoc($result)) {
                            echo "<tr>";
                            echo "<td>" . $numrow . "</td><td>" . $row["firstName"] . " " . $row["lastName"] . "</td><td>" . $row["roomID"] . "</td><td>" . $row["check_in"] .
                                "</td><td>" . $row["check_out"] . "</td>";
                            echo '<td> <a href="checkin.php?id=' . $row["bookID"] . '">Check-In</a>&nbsp;|&nbsp;';
                            echo '<a href="cancel.php?id=' . $row["bookID"] . '">Cancel</a> </td>';
                            echo "</tr>" . "\n\t\t";
                            $numrow++;
                        }
                    } 
                    else {
                        echo '<tr><td colspan="7">No results ! :(</td></tr>';
                    }
                    mysqli_close($conn);
                    ?>
                </table>
            </div>
        </div>
    </body>
</html>
