<?php

session_start();

$conn = mysqli_connect("localhost","root","","todoapp");

if(!$conn){

    echo mysqli_connect_error($conn);
}


if($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['title'])){

    $title = trim(htmlspecialchars(htmlentities($_POST['title'])));

    $errors = [];



    if(empty($title)){

        $errors[] = "The Title IS Requred";
    }


    if(strlen($title) < 7){

        $errors[] = "title must be greater than 6 chars";
    }

    if(!empty($errors)){

        $_SESSION['error'] = $errors;

        header("location: ../index.php");

    die();
    }else{

        $sql = "INSERT INTO `tasks`(`title`) VALUES('$title')";

        $result = mysqli_query($conn,$sql);

      echo  mysqli_affected_rows($conn);

      if(mysqli_affected_rows($conn) == 1){

       $_SESSION['succ'] = "data inserted succeflly";
      }

      header("location: ../index.php");

    }








}