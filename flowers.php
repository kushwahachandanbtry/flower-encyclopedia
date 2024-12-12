<?php
include_once ("includes/header.php");
include_once ("includes/menu.php");
?>


<div class="flowers  py-5 text-center">
    <div class="container cards text-center">
        <div class="heading py-3">
            <h1 class="text-uppercase pb-3">Our awesome flowers</h1>
        </div>
        <?php
            include_once("config.php");
                $sql = "SELECT * FROM flower";
                $result  = mysqli_query( $conn, $sql );

                if( mysqli_num_rows( $result ) > 0 ) {
                    

                        ?>
        <div class="row">
        
                        <?php while( $row = mysqli_fetch_assoc( $result ) ) { ?>
            <div class="col-lg-4">
                <div class="card">
                    <img src="<?php echo '/flower-encyclopedia/admin/pages/uploads/' . $row['images']; ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h4 class="card-title text-light text-uppercase"><?php  echo $row['name']; ?></h4>
                        <p class="card-text text-light"><?php
                        echo mb_strimwidth($row['content'], 0, 90, '...') ?></p>
                        <a href="single.php?id=<?php echo $row['flower_id']; ?>" class="btn btn-success btn-block btn-lg gradient-custom-4 text-body">Learn
                            More</a>
                    </div>
                </div>
            </div>
            <?php } ?>

            
        </div>
        <?php
                }
            ?>
    </div>
</div>
<?php

include_once ("includes/footer.php");
?>

