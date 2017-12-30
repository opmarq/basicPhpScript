<?php

require_once("connect.php");

function insertQuery($query,$connection){

    if (mysqli_query($connection,$query)) {
        
        return true;

    } else {
        echo "Error: ";
        return false;
    }

}

function selectQuery($query,$connection)
{
    $result = mysqli_query($connection,$query);

    $returned = [];

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_object($result)) {
            array_push($returned,$row);
        }
    }

    return $returned;

}

function checkAuth($username,$password,$connection)
{
    
    $sql = "SELECT * FROM author WHERE login = '".$username."' AND password = '". $password."'";  
    
    $result = mysqli_query($connection,$sql);

    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_object($result)) {

            return $row;
        }
    }

    return null;
}

function registreUser($fullName,$username,$password,$connection)
{
    $query = "INSERT INTO author(fullname,login,password) VALUES('".$fullName."','".$username."','".$password."')";

    return insertQuery($query,$connection);
}

// select all categories
function getAllCategories($connection)
{
    
    $sql = "SELECT * FROM category";  
    
    return selectQuery($sql,$connection);

}
