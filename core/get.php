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
    <title>The Bustrips</title>
</head>
<body>
<?php

include '../config/dbdata.php';
?>
<div id='mydiv1'>
<h1>Here are the bustrips ordered as you ordered</h1>


<?php
$order = $_POST["order"];
$sort = $_POST["sort"];
if ($order =="tripname"){
    if($sort == "ASC"){
        $sql = "SELECT * FROM bustrip ORDER BY tripname ASC";
    }
    if($sort == "DESC"){
        $sql = "SELECT * FROM bustrip ORDER BY tripname DESC";
    }
}
if ($order == "visitcountry"){
    if($sort =="ASC"){
        $sql = "SELECT * FROM bustrip ORDER BY visitcountry ASC";
    }
    if($sort =="DESC"){
        $sql = "SELECT * FROM bustrip ORDER BY visitcountry DESC";
    }
}

$result = mysqli_query($link,$sql);


if (!$result) {
    die("databases query failed.");
}
echo "<table><tr><th>Passenger ID</th><th>Firstname</th><th>Lastname</th><th>Passport ID</th><th>Country</th><th>Expiry Date</th><th>Birth Date</th></tr>";
while ($row = mysqli_fetch_assoc($result)) {
    ?>
    <tr>
        <td> <?php echo $row["passengerid"]?> </td>
        <td> <?php echo $row["firstname"]?></td>
        <td> <?php echo $row["lastname"]?></td>
        <td> <?php echo $row["passportid"]?></td>
        <td> <?php echo $row["citizenshipcountry"]?></td>
        <td> <?php echo $row["expirydate"]?></td>
		<td> <?php echo $row["birthdate"]?></td>
    </tr>
    <?php
}
echo"</table></div>";
mysqli_free_result($result);
?>



    <div id="mydiv13">
        <!-- This section allows user to hit radio buttons and biew bustrips in different orders -->
        <h2>View ordered list of Bustrips</h2>
        <form action="get.php" method="post">
            <p>Order by: </p>
            <input type = "radio" id = "tripname" name="order" value="tripname">
            <label for="tripname">Trip Name</label><br>
            <input type = "radio" id = "country" name="order" value="visitcountry">
            <label for="country">Visit Country</label><br>

            <p>Sort by: </p>
            <input type = "radio" id = "ascending" name="sort" value="ASC">
            <label for="ascending">Ascending</label><br>

            <input type = "radio" id = "descending" name="sort" value="DESC">
            <label for="descending">Descending</label><br>

            <input type="submit" value="Submit">
            <br><br><a href = "../index.php" >
            Back</a>
        </form>
    </div>