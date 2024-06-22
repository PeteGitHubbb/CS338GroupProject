<?php
include "config/config.php";

function dbConnect(){
    global $config;
    $servername = $config['servername'];
    $username = $config['username'];
    $password = $config['password'];
    $dbname = $config['dbname'];
    $conn = new mysqli($servername, $username, $password, $dbname);
    if($conn->connect_errno){
        die("Connection failed: " . $conn->connect_error);
    }else{
       return $conn;
    }
 }