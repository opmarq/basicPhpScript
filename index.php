<?php
   
    require_once("config/init.php");
    require_once("config/dbqueries.php");

    if(!isset($_SESSION['user']))
    {
        header('location: http://localhost/phpscript/login.php');
    }

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
                <?php
                    require_once("template/sidebare.view.php");
                ?>
            </div>
            <div class="col-md-9">
                <form method="post" action="/phpscript/public/Home/index" >
                    <div class="question-post">
                            <textarea name="question" placeholder="What is the best way to learn C?"></textarea>
                            <div class="question-action">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                            <select style="width:200px;" class="form-control" name="category">
                                                      <option value="">ِComputer Science</option>
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
                <div class="question-section">
                    <h4> <a href="single.php"> What is the best course to learn Frensh? </a></h4>
                    <span class="question-info" >Question added by <a href="#" >omar</a> in <a href="#" >Computer Science</a></span>
                </div> 
            </div>
        </div>

    </div>  

</body>
</html>