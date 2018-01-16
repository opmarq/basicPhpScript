<?php
   
    require_once("config/init.php");
    require_once("config/dbqueries.php");

    if(!isset($_SESSION['user']))
    {
        header('location: http://localhost/phpscript/login.php');
    }

    

    $questionID = $_GET['id'];
    $whitelistOfIds = array();
    foreach(selectAllQuestions($conn) as $key => $value ) :
        array_push($whitelistOfIds,$value->id);
    endforeach;
    if(!in_array($questionID,  $whitelistOfIds)){
        echo "error question with id of ".htmlspecialchars($questionID)."dosen't exist !";
        exit;
    }

    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        addAnswer($_POST['answer'],$questionID,$_SESSION['user']->id,$conn);            
    }

    $selectedQuestion = getQuestion($questionID,$conn)[0];

    //var_dump(getAnswersOf($questionID,$conn));

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
                <div class="question-section">
                    <h4><?= $selectedQuestion->question ?>?</h4>
                    <span class="question-info" >Question added by <a href="#" ><?= htmlspecialchars($selectedQuestion->username) ?></a> in <a href="#"> <?= htmlspecialchars($selectedQuestion->category) ?> </a></span>
                </div>
                <form method="POST" action="">
                    <div class="question-post">
                            <textarea name="answer" placeholder="You should ..."></textarea>
                            <div class="question-action">
                                <input type="submit" value="Post Answer" class="btn btn-danger">
                            </div>
                    </div>
                </form>
                <?php  foreach (getAnswersOf($questionID,$conn) as $value):?>
                    <div class="answer-section">
                        <div class="autor-info">
                            <img class="profile-img" src="uploads/<?= $_SESSION['user']->avatar ?>" alt="">
                            <span class="author-name" ><?= $value->login ?></span>
                        </div>
                    <p><?= htmlspecialchars($value->content) ?></p>
                    </div>
                <?php endforeach; ?>
            </div>

        </div>

    </div>  

</body>
</html>