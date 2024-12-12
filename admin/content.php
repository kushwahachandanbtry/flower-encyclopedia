<?php 

if( isset( $_GET['pages'] ) ) {
    $page = $_GET['pages'];

    switch( $page ) {
        case 'add-new-flowers':
            
            ?>
            <div class="" style="background: #666666">
                <h1 class="text-center text-capitalize text-light"><?php echo $_GET['pages']; ?></h1>
                
            </div>
            
            <?php
            include_once("pages/add-flowers.php");
            break;

        case 'all-flowers':
            ?>
            <div class="" style="background: #666666">
                <h1 class="text-center text-capitalize text-light"><?php echo $_GET['pages']; ?></h1>
            </div>
            <?php
            include_once("pages/all-flowers.php");
            break;

        case 'registered-users':
            ?>
            <div class="" style="background: #666666">
                <h1 class="text-center text-capitalize text-light"><?php echo $_GET['pages']; ?></h1>
            </div>
            <?php
            include_once("pages/registered-users.php");
            break;

        case 'edit-flowers':
            ?>
            <div class="" style="background: #666666">
                <h1 class="text-center text-capitalize text-light"><?php echo $_GET['pages']; ?></h1>
            </div>
            <?php
            include_once("pages/edit-flowers.php");
            break;

        case 'delete-flowers':
            include_once("pages/delete-flower.php");
            break;
    }
} else {
    ?>
            <div class="" style="background: #666666">
                <h1 class="text-center text-capitalize text-light">Welcome to Dashboard</h1>
            </div>
            <?php
}
