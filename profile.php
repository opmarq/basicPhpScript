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
                    <h4>Chajia Omar</h4>
                    <p>Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
            <div class="col-md-9">
                <form>
                    <div class="question-post">
                            <textarea name="question" required placeholder="What is the best way to learn C?"></textarea>
                            <div class="question-action">
                                <div class="row">
                                    <div class="col-xs-8">
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="glyphicon glyphicon-flag"></i></span>
                                            <input required style="width:200px;" type="text" class="form-control" name="category">                                            
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
                    <h4> <a href="single">Lorem ipsum dolor sit amet consectetur adipisicing elit. Beatae, unde.</a></h4>
                    <span class="question-info" >Question added by <a href="#" >opmarq</a> in <a href="#" >computer science</a></span>
                </div> 
            </div>
        </div>

    </div>  

</body>
</html>