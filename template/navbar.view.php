<div>
        <nav class="navbar navbar-default">
            <div class="container">
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.php">QAnswer</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="index.php">Home</a></li>
                </ul>
                
                <div class="pull-right">
                    <a href="profile.php"><img class="profile-img" src="uploads/<?= $_SESSION['user']->avatar ?>" alt=""></a>
                    <a href="logout.php" class="btn btn-default btn-sm"><span class="glyphicon glyphicon-log-out"></span> logout</a>
                </div>
                
            </div>
        </nav>  
</div>