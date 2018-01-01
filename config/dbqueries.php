<?php

require_once("connect.php");

function executeQuery($query,$connection){

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

function checkAdminAuth($username,$password,$connection)
{
    
    $sql = "SELECT * FROM admin WHERE login = '".$username."' AND password = '". $password."'";  
    
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

    return executeQuery($query,$connection);
}

// select all categories
function getAllCategories($connection)
{
    
    $query = "SELECT * FROM category";  
    
    return selectQuery($query,$connection);

}

//add a new category
function addCategory($connection,$category_name){
    $query = "INSERT INTO category(name) VALUES('".$category_name."')";

    return executeQuery($query,$connection);
}

//delete a category
function deleteCategory($connection,$id){
    $query = "DELETE FROM category WHERE id = $id";

    return executeQuery($query,$connection);
}

//update a category
function updateCategory($connection,$id,$category_name){
    $query = "UPDATE category set name = '".$category_name."' WHERE  id = $id";
    return executeQuery($query,$connection);
}


// insert A question

function addQuestion($content,$author_id,$category_id,$connection)
{
    $query = "INSERT INTO question(content,id_category,id_author) VALUES('".$content."','".$category_id."','".$author_id."')";

    return executeQuery($query,$connection);
}

// select all questions 

function selectAllQuestions($connection)
{
    $query = "SELECT q.id as id, q.content as question, a.login as username,c.name as category FROM question q 
                JOIN author a on q.id_author = a.id 
                JOIN category c on q.id_category = c.id";

    return selectQuery($query,$connection);

}

// get Questions by category

function getQuestionByCategory($cat_id,$connection)
{
    $query = "SELECT q.id as id, q.content as question, a.login as username,c.name as category FROM question q 
    JOIN author a on q.id_author = a.id 
    JOIN category c on q.id_category = c.id WHERE c.id = '". $cat_id."'";

    return selectQuery($query,$connection);
}

// get selected question 
function getQuestion($id,$connection)
{
    $query = "SELECT q.id as id, q.content as question, a.login as username,c.name as category FROM question q 
    JOIN author a on q.id_author = a.id 
    JOIN category c on q.id_category = c.id WHERE q.id = '".$id."'";

    return selectQuery($query,$connection);
}

// insert answer 
function addAnswer($content,$question_id,$author_id,$connection)
{
    $query = "INSERT INTO answer(content,id_question,id_author) VALUES('".$content."','".$question_id."','".$author_id."')";

    return executeQuery($query,$connection);
}

// select answers of a question 

function getAnswersOf($question_id,$connection)
{
    $query = "SELECT answer.content, author.login FROM answer 
    JOIN author ON answer.id_author = author.id
    JOIN question ON answer.id_question = question.id
    WHERE answer.id_question = ". $question_id;

    return selectQuery($query,$connection);
}

// selecting questions of the specified user

function getUserQuestions($user_id,$connection)
{
    $query = "SELECT q.id as id, q.content as question, a.login as username,c.name as category FROM question q 
    JOIN author a on q.id_author = a.id 
    JOIN category c on q.id_category = c.id WHERE a.id = '".$user_id."'";

    return selectQuery($query,$connection);
}

function updateUserImage($user_id,$avatar,$connection)
{

    $query = "UPDATE author SET avatar = '".$avatar."' WHERE id = '".$user_id."'";

    executeQuery($query,$connection);

}