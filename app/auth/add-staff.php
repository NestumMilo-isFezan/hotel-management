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
    <div>
        <form action="staff-action.php" method="post">
        <div id="div1">
            <h2> Staff Registration </h2>
                <div class="staff-container">
           
                <label for="name">Username</label>
                <input type="text" name="username" id="username" required>

                <label for="userEmail"><br>Email:</label>
                <input type="email" id="email" name="email" required><br><br>

                <label for="userPwd">Password:</label>
                <input type="password" id="password" name="password" required maxlength="8"><br><br>

                <label for="userPwd">Confirm Password:</label>
                <input type="password" id="confirmPwd" name="confirmPwd" required><br><br>

                </div>
            
        </div>


        <div id="div2">
           
                <div class="staff-container">
            
                <br><br><label for="firstName">Fisrt Name</label>
                <input type="text" name="firstName" id="firstName" required>

                <label for="lastName"><br>Last Name:</label>
                <input type="text" id="lastName" name="lastName" required><br><br>

                <label for="contact">Contact:</label>
                <input type="text" id="contact" name="contact" required maxlength="10"><br><br>

                

                </div>
            
        </div>

        <div id="div3">
            
                <div class="staff-container">

                <input type="submit" value="Register">
                <input type="button" value="Cancel">

                </div>
            
        </div>

    </form>
    </div>

</body>