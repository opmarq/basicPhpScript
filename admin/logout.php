<?php

require_once("config/init.php");

session_destroy();

header('location: http://localhost/phpscript/login.php');