<?php 

include 'connection.php';

$id = $_GET['id'];

$old_data = "select * from userr where id='$id'";
$old_data_exec = mysqli_query($conection,$old_data);
$data = mysqli_fetch_assoc($old_data_exec);
$old_name = $data['name'];
$old_address = $data['address'];
$old_phone = $data['phone'];

if($_SERVER['REQUEST_METHOD']=="POST"){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $insert_query = "Update userr set name = '$name' , address = '$address' , phone ='$phone' where id= '$id' ";

    if(mysqli_query($conection,$insert_query)){
        echo "The update query is successful";
        header('location:index.php');
    }
    else{
        echo "failed";
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        h1{
            margin-top:50px;
        }
        p{
            font-size:25px;
        }

        input{
            padding:5px;
            width:200px;
            height:50px;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Edit your detail </h1>
    <hr>
    <form action="#" method ="post" style="text-align:center;">

<p>Enter your name = <input type="text" name="name" value="<?php echo $old_name ?>" ></p>
<p>Enter your address = <input type="text" name="address" value="<?php echo $old_address ?>"></p>
<p>Enter your phone number = <input type="text" name="phone" value="<?php echo $old_phone ?>"></p>

<input type="submit" value="Update data">
    </form>

</body>
</html>