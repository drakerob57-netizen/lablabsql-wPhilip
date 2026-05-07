<?php


//create db if not yet exist

$conn = new mysqli("localhost","root","");

$sql = "CREATE DATABASE IF NOT EXISTS school_db";

if ($conn->query($sql) === TRUE){
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $conn->error;
}

// Connect to school_db

$conn = new mysqli("localhost","root","", "school_db");

if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

$tableName = "students";

$result = $conn->query("SHOW TABLES LIKE '$tableName'");
if ($result->num_rows > 0) {
    echo "Table exists!";
}else{
    $sql = "CREATE TABLE $tableName (

    id INT AUTO_INCREMENT PRIMARY KEY,
    fullname VARCHAR(100),
    course VARCHAR(50)
    )";

    $conn->query($sql);
}


if ($conn->query($sql) === TRUE) {
  echo "Table created successfully";
} else {
  echo "Error creating table: " . $conn->error;
}

$fullname = $_POST['fullname'];
$course = $_POST['course'];


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $fullname = $_POST['fullname'];
    $course = $_POST['course'];

    $sql = "INSERT INTO students(fullname, course) VALUES ('$fullname', '$course')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

?>