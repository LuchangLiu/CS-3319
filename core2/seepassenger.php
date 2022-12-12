<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
    <link rel="stylesheet" href ="../css/mystyles.css">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta charset="utf-8">
<title>The Bustrips</title>
</head>
<body>
<?php
include '../config/dbdata.php';
?>
<div id='mydiv1'>
<h1>These are the bustrips from the selected visitcountry</h1>


<?php
$passenger =$_POST["passenger"];
$sql = 'SELECT *FROM bustrip WHERE passenger ="'.$passenger.'"';
//echo $sql;
$result = mysqli_query($link,$sql);


if (!$result) {
    die("databases query failed.");
}
echo "<table><tr><th>TripId</th><th>TripName</th><th>Startdate</th><th>Enddate</th><th>visitcountry</th><th>busnum</th><th>Url Image</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
?>
	<tr>
	<td> <?php echo $row["tripid"]   ?> </td>
	<td> <?php echo $row["tripname"] ?></td>
	<td> <?php echo $row["startdate"]?></td>
	<td> <?php echo $row["enddate"]  ?></td>
	<td> <?php echo $row["visitcountry"]  ?></td>
	<td> <?php echo $row["busnum"]?></td>
	<td> <img src= "<?php echo $row["urlImage"];?>"/ height="60" width="60"> </td>
	</tr>
<?php
}
echo"</table>";
mysqli_free_result($result);
?>
</div>
