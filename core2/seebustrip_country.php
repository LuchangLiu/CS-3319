<?php
include '../config/dbdata.php';
$sql ="select DISTINCT *  FROM bustrip";
$result = mysqli_query($link,$sql);
 if (!$result) {
 die("databases query failed.");
 }
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<option value=". $row[visitcountry] . ">" . $row[visitcountry] . "</option>";
 }
 mysqli_free_result($result);
?>
