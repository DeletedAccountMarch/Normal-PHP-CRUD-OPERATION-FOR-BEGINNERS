<?php

include 'connection.php';


$id = $_GET['id'];

$old_data = "delete from userr where id='$id'";
$old_data_exec = mysqli_query($conection,$old_data);

if($old_data_exec){
    header('location:index.php');
}
?>