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

    $legalExtensions = array("jpg", "png");

    $imageFileType = strtolower(pathinfo($_FILES["image"]["name"],PATHINFO_EXTENSION));

    $file_name = $_SESSION['user']->login ."_profile." . $imageFileType ;

    $target_file = $target_dir . $file_name ;
    
<<<<<<< HEAD
    if ( in_array($imageFileType, $legalExtensions) && move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
=======
    
    if (move_uploaded_file($_FILES["image"]["tmp_name"], htmlspecialchars($target_file))) {
>>>>>>> 2e91d7a9cee208bf592006fc3a29520b1322bc35

        echo "The file ". htmlspecialchars($target_file) . " has been uploaded.";

        updateUserImage($_SESSION['user']->id,$file_name,$conn);

        $_SESSION['user']->avatar = $file_name;

        header('location: http://localhost/phpscript/profile.php');

    } else {

        echo "Sorry, there was an error uploading your file.";
    }