<?php
session_start();
if( isset ($_SESSION['username']) && isset( $_SESSION['password'] ) ) {

include_once ("includes/header.php");
// include_once ("includes/menu.php");
?>


<!-- admin menu section -->

<div class="admin d-flex">
    
    <div class="admin-menu">
        <a class="navbar-brand" href="http://localhost/flower-encyclopedia/admin/"><img src="../assets/images/login.webp" class="img-fluid" alt=""><span>Lily's Bloom</span></a>
        <ul class="py-3">
            <li><a href="?pages=all-flowers"><button>All Flowers</button></a></li>
            <li><a href="?pages=add-new-flowers"><button>Add New Flowers</button></a></li>
            <li><a href="?pages=registered-users"><button>Registered Users</button></a></li>
        </ul>
    </div>

    <div class="content">
        
        <?php include_once("content.php"); ?>
    </div>
    <a href="logout.php"><button class="btn btn-danger logout">LOGOUT</button></a>
</div>

<style>
    .logout{
        position: absolute;
        background-color: red;
        top: 10px;
        right: 20px;
        padding: 25px;
    }
</style>

<?php
include_once ("includes/footer.php");
            } else {
                header( "Location: http://localhost/flower-encyclopedia/admin/login.php");
            }
