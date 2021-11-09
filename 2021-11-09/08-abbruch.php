<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Abbruch</title>
</head>
<body>
    <h1>Abbruch</h1>

    <h2>Schleifen abbrechen </h2>
    <?php 
    
    $budget = 50;
    $ep = 9;
    $menge = 1;

    while ($menge <= 15){
        $gp = $ep * $menge;

        // Wenn der Gesamtpreis das Budget übersteigt

        if($gp > $budget){
            echo '<p> Budget übeschritten</p>';
            break;
        }

        //Ausgabe der Menge und des Gesamtpreises


        echo "<p> $menge Stück: $gp €.</p>";

        // Mengen-Variable um 1 erhöhen

        $menge ++;
    }
    
    
    ?>


    <h2>Schleifen überspringen</h2>
    <p>Alle geraden Zahlen zwischen 1 und 20 in einer Schleife ausgeben</p>

    <?php 
    
    for($i=1; $i<=20; $i++){
        // Prüfung auf ungerade
        if($i % 2 == 1){
            // diesen Durchlauf abbrechen und mit dem nächsten weiter machen
            continue;
        }

        echo "$i <br>";

    }
    
    ?>

</body>
</html>