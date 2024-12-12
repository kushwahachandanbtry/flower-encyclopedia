<?php
include_once ("includes/header.php");
include_once ("includes/menu.php");
?>

<div class="slider">
    <div class="slide-text text-center">
        <h1 class="text-uppercase">the art of </br><span>fresher flowers</span></h1>
        <p class="text-center py-5">Fresh flowers can serve as natural stress relievers. Studies have shown </br> that being around flowers can lower cortisol levels, the hormone responsible for stress.</p>
    </div>
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="assets/images/slider2.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/images/slider1.jpg" class="d-block w-100" alt="...">
            </div>
            <div class="carousel-item">
                <img src="assets/images/slider3.jpg" class="d-block w-100" alt="...">
            </div>
        </div>
        <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button> -->
    </div>
</div>

<div class="home-page">
    <div class="banner">
        <div class="container py-5">
            <div class="row">
                    <img src="assets/images/banner.jpg" class="img-fluid rounded" alt="">
            </div>
        </div>
    </div>

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
                    <img src="<?php echo '/flowers/admin/pages/uploads/' . $row['images']; ?>" class="card-img-top" alt="...">
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

    <div class="banner-2">
        <div class="container py-5">
            <div class="row">
                <div class="col-lg-6">
                    <img src="assets/images/banner5.avif" class="img-fluid rounded" alt="">
                </div>
                <div class="col-lg-6">
                    <img src="assets/images/banner6.webp" class="img-fluid rounded" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include_once ("includes/footer.php");
