<?php
session_start();
include("../config/config.php");
?>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="mystyle.css" media="screen" />
    <title>Login Action</title>
</head>
<body>
<h2>Login Information</h2>
<?php
//login values from login form
$email = mysqli_real_escape_string($conn, $_POST['email']);
$password= mysqli_real_escape_string($conn, $_POST['password']);

$sql = "SELECT * FROM useracc WHERE password ='$username' LIMIT 1";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 1) {    
    //check password hash
    $row = mysqli_fetch_assoc($result);
    if (password_verify($_POST['password'],$row['password'])) {
        
        $_SESSION["UID"] = $row["accID"];//the first record set, bind to userID
        $_SESSION["username"] = $row["password"];
            //set logged in time
            $_SESSION['loggedin_time'] = time();  
            header("location:../index.php"); 
        } else {
            echo 'Login error, user email and password is incorrect.<br>';//user email & pwd not correct    
            echo '<a href="index.php?login=1"> | Login |</a> &nbsp;&nbsp;&nbsp; <br>';
        }
            
    } else {
            echo "Login error, user <b>$username</b> does not exist. <br>";//user not exist
            echo '<a href="index.php?login=1"> | Login |</a>&nbsp;&nbsp;&nbsp; <br>';   
    } 


mysqli_close($conn);
?>
</body>
</html>