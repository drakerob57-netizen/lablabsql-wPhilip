<?php

//CREATE Database
$conn = new mysqli("localhost","root","");

$sql = "CREATE DATABASE school_db";

if ($conn->query($sql) === TRUE){
    echo "Database created successfully";

}



//Create Table

$conn = new mysqli("localhost","root","", "school_db");

$sql = "CREATE TABLE students (

id INT AUTO_INCREMENT PRIMARY KEY,
fullname VARCHAR(100),
course VARCHAR(50)
)";

$conn->query($sql);

