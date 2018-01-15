<?php 

    require_once("config/init.php");
    require_once("config/connect.php");
    require_once("config/dbqueries.php");

    if(!isset($_SESSION['user']))
    {
        header('location: http://localhost/phpscript/login.php');
    }

    //the user can upload some file other than an image a php file for example which will harm your system.
    //so we check the content type of the uploaded file if it is not an image we terminate the script.
    if($_FILES['image']['type'] != "image/png" && $_FILES['image']['type'] != "image/jpg" && $_FILES['image']['type'] != "image/jpeg") {
        echo "Only images are allowed!";
        exit;
    }
    
    $target_dir = "uploads/";

    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));

    $file_name = $_SESSION['user']->login ."_profile." . $imageFileType ;

    $target_file = $target_dir . $file_name ;
    
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], htmlspecialchars($target_file))) {

        echo "The file ". htmlspecialchars($target_file) . " has been uploaded.";

        updateUserImage($_SESSION['user']->id,$file_name,$conn);

        $_SESSION['user']->avatar = $file_name;

        header('location: http://localhost/phpscript/profile.php');

    } else {

        echo "Sorry, there was an error uploading your file.";
    }