<?php 

$servername = "localhost";
$username = "root";
$password = "";
$db_name = "flowers";

$conn = new mysqli( $servername, $username, $password, $db_name );

if( $conn->connect_error ) {
    echo "Connection Failed" . $conn->connect_error;
}
