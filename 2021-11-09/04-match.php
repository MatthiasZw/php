<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Match</title>
</head>
<body>
    <h1>Match() neu seit PHP 8</h1>


    <?php 

    $status = 500;

    $erg = match($status){

        200, 300 => null,
        400 => 'not found',
        500 => 'server error',
        default => 'unknown status code'

    }; //<============ wichtig weil Zuweisung
    
    echo "<p> Server-Status: $erg </p>"; 
    
    
    
    
    ?>
</body>
</html>