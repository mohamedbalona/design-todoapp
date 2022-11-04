<?php

//create table and connect database

$conn = mysqli_connect("localhost","root","");


if(!$conn){

    echo mysqli_connect_error($conn);
}


$sql = "CREATE DATABASE IF NOT EXISTS todoapp";


$resalt = mysqli_query($conn,$sql);

mysqli_close($conn);



//create table 

$conn = mysqli_connect("localhost","root","","todoapp");


if(!$conn){
    echo mysqli_connect_error($conn);
}


$sql = "CREATE TABLE IF NOT EXISTS tasks(

    `id` INT PRIMARY KEY AUTO_INCREMENT,
    `title` VARCHAR(255) NOT NULL
)";


$resalt = mysqli_query($conn,$sql);

mysqli_close($conn);