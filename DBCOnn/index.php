<?php
    require('database.php');
    include('user.php');



//create object from database class
    $dbconnect= new Database('localhost','OOP','root','popo8989');

    $toto = new User('thomas','haha', 'toto@gmail.com');
    var_dump($toto);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>