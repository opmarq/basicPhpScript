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
    
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_object($result)) {
            echo "id: " . $row->id. " - Name: " . $row->name."<br>";
        }
    } else {
        echo "0 results";
    }
}

//getAllCategories($conn);
//select all questions of a category 
function getAllQuestionsOfCategory($connection,$id_category)
{
    
    $sql = "SELECT question.id,content,fullname
    FROM category,question,author
    WHERE category.id = question.id_category and question.id_author = author.id and category.id = $id_category";
    
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_object($result)) {
            var_dump($row);
            //echo "id: " . $row->id. " - Name: " . $row->name."<br>";
        }
    } else {
        echo "0 results";
    }
}
// select all questions with author and categories
function getAllQuestions($connection)
{
    
    $sql = "SELECT question.id,question.content,fullname,category.name 
    FROM category,question,author 
    WHERE category.id = question.id_category and question.id_author = author.id";
    
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_object($result)) {
            var_dump($row);
            //echo "id: " . $row->id. " - Name: " . $row->name."<br>";
        }
    } else {
        echo "0 results";
    }
}
// select answers for a specific question
function getAllAnswersOfQuestion($connection,$id_question)
{
    
    $sql = "SELECT answer.content,fullname
    FROM answer,question,author
    WHERE question.id = answer.id_question and answer.id_author = author.id";
    
    $result = mysqli_query($connection, $sql);
    if (mysqli_num_rows($result) > 0) {
    // output data of each row
        while($row = mysqli_fetch_object($result)) {
            var_dump($row);
            //echo "id: " . $row->id. " - Name: " . $row->name."<br>";
        }
    } else {
        echo "0 results";
    }
}