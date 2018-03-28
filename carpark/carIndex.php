<?php
    include'car.php';
    $newCar = new Car('FR9999', '2015-10-15', 200, 'A7', 'Audi', 'Black', 1.4);
    echo $newCar->drive(200000);
    echo $newCar->display();

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