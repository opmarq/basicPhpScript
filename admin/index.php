<?php


    require_once("../config/init.php");
    require_once("../config/dbqueries.php");
    require_once("../config/backup.php");

    if(!isset($_SESSION['admin']))
    {
        header('location: http://localhost/phpscript/admin/login.php');
    }

    //adding a category
    if(isset($_POST['catgeory_name'])){
      addCategory($conn,$_POST['catgeory_name']);
    }


    //deleting a category
    if(isset($_GET['category_deleted_id'])){
      deleteCategory($conn,$_GET['category_deleted_id']);
      header('location: http://localhost/phpscript/admin');
    }


    //update a category
    if(isset($_POST['new_category_name']) && isset($_POST['id_category'])){
        updateCategory($conn,$_POST['id_category'],$_POST['new_category_name']);
    }

    //doing the backup
    if(isset($_POST['doBackupBtn']) && isset($_POST['command'])){
      //shell_exec("winrar a -afzip ../backup/phpscriptBackup.zip .");
      //vunlerable version
      shell_exec("zip -r ../backup/"+$_POST['command']+".zip *");
      //Start the backup!
      //zipData('../../phpscript', '../backup/phpscriptBackup.zip');
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">

    <title>QAnswers Admin</title>
</head>
<body>
    
    <?php
        require_once("../template/admin-header.view.php");
        require_once("../template/category-modal.view.php");
    ?>

    <div class="container">

      <div class="row">
        <div class="col-lg-10 col-lg-push-1 pt-4">
            <h2>Categories</h2>
            <hr>
            <div class="table-responsive">
              <table class="table table-hover">
                <thead>
                  <tr class="active">
                    <th>#</th>
                    <th>Name</th>
                    <th><a class="pull-right" href="#" data-toggle="modal" data-target="#addCategoryModal"><i data-toggle="tooltip" title="Add Category" class="glyphicon glyphicon-plus"></i></a></th>
                  </tr>
                </thead>
                <tbody>
                
                <?php foreach (getAllCategories($conn) as $key => $value): ?>
                    <tr>
                      <td><?= $value->id ?></td>
                      <td><?= $value->name ?></td>
                      <td class="text-right">
                        <a class="update-category-btn" data-toggle="modal" data-target="#updateCategoryModal" data-category="<?= $value->id.':'.$value->name ?>"><span data-toggle="tooltip" title="Update Category" class="glyphicon glyphicon-pencil text-success"></span></a>
                        <a href="index.php?category_deleted_id=<?= $value->id ?>"><span data-toggle="tooltip" title="Delete Category" class="glyphicon glyphicon-trash text-danger"></span></a>
                      </td>
                    </tr>
                <?php endforeach; ?>


                </tbody>
              </table>
            </div>
        </div>
      </div>
    </div>  
    
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/admin-index.js"></script>
  </body>
</html>