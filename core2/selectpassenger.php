<?php
$sql ="select * FROM passenger";
$result = mysqli_query($link,$sql);
 if (!$result) {
 die("DB Failed.");
 }
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<option value=". $row[passengerid] . ">" . $row[firstname] . $row[lastname] . "</option>";
 }
 mysqli_free_result($result);
?>
