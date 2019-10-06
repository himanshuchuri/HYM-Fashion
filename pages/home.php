<?php
header("Access-Control-Allow-Origin: *");
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$servername = "localhost:3307";
$username = "root";
$password = "";
$dbname = "try_db";

// connect to the database
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "select first_name, last_name, email_id, password FROM users";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname, $name, $adr);
$stmt->fetch();
$stmt->close();


?> 