<?php
session_start();
include("../../config/config.php");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>Manage Hotel</title>
</head>
<h1>Hotel News</h1>
<body>
<table border="1" width="100%" id="projectable">
        <tr>
            <th width="5%">No</th>
            <th width="10%">News Title</th>
            <th width="30%">Article</th>
            <th width="30%">Description</th>
            <th width="15%">Remark</th>
            <th width="10%">Action</th>
        </tr>
        <?php
$sql = "SELECT * FROM news WHERE hotelID = 1";
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    // output data of each row
    $numrow = 1;
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>";
        echo "<td>" . $numrow . "</td><td>" . $row["newstitle"] . "</td><td>" . $row["article"] . "</td><td>" . $row["descriptiom"] .
            "</td><td>" . $row["remark"] . "</td>";

        // Add the edit and delete links here
        echo '<td><a href="edit-news.php?id=' . $row["newsID"] . '">Edit</a>&nbsp;|&nbsp;';
        echo '<a href="news-delete.php?id=' . $row["newsID"] . '" onClick="return confirm(\'Delete?\');">Delete</a></td>';

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
                

                <input type= "button"  onClick="show_AddEntry()" style="cursor: pointer" value= "Add New"/>
                
                <input type= "button"  onClick="cancelRegister()" style="cursor: pointer" value= "Cancel"/>
      
            </div>

<div style="padding:0 10px;" id="NewsDiv">
    <h3 align="center">Add new News</h3>
    <p align="center">Required field with mark*</p>

    <form method="POST" action="add-news-action.php" enctype="multipart/form-data" id="myForm">
        <table border="1" id="myTable">
            <tr>
                <td>News Title*</td>
                <td>:</td>
                <td>
                    <input type="text" name="newstitle" required>                                    
                </td>
            </tr>
            <tr>
                <td>Article*</td>
                <td>:</td>
                <td>
                    <textarea rows="4" name="article" cols="20" required></textarea>
                </td>
            </tr>
            <tr>
                <td>Description*</td>
                <td>:</td>
                <td>
                    <textarea rows="4" name="descriptiom" cols="20" required></textarea>
                </td>
            </tr>
            <tr>
                <td>Remark</td>
                <td>:</td>
                <td>
                    <textarea rows="4" name="remark" cols="20"></textarea>
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
<script>

 function cancelRegister(){
    var x = document.getElementById("NewsDiv");
    x.style.display = 'None';

   ;
}
 function show_AddEntry() {
            var x = document.getElementById("NewsDiv");
            x.style.display = 'Block';           
        }

</script>



</body>
</html>