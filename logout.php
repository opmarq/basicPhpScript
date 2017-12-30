<?php

require_once("config/init.php");
$isAdmin = false;
if(isset($_SESSION['admin'])){
    $isAdmin = true;
}
session_destroy();

if($isAdmin){
    header('location: http://localhost/phpscript/admin/login.php');
}else{
    header('location: http://localhost/phpscript/login.php');
}
