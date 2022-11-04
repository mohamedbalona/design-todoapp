<?php

session_start();


if(isset($_GET['id'])){

    $conn = mysqli_connect("localhost","root","","todoapp");

    if(!$conn){

    echo mysqli_connect_error($conn);
}

$id = $_GET['id'];


$sql = "SELECT * FROM tasks WHERE id = '$id'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_row($result);


if(!$row){

    $_SESSION['error'] = ['Data not exists'];
    header("location: ../index.php");
    die;

}else{

    $sql = "DELETE FROM tasks WHERE id = '$id'";

    $result = mysqli_query($conn,$sql);

if(mysqli_affected_rows($conn) == 1){

    $_SESSION['succ'] = "Data Delete Succeflly";
}

header("location: ../index.php");
die;

}







}