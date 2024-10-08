<?php

$conn = mysqli_connect("localhost", "root", "", "eptran");

if(!$conn){
    die("Connection failed." . mysqli_connect_error());
}

?>