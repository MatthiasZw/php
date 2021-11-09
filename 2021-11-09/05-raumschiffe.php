<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raumschiffe</title>
</head>
<body>
    <h1>Raumschiffe</h1>

    <?php 
    
    
    // Spaceship Operator ergibt 1 (a größer b) , -1 ( a kleiner b), 0 ( gleich)


    $a = 9;
    $b = 6;

    echo $a <=> $b;


    // Null Coalescing-Operator (weist a zu wenn existiert (z.b nicht null), sonst b)

    $c = $a ?? $b;

    echo "<p>$c</p>";



    
    
    
    ?>




</body>
</html>