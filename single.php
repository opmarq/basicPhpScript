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
                <div class="question-section">
                    <h4>What is the best course to learn Frensh?</h4>
                    <span class="question-info" >Question added by <a href="#" >Omar Chajia</a> in <a href="#" >Computer Science</a></span>
                </div>
                <form>
                    <div class="question-post">
                            <textarea name="question" placeholder="You should ..."></textarea>
                            <div class="question-action">
                                <input type="submit" value="Post Answer" class="btn btn-danger">
                            </div>
                    </div>
                </form>
                <div class="answer-section">
                    <div class="autor-info">
                        <img class="profile-img" src="http://via.placeholder.com/100x100" alt="">
                        <span class="author-name" >Chajia Omar</span>
                    </div>
                    Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo ullam ut corrupti reiciendis soluta labore eligendi esse eum numquam aliquam!
                </div>
            </div>
        </div>

    </div>  

</body>
</html>