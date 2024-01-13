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
        <div class="row row-cols-2 vw-100">
            <!-- Side Menu -->
            <div class="col-1 col-sm-2 col-md-3 d-flex">
                <div class="d-flex flex-column flex-shrink-0 p-3 bg-dark-subtle vh-100">
                    <a href="./index.php" class="d-flex align-items-center mb-0 mb-md-3 me-md-auto text-white text-decoration-none">
                        <img src="<?= $hotelicon?>" alt="<?= $hotelname?>" width="33" height="33" class="me-sm-2">
                        <span class="fs-5 fw-bold d-none d-sm-inline-block"><?= $hotelname?></span>
                    </a>
                    <hr>

                    <ul class="nav nav-pills flex-column mb-auto">
                        <li class="nav-item">
                            <a href="#" class="nav-link active" aria-current="page">
                            <i class='bx bxs-home me-sm-2 fs-4' ></i>
                            <span class="d-none d-sm-inline-block">Home</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class='bx bxs-building-house me-sm-2 fs-4' ></i>
                            <span class="d-none d-sm-inline-block">Manage Hotel</span>
                            </a>
                        </li>
                        <li class="mb-1">
                            <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed ms-1" data-bs-toggle="collapse" data-bs-target="#home-collapse" aria-expanded="false">
                                <i class='bx bxs-hotel me-sm-2 fs-4' ></i>&nbsp;<span class="d-none d-sm-inline-block">Manage Room</span>
                            </button>

                            <div class="collapse" id="home-collapse">
                                <ul class="btn-toggle-nav list-unstyled fw-normal py-2 ms-sm-5 ps-3 small bg-secondary-subtle rounded-2">
                                    <li><a href="#" class="link-body-emphasis text-decoration-none rounded mb-sm-3"><i class='bx bxs-plus-square me-sm-2 fs-4' ></i><span class="d-none d-sm-inline-block">Hotel Room</span></a></li>
                                    <li><a href="#" class="link-body-emphasis text-decoration-none rounded mb-sm-1"><i class='bx bxs-layer-plus me-sm-2 fs-4'></i><span class="d-none d-sm-inline-block">Room Type</span></a></li>
                                </ul>
                            </div>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class='bx bxs-cog me-sm-2 fs-4' ></i>
                            <span class="d-none d-sm-inline-block">Manage Service</span>
                            </a>
                        </li>
                        <li>
                            <a href="#" class="nav-link text-white">
                            <i class='bx bxs-book-bookmark me-sm-2 fs-4' ></i>
                            <span class="d-none d-sm-inline-block">Manage Booking</span>
                            </a>
                        </li>
                        <li>
                            <a href="checkin/index.php" class="nav-link text-white">
                            <i class='bx bx-list-check me-sm-2 fs-4' ></i>
                            <span class="d-none d-sm-inline-block">Manage Check In</span>
                            </a>
                        </li>
                        <li>
                            <a href="checkout/index.php" class="nav-link text-white">
                            <i class='bx bx-list-minus me-sm-2 fs-4' ></i>
                            <span class="d-none d-sm-inline-block">Manage Check Out</span>
                            </a>
                        </li>
                    </ul>

                    <hr>
                    <div class="dropdown mx-2 align-self-end">
                        <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            <img src="../img/user_icon.png" alt="" width="32" height="32" class="rounded-circle me-sm-2">
                            <span class="d-none d-sm-inline-block"><strong><?= $firstName?></strong></span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-dark text-small shadow">
                            <li><a class="dropdown-item" href="#"><i class='bx bxs-user-plus me-sm-2' ></i><span class="ms-1">Add Staff</span></a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../auth/logout.php"><i class='bx bxs-log-out me-sm-2' ></i><span class="ms-1">Sign out</span></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        

            <div class = "col-9">
            <div class = "container w-100 m-3 d-grid">
                <!-- Header -->
                <div class="text-center mh-50 mb-3" style="background-image: url('<?= $hotelimg?>'); background-size:cover; background-repeat: no-repeat;">
                    <div class="px-2 pt-2 w-100 y-100 h-100 d-flex" style="background: rgb(32,32,39); background: linear-gradient(90deg, rgba(32,32,39,0.3) 0%, rgba(53,53,78, 0.3) 28%, rgba(94,94,108, 0.3) 70%, rgba(111,106,106, 0.3) 100%); backdrop-filter: blur(5px);">
                        <div class="px-2 pt-2 pt-sm-3 m-auto" style="text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.5);">
                            <div>
                                <h1 class="display-5" style="font-family: 'Staatliches';"><?= $hotelname?><br><span class="display-2" style="color:#22092C;">Manage Check-In</span></h1>
                            </div>
                        </div>
                    </div>
                </div>

                <div class = "table-content mx-3">
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
                                echo "<td>" . $numrow . "</td><td>" . $row["firstName"] . " " . $row["lastName"] . "</td><td>" . $row["roomNo"] . "</td><td>" . $row["check_in"] .
                                    "</td><td>" . $row["check_out"] . "</td>";
                                echo '<td> <a href="checkin.php?book=' . $row["bookID"] . '">Check-In</a>&nbsp;|&nbsp;';
                                echo '<a href="cancel.php?book=' . $row["bookID"] . '">Cancel</a> </td>';
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
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    </body>
</html>
