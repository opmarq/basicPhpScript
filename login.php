<?php 

    require_once("config/init.php");
    require_once("config/dbqueries.php");

    $auth_error = false;

    if(isset($_POST["username"]) && isset($_POST['password']))
    {
        $username = $_POST['username'];
        $password = $_POST["password"];
        
        $userCheck = checkAuth($username,$password,$conn);

        if($userCheck)
        {

            $_SESSION['user'] = $userCheck;

            header('location: http://localhost/phpscript/');
        }else{
        
            $_SESSION['error'] = true;

            header('location: http://localhost/phpscript/login.php');
            
        }
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qanswer login</title>
    <link href="https://fonts.googleapis.com/css?family=Berkshire+Swash" rel="stylesheet">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">

</head>

<body>

    <section id="login">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="form-wrap">
                        <h1 class="logo">QAnswer</h1>
                            <?php if(isset($_SESSION['error']) && $_SESSION['error'] == true ): ?>
                            <div class="alert alert-warning"> 
                                Vos informations sont incorrect!
                            </div>
                            <?php endif; ?>
                        <form role="form" action="login.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input type="text" required  name="username" id="username" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label for="key" class="sr-only">Password</label>
                                <input type="password" required name="password" id="password" class="form-control" placeholder="">
                            </div>
                            <input type="submit" id="btn-login" name="login" class="btn btn-custom btn-lg btn-block" value="Log in">
                        </form>
                       <hr>
                       <p style="text-align:center">
                           <a href="signup.php">Create your account</a>
                       </p>
                    </div>
                </div>
                <!-- /.col-xs-12 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container -->
    </section>

</body>

</html>