<?php
session_start();
include("../../config/config.php");
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width,  initial-scale=1.0">
    <title>Edit News</title>
</head>

<body onLoad="show_AddEntry()">
    <div class="header">
        <h1>Edit News</h1>
    </div>
<?php
$id = "";
$newstitle = "";
$article = "";
$descriptiom = "";
$remark = "";  

if (isset($_GET["id"]) && $_GET["id"] != "") {
    $sql = "SELECT * FROM news WHERE newsID=" . $_GET["id"];
    $result = mysqli_query($conn, $sql);
$result = mysqli_query($conn, $sql);
if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
    $id = $row["news_id"];
    $newstitle = $row["newstitle"];
    $article = $row["article"];
    $description = $row["descriptiom"];
    $remark = $row["remark"];
}
}
mysqli_close($conn);
?>

<div style="padding:0 10px;" id="newsDiv">
        <h3 align="center">Edit News</h3>
        <p align="center">Required fields marked with *</p>
        <form method="POST" action="news-edit-action.php" id="myForm">
            <!-- hidden value: id to be submitted to action page -->
            <input type="text" id="nid" name="nid" value="<?= $_GET['id'] ?>" hidden>
            <table border="1" id="myTable">
                <tr>
                    <td>News Title*</td>
                    <td width="1px">:</td>
                    <td>
                        <input type="text" name="newstitle" value="<?= $newstitle ?>" required>
                    </td>
                </tr>
                <tr>
                    <td>Article*</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="article" cols="20" required><?= $article ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Description*</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="descriptiom" cols="20" required><?= $description ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Remark</td>
                    <td>:</td>
                    <td>
                        <textarea rows="4" name="remark" cols="20"><?= $remark ?></textarea>
                    </td>
                </tr>
                <tr>
                    <td colspan="3" align="right">
                        <input type="submit" value="Submit" name="B1">
                        <input type="reset" value="Reset" name="B2" onclick="resetForm()">
                        <input type="reset" value="Cancel" name="B3" onclick="window.location.href='index.php'">
                    </td>
                </tr>
            </table>
        </form>
    </div>
</body>
</html>