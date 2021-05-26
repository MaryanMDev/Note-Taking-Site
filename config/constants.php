<?php 

session_start();

define('LOCALHOST' , 'localhost');
define('SITEURL' , 'http://localhost:8888/todolist/');
define('DB_USERNAME' , 'root');
define('DB_PASSWORD' , 'root');
define('DB_NAME' , 'todolist');

$conn = mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD) or die(mysqli_error($conn));
$db_select = mysqli_select_db($conn , DB_NAME) or die(mysqli_error($conn));

?>