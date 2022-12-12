<?php
include '../config/dbdata.php';
$tripid = $_POST["tripid"];
$tripname = $_POST["edittripname"];
$startdate = $_POST["editstartdate"];
$enddate = $_POST["editenddate"];
$file = $_POST["editimage"];
echo $file;

if($tripname != NULL){
	$sql = 'UPDATE bustrip SET tripname = "'.$tripname.'" WHERE tripid='.$tripid;
}
if($startdate != NULL){
	$sql = 'UPDATE bustrip SET startdate = "'.$startdate.'" WHERE tripid='.$tripid;
}
if($enddate != NULL) {
	$sql = 'UPDATE bustrip SET enddate = "'.$enddate.'" WHERE tripid='.$tripid;
}
if($file != NULL) {
	$sql = 'UPDATE bustrip SET urlImage = "'.$file.'" WHERE tripid='.$tripid;
}
echo $sql;
$result = mysqli_query($link,$sql);


if (!$result) {
    die("databases query failed.");
}
else {
 header('Location: ../index.php');
 exit;
 }
?>



