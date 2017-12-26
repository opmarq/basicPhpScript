<?php

require_once("connect.php");

function insertQuery($query,$connection){

    if (mysqli_query($connection,$query)) {
        
        return true;

    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
        return false;
    }

}

function checkAuth($username,$password,$connection)
{
    
    $sql = "SELECT login FROM author where password = ". $password;  
    
    $result = mysqli_query($connection, $sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
    while($row = mysqli_fetch_object($result)) {

        echo "id: " . $row->id. " - Name: " . $row->fullname."<br>";
    }
    } else {
        echo "0 results";
    }

}

checkAuth("omar","chajia");

// here goes database queries

// select all categories 

// select all questions with author and categories

// select answers for a specifique question