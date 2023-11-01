<?php
/*
// mysql_connect("database-host", "username", "password")
$conn = mysql_connect("localhost","root","") 
            or die("cannot connected");

// mysql_select_db("database-name", "connection-link-identifier")
@mysql_select_db("test2",$conn);
*/

/**
 * mysql_connect is deprecated
 * using mysqli_connect instead
 */

// https://stackoverflow.com/questions/27345377/try-catch-in-mysqli

// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

include_once('database.php');

$databaseHost = $Host;
$databaseName = $Name;
$databaseUsername = $Username;
$databasePassword = $Password;
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);


if (!$mysqli->connect_error) {
  //echo "Connected successfully";
} else {
  die("Connection failed: " . $mysqli->connect_error);
}


