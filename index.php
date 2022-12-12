<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href ="css/mystyles.css">
    <style>
        table, th, td {
            border: 1px solid black;
        }
    </style>
    <meta charset="utf-8">
    <title>Kurono's Bustrip</title>

</head>
<body>

<!-- Connect to DB -->
<?php
include 'config/dbdata.php';
?>

<h1 align="center">Welcome to the BUS TRIP!</h1>
<div id="bigdiv">
<div id="mydiv1">
<h2>Table of Bustrips</h2>

<!-- This just lists a table of bustrips  -->
<?php
include 'core/list.php';
?>
</div>

<div id="mydiv11">
<!-- This section allows user to hit radio buttons and biew bustrips in different orders -->
<h2>View ordered list of Bustrips</h2>
<form action="core/get.php" method="post">
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
</form>
<!-- Allows user to edit different values in bustrips, only one at a time -->
<h2>Edit the Bustrip Database</h2>
<form action = "core/edit.php" method="post">
    Type a trip id (Number):<br>
    <input text="text" name ="tripid" required><br>

    <p>What would you like to edit: </P>
    Trip Name:<br>
    <input type="text" name="edittripname" id="edittripname"><br>

    Start Date:<br>
    <input type="date" id="editstartdate" name="editstartdate"><br>
    End Date:<br>
    <input type="date" id ="editenddate" name="editenddate"><br>

    Trip Image:<br>
    <input type ="text" name="editimage" id="editimage"><br>
    <br>
    <input type="submit" value="Submit">
</form>

<!-- Allow user to delete bustrip -->
<h2>Which bustrip do you want to delete?</h2>
<form action="" method="post">
    <select name="deletebustrip" id="deletebustrip">

        <option value="1">Select Here</option>
        <?php
        include "core2/bustrip.php";
        ?>

    </select>
    <br>
    <input type="submit" value="Submit">
</form>
<hr>

<?php
if (isset($_POST['deletebustrip'])) {
    include "config/dbdata.php";
    include "core/delete.php";
}
?>


<!-- allow user to add bustrips  -->
<h2>What bustrip do you want to add?</h2>
<form action="core/add.php" method="post">
    What is the tripid:<input type="number" name = "newtripid"><br>
    What is the tripname:<input type = "text" name="newtripname"><br>
    What is the start date:<input type ="date" name="newstartdate"><br>
    What is the end date: <input type ="date" name ="newenddate"><br>
    Which country is this trip going to:<input type ="text" name="newcountry"><br>
    Which bus is the trip taking:
    <select name="newbus">
        <option value="1">Select Here</option>
        <?php
        include "core2/bus.php";
        ?>
    </select><br>
    Is there a trip picture:<input type="text" name="newurlimage"><br>
    <input type="submit" value="Submit">
</form>

<br>
<h2> Delete Bookings</h2>
<form action="" method="post">
    <select name="passenger" id="passenger">
        <option value="1">Select Here</option>
        <?php
        include "core2/selectpassenger.php";
        ?>
    </select><br>
    <input type="submit" value="Submit">
	</form>
	<hr>

<h2>Select Passenger and View Bookings</h2>
    <form action="core2/seepassenger.php" method="get">
    <select name="passenger" id="passenger">
        <option value="1">Select Here</option>
        <?php
        include "core2/selectpassenger.php";
        ?>
    </select>
	<br>
    <input type="submit" value="Submit">
</form>
<hr>
	
<h2>Create Booking</h2>
<form method="post" action="">
	Passenger: <select name="Passenger" id="Passenger">

        <option value="1">Select Here</option>
        <?php
        include "core2/selectpassenger.php";
        ?>

    </select>
    <br>
	Bustrip: <select name="Bustrip" id="Bustrip">

        <option value="1">Select Here</option>
        <?php
        include "core2/bustrip.php";
        ?>

    </select>
    <br>
	Price: <input type="number" name = "Price"><br>
<input type="submit" value="Create Booking">
</form>

<h2>Passengers</h2>
	<?php
	include 'config/dbdata.php';
	$sql ="select * FROM passport UNION SELECT * FROM passenger ORDER BY lastname ASC";
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
				<!--Connect to php file and show the list of all passengers-->
                <form action="" method="post">
					passenger id | name | passport id | country | birth date | expiry date<br>
					79 | Pam Beesly | US90 | Italy | 1980-4-4 | 2020-2-28<br>
					80 | Creed Bratton | US91 | Germany | 1959-2-2 | 2030-1-1<br>
					44 | Ned Flanders | US22 | USA | 1950-6-11 | 2030-4-4<br>
					45 | Todd Flanders | US23 | USA | 1940-6-24 | 2018-3-3<br>
					66 | Heidi Klum | GE11 | Germany | 1970-7-12 | 2027-1-1<br>
					99 | Tokai Teio | JP20 | Japan | 1988-04-20 | 2033-08-30<br>
					78 | Dwight Schrute | US89 | Canada | 1976-4-8 | 2022-2-2<br>
					77 | Michael Scott | US88 | Canada | 1979-4-25 | 2030-2-13<br>
					33 | Bart Simpson | US13 | USA | 2001-5-12 | 2025-1-1<br>
					34 | Lisa Simpson | US14 | USA | 2004-3-19 | 2025-1-1<br>
					11 | Homer Simpson | US10 | USA | 1970-2-19 | 2025-1-1<br>
					35 | Maggie Simpson | US15 | USA | 2012-9-17 | 2025-1-1<br>
					22 | Marge Simpson | US12 | USA | 1972-8-12 | 2025-1-1</ol>
					
	            </form>
	
<h2>Unbooked Trips</h2>
<form action="" method="get">
	Tuscany Sunsets | Start Date: 2022-03-03 | End Date: 2022-03-14 | Italy<br>California Wines | Start Date: 2022-05-05 | End Date: 2022-05-10 | USA<br>Cottage Country | Start Date: 2022-06-01 | End Date: 2022-06-22 | Canada<br>Qatar Prix | Start Date: 2022-10-03 | End Date: 2022-10-18 | France <br>
	</form>
	
<!-- View bustrips basedon country  -->
<h2>Select Country and View Bustrips</h2>
<form action="core2/seebustrip_country.php" method="post">
Country: <input type="text" name="visitcountry"><br>
<input type="submit" value="Submit"><br>
</form>
	
	
<form action="core2/seecounry.php" method="post">
	    
    <select name="visitcountry" id= "visitcountry">
        <option value="1">Select Here</option>
        <?php
        include "core2/seebustrip_country.php";
        ?>
    </select>
	<br>
    <input type="submit" value="Submit">
</form>
<hr>
</div>

</body>
</html>
