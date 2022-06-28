<?php

$server = "localhost";
$username= "root";
$password= "";

$conection = mysqli_connect($server,$username,$password);

if($conection){
    
    $create_db = "CREATE DATABASE IF NOT EXISTS MYDB";
    $cmd = mysqli_query($conection,$create_db);
    $dbname = "MYDB";
    $conection = mysqli_connect($server,$username,$password,$dbname);

    $create_table = "CREATE TABLE IF NOT EXISTS Userr(
        id int(50) AUTO_INCREMENT PRIMARY KEY NOT NULL,
        name varchar(100) NOT NULL,
        address varchar(100) NOT NULL,
        phone int(100) NOT NULL,
        reg_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )";

    if(mysqli_query($conection,$create_table)){
       
    }
    else{
        echo "failed";
    }

} else {
    die("Your connection is failed");
}

?>