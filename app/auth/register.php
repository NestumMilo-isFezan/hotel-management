<?php
session_start();
include("../config/config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>Register</title>
</head>
<body>
        <div id="container">
            <h2>Registration </h2>
                <div class="register-container">
            <form action="register_action.php" method="post" >
                <label for="name">Username</label>
                <input type="text" name="uname" id="username" required>

                <label for="userEmail"><br>Email:</label>
                <input type="email" id="email" name="userEmail" required><br><br>

                <label for="userPwd">Password:</label>
                <input type="password" id="password" name="userPwd" required maxlength="8"><br><br>

                <label for="userPwd">Confirm Password:</label>
                <input type="password" id="confirmPwd" name="confirmPwd" required><br><br>

                <input type="button" value="Register">
                <input type="button" value="Cancel">
            </form>
                </div>
            
        </div>



</body>