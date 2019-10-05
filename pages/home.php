<?php
header("Access-Control-Allow-Origin: *");
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 
$servername = "den1.mysql4.gear.host";
$username = "makeyourcakedb";
$password = "hriday@123";
$dbname = "makeyourcakedb";

// connect to the database
$mysqli = new mysqli($servername, $username, $password, $dbname);
 
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "select id, username, email, password FROM users";

$stmt = $mysqli->prepare($sql);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($cid, $cname, $name, $adr);
$stmt->fetch();
$stmt->close();

echo "<table>";
echo "<tr>";
echo "<th>CustomerID</th>";
echo "<td>" . $cid . "</td>";
echo "<th>CompanyName</th>";
echo "<td>" . $cname . "</td>";
echo "<th>ContactName</th>";
echo "<td>" . $name . "</td>";
echo "<th>Address</th>";
echo "<td>" . $adr . "</td>";
echo "</tr>";
echo "</table>";
?> 