<?php 
$dbustrip = $_POST["deletebustrip"];
$sql = "DELETE FROM bustrip WHERE tripid=".$dbustrip;

if (!mysqli_query($link,$sql)) {
	die ("Fail to delete". mysqli_error($link));
}
else {
    header('Location: ../deletrip.php');
    
}
?>
