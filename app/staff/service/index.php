<?php
session_start();
include("../../config/config.php");
?>

<head>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   

</head>

<body>

    <div >
        <h1>Manage Service</h1>
    </div>

    <h2>Type Of Service Available</h2>

    <div>
    <table border="1" width="100%">
        <tr>
            <th width="5%">No</th>
            <th width="20%">Service Name</th>
            <th width="30%">Description</th>
            <th width="20%">Price(RM)</th>
            <th width="15%">Status</th>
            <th width="10%">Modify</th>
        </tr>

        <?php
            $sql = "SELECT * FROM hotelservice WHERE hotelID=1";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                // output data of each row
                $numrow=1;
                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $numrow . "</td><td>". $row["name"] . "</td><td>" . $row["description"] .
                        "</td><td>" . $row["price"] . "</td><td>" . $row["servicestatus"] . "</td>";
                    echo '<td> <a href="service_edit.php?id=' . $row["serviceID"] . '">Edit</a>&nbsp;|&nbsp;';
                    echo '<a href="service_delete.php?id=' . $row["serviceID"] . '" onClick="return confirm(\'Delete?\');">Delete</a> </td>';
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
        <h3>Add Service in the Hotel</h3>
        <p>Required field with mark*</p>

        <form method="POST" action="service_action.php" enctype="multipart/form-data">
            <table border="3"> 
                <tr>
                    <td>Service Name*</td>
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
                    <td>Status*</td>
                    <td>:</td>
                    <td>
                        <select size="1" name="status" required>
                            <option value="">&nbsp;</option>
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
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