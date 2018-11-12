<?php
 $_server = "localhost";
$_user = "root";
$_password = "paulnov3";
$_db = "NACOSSdebate";
    //creating connection to server
    @$connect = mysqli_connect($_server,$_user,$_password);
    if(!$connect){
    die("failed to connect to server..!");
    }
    //selecting database
    @$connectdb = mysqli_select_db($connect,$_db);
    if(!$connectdb){
        die("failed to connect to database");
    }
?>