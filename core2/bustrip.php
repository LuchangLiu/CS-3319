<?php
$sql ="select * FROM bustrip";
$result = mysqli_query($link,$sql);
 if (!$result) {
 die("databases query failed.");
 }
 while ($row = mysqli_fetch_assoc($result)) {
 echo "<option value=". $row[tripid] . ">" . $row[tripname] . "</option>";
 }
 mysqli_free_result($result);
?>

