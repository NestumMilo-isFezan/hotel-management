<?php
session_start();
include("../config/config.php");
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>

<?php
//login values from login form
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password= mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM useracc WHERE email ='$email' LIMIT 1";
$result = mysqli_query($conn, $sql);


if (!$result) {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
} else {

    //check if user exists
if (mysqli_num_rows($result) == 1) {    
    
    //check password hash
    $row = mysqli_fetch_assoc($result);
    if (password_verify($password, $row['password'])) {
        $_SESSION["UID"] = $row["accID"]; // the first record set, bind to userID
        $_SESSION["username"] = $row["username"];


            //set logged in time
            $_SESSION['loggedin_time'] = time();  
            
            echo "<script>
            setTimeout(function() {
                window.location.href = '../index.php';}, 4000);
                </script>";
        } else {
            echo 'Login error, user email and password is incorrect.<br>';//user email & pwd not correct    
            echo  '<a href="login.php?login=1"> | login |</a> &nbsp;&nbsp;&nbsp; <br>';
        }
            
    } else {
            echo "Login error, user <b>$email</b> does not exist. <br>";//user not exist
            echo '<a href="register.php?login=1"> | Register |</a>&nbsp;&nbsp;&nbsp; <br>';   
    } 
}

mysqli_close($conn);
?>
</body>
</html>