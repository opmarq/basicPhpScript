<?php
   
    require_once("config/init.php");
    require_once("config/dbqueries.php");

    if(!isset($_SESSION['user']))
    {
        header('location: http://localhost/phpscript/login.php');
    }

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $question = $_POST['question'];
        $category = $_POST['category'];
        $user_id = $_SESSION['user']->id;

        if(addQuestion($question,$user_id,$category,$conn))
        {
            header('location: http://localhost/phpscript/profile.php');
        }
    }

    $questions = getUserQuestions($_SESSION['user']->id,$conn);

   // var_dump($questions);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <title>QAnswers</title>
</head>
<body>

    <?php
        require_once("template/navbar.view.php");
    ?>

    <div class="container">

        <div class="row">
            <div class="col-md-3">
                <div class="profile-section">
                    <img src="http://via.placeholder.com/300x300" alt="">
                    <h4><?= $_SESSION['user']->fullname; ?></h4>
                    <p><?= $_SESSION['user']->bio; ?></p>

                    <form method="post" action="upload.php" enctype="multipart/form-data">
                        <input type="file" name="image" id="upimage">
                        <input name="upload" type="submit" value="upload">
                    </form>
                </div>
            </div>
            <div class="col-md-9">
                <form method="post" action="" >
                    <div class="question-post">
                        <textarea name="question" placeholder="What is the best way to learn C?"></textarea>
                        <div class="question-action">
                            <div class="row">
                                <div class="col-xs-8">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                        <select style="width:200px;" class="form-control" name="category">
                                                
                                            <?php foreach (getAllCategories($conn) as $key => $value): ?>
                                                <option value="<?= $value->id ?>">ِ<?= $value->name; ?></option>
                                            <?php endforeach; ?>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-xs-4">
                                    <input type="submit" value="Add Question" class="btn btn-danger">
                                    </div>
                                </div>
                            </div>
                    </div>
                </form>
                <?php foreach ($questions as $value): ?>
                    <div class="question-section">
                        <h4> <a href="single.php?id=<?= $value->id ?>"><?= $value->question ?></a></h4>
                        <span class="question-info" >Question added by <a href="#" ><?= $value->username ?></a> in <a href="#" ><?= $value->category ?></a></span>
                    </div> 
                <?php endforeach; ?>
            </div>
        </div>

    </div>  

</body>
</html>