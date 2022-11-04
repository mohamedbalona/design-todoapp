<?php

session_start();

if($_SERVER['REQUEST_METHOD'] == "POST"){

    $id = $_GET['id'];

    $title = $_POST['title'];

    $conn = mysqli_connect("localhost","root","","todoapp");

    if(!$conn){

        echo mysqli_connect_error($conn);
    }

   
    $sql = "UPDATE tasks SET `title` = '$title' WHERE `id` = '$id'";

    $result = mysqli_query($conn,$sql);

    if(mysqli_affected_rows($conn) == 1){

        $_SESSION['succ'] = "Data Update Succeflly";
    }

    header("location: ../index.php");
    die;
}