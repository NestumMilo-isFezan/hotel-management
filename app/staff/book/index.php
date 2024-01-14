<?php
require("../../directory.php");
require (TEMP_DIR."/adminpart.php");
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Manage Guest Booking</title>
        <link href="" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Staatliches" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Poppins" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    </head>

    <body class="vh-100" data-bs-theme="dark"> 
        <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
            <i class='bx bx-menu fs-3'></i>
        </button>

    <div class="offcanvas offcanvas-start h-100" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <div>
                <a href="./index.php" class="d-flex align-items-center mb-0 mb-md-3 me-md-auto text-white text-decoration-none">
                    <img src="<?= $hotelicon?>" alt="<?= $hotelname?>" width="33" height="33" class="me-sm-2">
                    <span class="fs-5 fw-bold"><?= $hotelname?></span>
                </a>
                <hr>
                <ul class="flex-column mb-auto list-group mx-1">
                    <li class="list-group-item">
                        <a href="#" class="nav-link text-white">
                            <i class='bx bxs-home me-sm-2 fs-4'></i>
                            <span class="d-inline-block">Home</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="nav-link text-white">
                            <i class='bx bxs-building-house me-sm-2 fs-4' ></i>
                            <span class="d-inline-block">Manage Hotel</span>
                        </a>
                    </li>
                    <li class="list-unstyled">
                        <div class="accordion" id="accordionExample">
                            <div class="accordion-item">
                                <h3 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                                    <i class='bx bxs-hotel fs-4' ></i>&nbsp;<span class="ms-1 d-inline-block">Manage Room</span>
                                </button>
                                </h3>
                                <div id="collapseOne" class="accordion-collapse collapse collapse" data-bs-parent="#accordionExample">
                                <div class="accordion-body">
                                    <div class="container-fluid w-100 h-100">
                                        <ul class="btn-toggle-nav list-unstyled fw-normal list-group">
                                            <li class="list-group-item"><a href="#" class="link-body-emphasis text-decoration-none rounded mb-sm-3"><i class='bx bxs-plus-square me-sm-2 fs-4' ></i><span class="d-inline-block">Hotel Room</span></a></li>
                                            <li class="list-group-item"><a href="#" class="link-body-emphasis text-decoration-none rounded mb-sm-1"><i class='bx bxs-layer-plus me-sm-2 fs-4'></i><span class="d-inline-block">Room Type</span></a></li>
                                        </ul>
                                    </div>
                                </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <a href="#" class="nav-link text-white">
                        <i class='bx bxs-cog me-sm-2 fs-4' ></i>
                        <span class="d-inline-block">Manage Service</span>
                        </a>
                    </li>
                    <li class="list-group-item active">
                        <a href="../book/index.php" class="nav-link text-white">
                        <i class='bx bxs-book-bookmark me-sm-2 fs-4' ></i>
                        <span class="d-inline-block">Manage Booking</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="../checkin/index.php" class="nav-link text-white">
                        <i class='bx bx-list-check me-sm-2 fs-4' ></i>
                        <span class="d-inline-block">Manage Check In</span>
                        </a>
                    </li>
                    <li class="list-group-item">
                        <a href="../checkout/index.php" class="nav-link text-white">
                        <i class='bx bx-list-minus me-sm-2 fs-4' ></i>
                        <span class="d-inline-block">Manage Check Out</span>
                        </a>
                    </li>
                </ul>
                <hr>
            </div>
            <div class="dropdown mx-2 align-self-end">
                <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="<?= $userIcon?>" alt="" width="32" height="32" class="rounded-circle me-sm-2">
                    <span class="d-inline-block"><strong><?= $firstName?></strong></span>
                </a>
                <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                    <li><a class="dropdown-item" href="#"><i class='bx bxs-user-plus me-sm-2' ></i><span class="ms-1">Add Staff</span></a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../auth/logout.php"><i class='bx bxs-log-out me-sm-2' ></i><span class="ms-1">Sign out</span></a></li>
                </ul>
            </div>
                
            </div>
        </div>
    </div>

    <div class = "container-fluid">
        <div class = "h-100">

        <!-- Header -->
        <section class="text-center mh-50" style="background-image: url('<?= $hotelimg?>'); background-size:cover; background-repeat: no-repeat;">
        <div class="px-2 pt-2 w-100 y-100 h-100 d-flex" style="background: rgb(32,32,39); background: linear-gradient(90deg, rgba(32,32,39,0.3) 0%, rgba(53,53,78, 0.3) 28%, rgba(94,94,108, 0.3) 70%, rgba(111,106,106, 0.3) 100%); backdrop-filter: blur(5px);">
            <div class="px-2 pt-2 pt-sm-3 m-auto" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">
            <div>
                <h1 class="display-5" style="font-family: 'Staatliches';"><?= $hotelname?><br><span class="display-2" style="color:#22092C;">Manage Guest Booking</span></h1>
            </div>
            </div>
        </div>
        </section>

        <div class = "content">
            <div>
                <!--col1-->
                <div class = "table header">
                    <h2>Booking Request List</h2>
                </div>
                <div class = "table-content">
                    <table class = "table table-bordered table-hover" width="100%">
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Guest Name</th>
                            <th width="10%">Room No.</th>
                            <th width="10%">Service</th>
                            <th width="15%">Check In Date</th>
                            <th width="15%">Check Out Date</th>
                            <th width="15%">Modify</th>
                        </tr>
                        <?php
                        $sql = "SELECT booking.*, room.*, guest.*, hotelservice.* FROM booking
                        JOIN room ON booking.roomID = room.roomID
                        JOIN guest ON booking.guestID = guest.guestID
                        JOIN hotelservice ON booking.serviceID=hotelservice.serviceID
                        WHERE booking.status = 'pending'";

                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Query failed: ' . mysqli_error($conn));
                        }

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $numrow = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $numrow . "</td><td>" . $row["firstName"] . " " . $row["lastName"] . "</td><td>" . $row["roomNo"] . "</td><td>" . $row["name"] . "</td><td>" . $row["check_in"] .
                                    "</td><td>" . $row["check_out"] . "</td>";
                                echo '<td> <a href="confirm.php?book=' . $row["bookID"] . '">Confirm ?</a> </td>';
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

        <!--  -->
            <div>
                <!--col2-->
                <div class = "table header">
                    <h2>Confirmed Booking List</h2>
                </div>
                <div class = "table content">
                    <table class = "table table-bordered table-hover" width="100%">
                        <tr>
                            <th width="5%">No</th>
                            <th width="30%">Guest Name</th>
                            <th width="10%">Room No.</th>
                            <th width="10%">Service</th>
                            <th width="15%">Check In Date</th>
                            <th width="15%">Check Out Date</th>
                            <th width="15%">Status</th>
                        </tr>
                        <?php
                        $sql = "SELECT booking.*, room.*, guest.*, hotelservice.*  FROM booking
                        JOIN room ON booking.roomID = room.roomID
                        JOIN guest ON booking.guestID = guest.guestID
                        JOIN hotelservice ON booking.serviceID=hotelservice.serviceID
                        WHERE booking.status = 'confirmed'";

                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Query failed: ' . mysqli_error($conn));
                        }

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $numrow = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $numrow . "</td><td>" . $row["firstName"] . " " . $row["lastName"] . "</td><td>" . $row["roomNo"] . "</td><td>" . $row["name"] . "</td><td>" . $row["check_in"] .
                                    "</td><td>" . $row["check_out"] . "</td><td>" . $row["status"] . "</td>";
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
        <!--  -->

        <!--  -->
            <div><!--col3-->
                <div class = "table header">
                    <h2>Cancelled Request List</h2>
                </div>
                <div class = "table content">
                    <table class = "table table-bordered table-hover" width="100%">
                        <tr>
                            <th width="5%">No</th>
                            <th width="50%">Guest Name</th>
                            <th width="15%">Room No.</th>
                            <th width="15%">Status</th>
                            <th width="15%">Action</th>
                        </tr>
                        <?php
                        $sql = "SELECT booking.*, room.*, guest.* FROM booking
                        JOIN room ON booking.roomID = room.roomID
                        JOIN guest ON booking.guestID = guest.guestID
                        WHERE booking.status = 'cancelled'";

                        $result = mysqli_query($conn, $sql);

                        if (!$result) {
                            die('Query failed: ' . mysqli_error($conn));
                        }

                        if (mysqli_num_rows($result) > 0) {
                            // output data of each row
                            $numrow = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>";
                                echo "<td>" . $numrow . "</td><td>" . $row["firstName"] . " " . $row["lastName"] . "</td><td>" . $row["roomNo"] . "</td><td>" . $row["status"] . "</td>";
                                echo '<td> <a href="delete.php?book=' . $row["bookID"] . '">Delete</a> </td>';
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
            <!--  -->

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