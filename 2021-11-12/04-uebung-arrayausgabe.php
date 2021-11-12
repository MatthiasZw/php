<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>array-ausgabe</title>
</head>
<body>

    <h1>Array-Ausgabe-Funktion</h1>


<?php 

$test= array(
    'Obst' => 'Birne',
    'Gemmüse' => 'Erbse',
    'Musik' => 'Rockabilly'
);

    function arrayAusgabe($arr, $rand=false, $farbe='blue'){

        if ($rand == true){
            $rand='1px solid';
        } else{$rand = '0px solid';}


        echo "<table  style='border:$rand $farbe;'>";
        foreach ($arr as $ind => $wert){
            
            
            echo '<tr>';

            echo "<td style='border:$rand $farbe;'>$ind</td>";
            echo "<td style='border:$rand $farbe;'>$wert</td>";

            echo '</tr>';

           
        }
            echo '</table>';
    }

    arrayAusgabe($test, true, 'red');



?>

    
</body>
</html>