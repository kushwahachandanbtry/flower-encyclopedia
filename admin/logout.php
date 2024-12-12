<?php 

session_start();
session_unset();

session_destroy();

header("Location: http://localhost/flowers/admin/login.php");

