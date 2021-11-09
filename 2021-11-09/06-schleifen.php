<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schleifen</title>
</head>
<body>
    <h1>Schleifen</h1>
    <h2>while</h2>
    <h3>Kopfgesteuert</h3>
    <?php 
    
    $z= 5; 
    $x = 5;

    while($z <= 10){
        echo "$z<br>";
        $z++;
    }
    
    ?>

    <h2>Fußgesteuert</h2>

    <?php  
    
    do {
        echo "$x<br>";
        $x++;
    } while ($x <= 10);



    ?>


</body>
</html>