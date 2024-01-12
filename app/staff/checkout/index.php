<?php
require "../template/adminpart.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Hotel</title>
        <link href="" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body data-bs-theme="dark">
        <!-- Navbar -->
        <?php 
        require "../template/navlogic.php";
        ?>
        <!-- End Navbar -->

        <!-- Header -->
        <section class="text-center mh-50" style="background-image: url('<?= $hotelimg?>'); background-size:cover; background-repeat: no-repeat;">
        <div class="px-2 pt-2 w-100 y-100 h-100 d-flex" style="background: rgb(32,32,39); background: linear-gradient(90deg, rgba(32,32,39,0.3) 0%, rgba(53,53,78, 0.3) 28%, rgba(94,94,108, 0.3) 70%, rgba(111,106,106, 0.3) 100%); backdrop-filter: blur(5px);">
            <div class="px-2 pt-2 pt-sm-3 m-auto" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">
            <div>
                <h1 class="display-5" style="font-family: 'Staatliches';"><?= $hotelname?><br><span class="display-2" style="color:#22092C;">Manage Check-Out</span></h1>
            </div>
            </div>
        </div>
        </section>

        <div class = "content">
            <br>
            <div><!--col1-->
                <div class = "table header">
                    <h2>| Ready To Check-Out List</h2>
                </div>
                <div class = "table-content">
                    <table class = "table table-bordered table-hover" width="100%">
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
                        JOIN guest ON booking.guestID = guest.guestID
                        WHERE booking.status = 'checkin'";

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
                                echo '<td> <a href="checkout.php?id=' . $row["bookID"] . '">Check-Out</a>&nbsp;|&nbsp;';
                                echo '<a href="cancel.php?id=' . $row["bookID"] . '">Cancel</a> </td>';
                                echo "</tr>" . "\n\t\t";
                                $numrow++;
                            }
                        } 
                        else {
                            echo '<tr><td colspan="7">No results ! :(</td></tr>';
                        }
                        ?>
                    </table>
                </div>
            </div>
            <br>
            <div><!--col2-->
                <div class = "table header">
                    <h2>| Checked Out Guest List</h2>
                </div>
                <div class = "table content">
                    <table class = "table table-bordered table-hover" width="100%">
                        <tr>
                            <th width="5%">No</th>
                            <th width="35%">Guest Name</th>
                            <th width="15%">Room No.</th>
                            <th width="15">Check In Date</th>
                            <th width="15%">Check Out Date</th>
                            <th width="15%">Status</th>
                        </tr>
                        <?php
                        $sql = "SELECT booking.*, room.*, guest.* FROM booking
                        JOIN room ON booking.roomID = room.roomID
                        JOIN guest ON booking.guestID = guest.guestID
                        WHERE booking.status = 'checkout'";

                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Query failed: ' . mysqli_error($conn));
                        }

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $numrow = 1;
                            $updated_status = 'checked-out';
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $numrow . "</td><td>" . $row["firstName"] . " " . $row["lastName"] . "</td><td>" . $row["roomID"] . "</td><td>" . $row["check_in"] .
                                    "</td><td>" . $row["check_out"] . "</td><td>" . $updated_status . "</td>";
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
        </div>
            <!-- Footer -->
        <?php 
        require_once('../template/footer.php');
        ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
