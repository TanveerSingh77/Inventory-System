<?php
$conn = new mysqli("localhost", "root", "");

if ($conn->connect_error) 
{
    die("Connection failed");
}

$sql="drop database inventory_system;";
if ($conn->query($sql))
{
    echo "Database Deleted";
}
else
{
    echo "Error: ".$conn->error;      
}
?>