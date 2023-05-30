<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "@Admin021";
$dbname = "test";

if(!$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname))
{

	die("failed to connect!");
}
