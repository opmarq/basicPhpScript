<?php 

    require_once("config/init.php");
    require_once("config/connect.php");
    require_once("config/dbqueries.php");

    if(!isset($_SESSION['user']))
    {
        header('location: http://localhost/phpscript/login.php');
    }

    $target_dir = "uploads/";

    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));

    $file_name = $_SESSION['user']->login ."_profile." . $imageFileType ;

    $target_file = $target_dir . $file_name ;
    

    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {

        echo "The file ". $target_file . " has been uploaded.";

        updateUserImage($_SESSION['user']->id,$file_name,$conn);

        $_SESSION['user']->avatar = $file_name;

        header('location: http://localhost/phpscript/profile.php');

    } else {

        echo "Sorry, there was an error uploading your file.";
    }