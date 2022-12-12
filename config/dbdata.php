
<?php
define('DB_SERVER', 'localhost');
define('DB_PORT',8889);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', 'cs3319');
define('DB_NAME', '14_assign2db');

/* Try to connect to MySQL Database */
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME,DB_PORT);

//Connection Check
if($link === false){
    die("connection failed" . mysqli_connect_error());
}
?>