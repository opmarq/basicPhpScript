<?php


    require_once("../config/init.php");
    require_once("../config/dbqueries.php");

    if(!isset($_SESSION['admin']))
    {
        header('location: http://localhost/phpscript/admin/login.php');
    }else{
        echo("Hello Admin");
    }