<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Logische Verkettung</title>
</head>
<body>
    
<h1>logische Verkettung</h1>


<?php 

$a = 4;
$b = 2;


// logisches UND: AND oder &&


if (($a >= 3) AND ($a <= 8)){
    echo '<p>$a liegt zwischen 3 und 8</p>';
}


// logisches OR: OR oder ||  (Auch wenn beide true)

if (($a == 4) || ($b <= 4)) {
    echo '<p>$a ist 3 oder $b ist kleiner 4</p>';
}

// logisches entweder oder: XOR (nur wenn eins true)

if(($a == 4) XOR ($b <= 1)){
    echo '<p> Entweder $a ist 4 oder $b ist 5 </p>';
}

// logisches NICHT: !
// Vergleich wird ins Gegenteil gewandelt

if (!($a==3 )){
    echo '<p> $a ist nicht 3</p>';
}



?>


</body>
</html>