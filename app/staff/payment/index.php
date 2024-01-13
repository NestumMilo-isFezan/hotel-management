<?php
session_start();
include("../../config/config.php");
?>

<head>
    <title>Payment</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
</head>

<body>
    <div class = "content">
        <div class = "col-1">
            <div class = "table-title">
                <h2>Payment</h2>
            </div>

            <div class="price">
                <?php
                if (isset($_GET["id"]) && $_GET["id"] != "") {
                    $payid = $_GET["id"];
                    $guest_id = $_SESSION['guestID'];

                    $sql = "SELECT total_price FROM booking WHERE bookID= '$payid' AND guestID= '$guest_id'";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $total_price = $row["total_price"];

                        if ($total_price !== null) {
                            echo "<h2>Total Price: RM $total_price</h2>";
                        } 
                        else {
                            echo "<h2>Total Price not available</h2>";
                        }
                    } 
                    else {
                        echo "<h2>Error fetching total price</h2>";
                    }
                } 
                else {
                    echo "<h2>No booking ID provided</h2>";
                }
                mysqli_close($conn);
                ?>
            </div>

            <div class = "table-content">
                <form method="POST" action="pay.php">
                    <input type="hidden" name="payid" value="<?php echo $guest_id; ?>">
                    <input type="hidden" name="total_price" value="<?php echo $total_price; ?>">
                    <table id="form">
                        <tr>
                            <td>Amount Pay:</td>
                            <td>
                                <input type="text" name="amountpay" required>
                            </td>
                        </tr>
                        <tr>
                            <td>Method:</td>
                            <td>
                                <select name="paymethod" required>
                                    <option value="">&nbsp;</option>
                                    <option value="Cash">Cash</option>
                                    <option value="Credit Card">Credit Card</option>
                                    <option value="E-Wallet">E-Wallet</option>
                                </select>
                            </td>
                        </tr>
                    </table>
                    <div class = "table-button">
                        <button type="submit">Pay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>