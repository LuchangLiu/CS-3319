<?php
include '../config/dbdata.php';
$newtripid =$_POST["newtripid"];
$newtripname=$_POST["newtripname"];
$newstartdate=$_POST["newstartdate"];
$newenddate=$_POST["newenddate"];
$newcountry=$_POST["newcountry"];
$newbus=$_POST["newbus"];
$newurl=$_POST["newurlimage"];
echo "begin";
$sql="INSERT INTO bustrip(tripid,tripname,startdate,enddate,visitcountry,busnum,urlImage) VALUES (?,?,?,?,?,?,?)";
$stmt=$link->prepare($sql);
$stmt->bind_param("issssss",$newtripid,$newtripname,$newstartdate,$newenddate,$newcountry,$newbus,$newurl);
$stmt->execute();

header('Location: ../index.php');
exit;
?> 
