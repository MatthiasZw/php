<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Konstanten</title>
</head>
<body>
    <h1>KONGstanten</h1>

    <?php  

/* === Konstanten
============================================================================================= */

    
    // 1. Standard-Varianten

    define( 'MWST', 0.19);

    echo  '<p> Die Mehrwertssteuer in Deutschland beträgt noch ' . MWST . '%.</p>';
 

    // Alternative Möglichkeit seit PHP 5.3

    const PI = 3.1415;

    // Hinweis: Dies kann nur im Top-Level Scope benutzt werden.
    
    echo 'PI: ' . PI;

 
 
 
 
 
 
 
 ?>




</body>
</html>