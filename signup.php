<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Qanswer Signup</title>
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
                            <div class="alert alert-warning">
                                Les informations sont incorrect!
                            </div>
                        <form role="form" action="signup.php" method="post" id="login-form" autocomplete="off">
                            <div class="form-group">
                                <label for="full-name" class="sr-only">FUll Name</label>
                                <input type="text" required  name="fullname" id="full-name" class="form-control" placeholder="Full Name">
                            </div>

                            <div class="form-group">
                                <label for="email" class="sr-only">Email</label>
                                <input type="email" required  name="email" id="email" class="form-control" placeholder="somebody@example.com">
                            </div>
                            <div class="form-group">
                                <label for="key" class="sr-only">Password</label>
                                <input type="password" required name="key" id="key" class="form-control" placeholder="Password">
                            </div>
                            <input type="submit" id="btn-login" name="signup" class="btn btn-custom btn-lg btn-block" value="Signup">
                        </form>
                       <hr>
                       <p style="text-align:center">
                           <a href="login.php">Login to your account</a>
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