<?php 
if( isset( $_GET['id'] ) ) {
    $id = $_GET['id'];

    include_once("config.php");
echo $id;
    $sql = "DELETE FROM flower WHERE flower_id = $id";
    // echo $sql;
    $result = mysqli_query( $conn, $sql );

    if( $result ) {
        header("Location: ?pages=all-flowers");
    } 
}
