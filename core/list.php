<?php
$sql = "SELECT * FROM bustrip";
$result = mysqli_query($link,$sql);


if (!$result) {
    die("databases query failed.");
}
echo "<table>";
echo "<tr><th>TripId</th><th>TripName</th><th>Startdate</th><th>Enddate</th><th>VisitCountry</th><th>busnum</th><th>Url Image</th></tr>";
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
