<?php
session_start();
include("../../config/config.php");
?>

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>

<body>

    <div >
        <h1>Manage room type</h1>
    </div>

    <h2>Type of room available</h2>

    <div>
    <table border="1" width="100%">
        <tr>
            <th width="5%">TypeID</th>
            <th width="20%">Name</th>
            <th width="35%">Description</th>
            <th width="15%">Price(RM)</th>
            <th width="5%">Capacity</th>
            <th width="10%">Room_imgpath</th>
            <th width="10%">Action</th>
        </tr>

        <?php
            $sql = "SELECT * FROM roomtype WHERE hotelID=". $_SESSION["hotelID"];
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $numrow=1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $numrow . "</td><td>". $row["name"] . "</td><td>" . $row["description"] .
                        "</td><td>" . $row["price"] . "</td><td>" . $row["capacity"] . "</td><td>" . $row["room_imgpath"] . "</td>";
                    echo '<td> <a href="roomtype_edit.php?id=' . $row["typeID"] . '">Edit</a>&nbsp;|&nbsp;';
                    echo '<a href="roomtype_delete.php?id=' . $row["typeID"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
                    echo "</tr>" . "\n\t\t";
                    $numrow++;
                }
            } else {
                echo '<tr><td colspan="7">0 results</td></tr>';
            } 
            
            mysqli_close($conn);
        ?>
    </table>

    <div style="text-align: right; padding-top:10px;">
        <input type= "button"  onClick="show_AddEntry()" style="cursor: pointer;" value= "Add New"/>
        <input type= "button"  onClick="canceladdroomtype()" style="cursor: pointer;" value="Cancel"/>
    </div>

    </div>

    <div style="padding:0 10px;">
        <h3>Add Challenge and Plan</h3>
        <p>Required field with mark*</p>

        <form method="POST" action="roomtype_action.php" enctype="multipart/form-data">
            <table border="3"> 
                <tr>
                    <td>Name*</td>
                    <td>:</td>
                    <td>
                        <input row="2" type="text" name="name" required>                                    
                    </td>
                </tr>
                <tr>
                    <td>Description*</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="description" cols="20" required></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price (RM)*</td>
                    <td>:</td>
                    <td>
                        <input type="number" name="price" step="0.01" required>                                    
                    </td>
                </tr>
                <tr>
                    <td>Capacity*</td>
                    <td>:</td>
                    <td>
                        <input type="number" name="capacity" required>                                    
                    </td>
                </tr>
                <tr>
                    <td>Upload photo</td>
                    <td>:</td>
                    <td>
                        Max size: 1.0mb<br>
                        <input type="file" name="fileToUpload" accept=".jpg, .jpeg, .png">
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right"> 
                    <input type="submit" value="Submit" name="B1">                
                    <input type="reset" value="Reset" name="B2">
                    </td>
                </tr>
            </table>    
        </form>
    </div>
</body>
</html>