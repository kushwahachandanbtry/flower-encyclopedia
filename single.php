<?php
include_once ("includes/header.php");
include_once ("includes/menu.php");
include_once("config.php");

if( isset( $_GET['id'] ) ) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM flower WHERE flower_id = $id ";

    $result  = mysqli_query( $conn, $sql );

    if( mysqli_num_rows( $result ) > 0 ) {
        while( $row = mysqli_fetch_assoc( $result ) ) {

?>


<div class="flowers  py-5 text-center">
    <div class="container cards text-center">
        <div class="heading py-3">
            <h1 class="text-uppercase pb-3">About <?php echo $row['name']; ?></h1>
        </div>
        <div class="col-12 text-center">
            <div class="images">
                <img src="/flower-encyclopedia/admin/pages/uploads/<?php echo $row['images']; ?>" class="img-fluid" style="height: 80vh; width: 70%" alt="">
            </div>
        </div>
        <div class="content text-start py-2">
            <p><?php echo $row['content']; ?></p>
        </div>

    </div>
</div>
<?php
  }
}
include_once ("includes/footer.php");
}
?>

