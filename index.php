<?php 

include 'connection.php';

if($_SERVER['REQUEST_METHOD']=="POST"){

    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];

    $insert_query = "INSERT INTO userr (name,address,phone) values ('$name','$address','$phone')";

    if(mysqli_query($conection,$insert_query)){
        // echo "The insert query is successful";
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
            text-align:center;
        }

        input{
            padding:5px;
            width:200px;
            height:50px;
        }
    </style>
</head>
<body>
    <h1 style="text-align:center;">Enter your detail </h1>
    <hr>
    <form action="index.php" method ="post" style="text-align:center;">

<p>Enter your name = <input type="text" name="name"></p>
<p>Enter your address = <input type="text" name="address"></p>
<p>Enter your phone number = <input type="text" name="phone"></p>

<input type="submit">
    </form>
<br>    <br><br>
    <hr>

    <h1 style="text-align:center;">The details from the database are = </h1>

    
    <?php 

        $select_all = "select * from userr";
        $execute = mysqli_query($conection,$select_all);
        
        if(mysqli_num_rows($execute)==0){
            echo "The database is empty!";
        }
        
        while($row = mysqli_fetch_assoc($execute)){
            
            echo '<p>The name is = ' . $row['name'] .'<br>'.'The address is = ' . $row['address'] .'<br>'.'The phone number is = ' . $row['phone'] .'<br>'. ' <a href="edit.php?id='.$row['id'].'"> edit this</a>' .' <a href="delete.php?id='.$row['id'].'"> delete this</a>'. '</p><br>' . '<hr>';
            
        }
    ?>
    

</body>
</html>