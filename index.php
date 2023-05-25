<?php




$user = "root";
$pass = "@Admin021"; 
$db = "mysql";

$db = new mysqli('localhost', $user, $pass, $db)
or die ('unable to connect');

echo("connection success!!");