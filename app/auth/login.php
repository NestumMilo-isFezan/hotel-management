<?php
session_start();
include("../config/config.php");
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>Login</title>
</head>
<body>
        <div id="container">
            <h2>Login Page </h2>
                <div class="login-container">
                    <form action="login-action.php" method="post">
                        <label for="name">Email:</label>
                        <input type="text" id="email" name="email" required><br><br>
                        <label for="psw">Password:</label>
                        <input type="password" id="password" name="password" required><br><br>

                        <input type="submit" value="Login">
                        <input type="button" value="Cancel"><br><br>
                        Don't have an account yet?<a href="register.php">Create one.</a>
                    </form>
                </div>
                
            
        </div>



</body>
</html>
