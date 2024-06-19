<?php

$dbhost = "localhost";
$dbuser = "root";
$dbpass = "";
$dbname = "characterdb";

if(!$con = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname))
{

	die("failed to connect!");
}

