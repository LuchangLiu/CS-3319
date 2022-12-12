<?php
include '../config/dbdata.php';
$sql ="select * FROM bus";
$result = mysqli_query($link,$sql);
 if (!$result) {
 die("databases query failed.");
 }
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<option value=". $row[licenseplnum] . ">" . $row[licenseplnum] . "</option>";
 }
 mysqli_free_result($result);
?>

