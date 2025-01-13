<?php
require("../../directory.php");
require(TEMP_DIR . "/adminpart.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment</title>
    <!-- Consolidated and Organized CSS Links -->
    <link href="https://fonts.googleapis.com/css2?family=Staatliches&family=Poppins&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
          rel="stylesheet" 
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" 
          crossorigin="anonymous">
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet">
</head>
<body class="vh-100" data-bs-theme="dark">
    <!-- Sidebar Navigation -->
    <button class="btn" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample">
        <i class='bx bx-menu fs-3'></i>
    </button>
    <div class="offcanvas offcanvas-start h-100" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
        <div class="offcanvas-header">
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">
            <a href="./index.php" class="d-flex align-items-center mb-3 text-white text-decoration-none">
                <img src="<?= $hotelicon ?>" alt="<?= $hotelname ?>" width="33" height="33" class="me-2">
                <span class="fs-5 fw-bold"><?= $hotelname ?></span>
            </a>
            <hr>
            <ul class="list-group">
                <?= generateSidebarLinks([
                    ["../index.php", "bxs-home", "Home"],
                    ["../hotel-info/index.php", "bxs-building-house", "Manage Hotel"],
                    ["../service/index.php", "bxs-cog", "Manage Service"],
                    ["../book/index.php", "bxs-book-bookmark", "Manage Booking"],
                    ["../checkin/index.php", "bx-list-check", "Manage Check In"],
                    ["../checkout/index.php", "bx-list-minus", "Manage Check Out", true]
                ]) ?>
            </ul>
            <hr>
            <?= generateUserDropdown($userIcon, $firstName) ?>
        </div>
    </div>

    <!-- Main Content -->
    <div class="container-fluid">
        <div class="header-section text-center mb-3" style="background: url('<?= $hotelimg ?>') no-repeat center center / cover;">
            <div class="overlay d-flex align-items-center justify-content-center">
                <h1 class="display-5" style="font-family: 'Staatliches';"><?= $hotelname ?><br>
                    <span class="display-2 text-primary">Manage Payment</span>
                </h1>
            </div>
        </div>
        <h2>Pay Hotel Room Here</h2>
        <hr>
        <div id="payment">
            <div class="price">
                <?= displayPaymentInfo($conn, $_GET["bookID"] ?? null) ?>
            </div>
            <form method="POST" action="pay.php">
                <input type="hidden" name="payid" value="<?= htmlspecialchars($payid ?? '') ?>">
                <table class="table">
                    <tr>
                        <td>Amount Pay:</td>
                        <td><input type="text" name="amountpay" required></td>
                    </tr>
                    <tr>
                        <td>Method:</td>
                        <td>
                            <select name="paymethod" required>
                                <option value="">-- Select --</option>
                                <option value="Cash">Cash</option>
                                <option value="Credit Card">Credit Card</option>
                                <option value="E-Wallet">E-Wallet</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <button type="submit" class="btn btn-primary" name="submit">Pay</button>
            </form>
        </div>
    </div>

    <!-- Toast Notifications -->
    <div class="toast-container position-fixed bottom-0 end-0 p-3">
        <?= generateToasts($hotelicon, [
            ["editToast", "Successfully Check-in Guest-san"],
            ["deleteToast", "Successfully Cancel Guest-san Last Minute Cancel"],
            ["addToast", "Successfully Add Hotel Service"]
        ]) ?>
    </div>

    <!-- Consolidated Script Includes -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" 
            integrity="sha384-C6RzsynM9KwDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" 
            crossorigin="anonymous"></script>
    <script src="action.js"></script>
</body>
</html>

<?php
// Helper Functions

function generateSidebarLinks($links) {
    $html = '';
    foreach ($links as $link) {
        [$url, $icon, $label, $active] = array_pad($link, 4, false);
        $activeClass = $active ? 'active' : '';
        $html .= "<li class='list-group-item $activeClass'>
                    <a href='$url' class='nav-link text-white'>
                        <i class='bx $icon me-2 fs-4'></i>
                        <span>$label</span>
                    </a>
                  </li>";
    }
    return $html;
}

function generateUserDropdown($icon, $name) {
    return "<div class='dropdown'>
                <a href='#' class='d-flex align-items-center text-white dropdown-toggle' data-bs-toggle='dropdown'>
                    <img src='$icon' alt='' width='32' height='32' class='rounded-circle me-2'>
                    <span><strong>$name</strong></span>
                </a>
                <ul class='dropdown-menu dropdown-menu-dark'>
                    <li><a class='dropdown-item' href='#'>Add Staff</a></li>
                    <li><hr class='dropdown-divider'></li>
                    <li><a class='dropdown-item' href='../auth/logout.php'>Sign out</a></li>
                </ul>
            </div>";
}

function generateToasts($icon, $toasts) {
    $html = '';
    foreach ($toasts as [$id, $message]) {
        $html .= "<div id='$id' class='toast' role='alert'>
                    <div class='toast-header'>
                        <img src='$icon' class='rounded me-2' style='width:15px; height:15px;'>
                        <strong class='me-auto'>System</strong>
                        <button type='button' class='btn-close' data-bs-dismiss='toast'></button>
                    </div>
                    <div class='toast-body'>$message</div>
                  </div>";
    }
    return $html;
}

function displayPaymentInfo($conn, $bookID) {
    if (!$bookID) return "<h2>No booking ID provided</h2>";
    $query = "SELECT * FROM payment WHERE bookID = '$bookID' ORDER BY paymentdate DESC, paymenttime DESC LIMIT 1";
    $result = mysqli_query($conn, $query);
    if ($result) {
        $row = mysqli_fetch_assoc($result);
        if ($row) {
            return "<h2>Remaining Balance: RM " . number_format($row["balance"], 2) . "</h2>";
        }
    }
    return "<h2>Error checking payment information</h2>";
}
?>

            </div>
        </div>
    </div>
</body>
</html>
