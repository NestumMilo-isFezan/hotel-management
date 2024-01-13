<?php
session_start();
include("../config/config.php");
?>
<!DOCTYPE html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>

<?php

    //STEP 1: Form data handling using mysqli_real_escape_string function to escape special characters for use in an SQL query,
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);
        $confirmPwd = mysqli_real_escape_string($conn, $_POST['confirmPwd']);
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName = mysqli_real_escape_string($conn, $_POST['lastName']);
        $contact = mysqli_real_escape_string($conn, $_POST['contact']);

          //Validate pwd and confrimPwd
        if ($password !== $confirmPwd) {
            die("Password and confirm password do not match.");
        }
    //STEP 2: Check if userEmail already exist
        $sql = "SELECT * FROM useracc WHERE email='$email' LIMIT 1";	
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1) {
            echo "<p ><b>Error: </b> User exist, please register a new user</p>";       
        } else {
            // User does not exist, insert new user record, hash the password		
            $pwdHash = trim(password_hash($_POST['password'], PASSWORD_DEFAULT));
    
            // Insert into useracc table
            $userInsertSql = "INSERT INTO useracc (userRoles, username, email, password) VALUES (1, '$username', '$email', '$pwdHash')";
    
            if (mysqli_query($conn, $userInsertSql)) {
                // Retrieve the accID of the newly inserted user
                $accID = mysqli_insert_id($conn);
    
                // Insert into staff table with the obtained accID
               // $staffInsertSql = "INSERT INTO staff (accID, firstName, lastName, contact) VALUES ('$accID', '$firstName', '$lastName', '$contact')";
                $staffInsertSql = "INSERT INTO staff (accID, hotelID, firstName, lastName, contact) VALUES ('$accID', 1, '$firstName', '$lastName', '$contact')";

                if (mysqli_query($conn, $staffInsertSql)) {
                    echo "<p>New staff record created successfully.</p>
                        <script>
                            setTimeout(function() {
                                window.location.href = '../staff/index.php';
                            }, 4000);
                        </script>";
                } else {
                    echo "Error: " . $staffInsertSql . "<br>" . mysqli_error($conn);
                }
            } else {
                echo "Error: " . $userInsertSql . "<br>" . mysqli_error($conn);
            }
        }     
     
    }
        mysqli_close($conn);

?>
</body>