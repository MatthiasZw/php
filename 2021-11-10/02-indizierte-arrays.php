<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Indizierte Arrays</title>
</head>
<body>
        <h1>Indizierte Arrays</h1>

        <?php 
        
        $staedte = array(
            'Erfurt',
            'Jena',
            'Frankfurt',
            'Paris',
            'London'
        );
        
        echo "<p>$staedte[3]</p>";

        // Kurzschreibweise seit PHP 5.4

        $laender = [
            'Deutschland',
            'Italien',
            18,
            'England'
        ];

        echo "<p>$laender[2]</p>";

        // Während der Entwicklungsphase: Ausgabe eines Arrays zu Testzwecken

        // 1. mit print_r()

        echo '<pre>';
        print_r($staedte);
        echo '</pre>';


        // 2. mit var_dump()

        echo '<pre>';
        var_dump($laender);
        echo '</pre>';

       // echo '<pre>', var_dump(  ), '</pre>';   // vd
        
        // Anfügen eines Wertes in indizierte Arrays

        $laender[] = 'Belgien';

        // Löschen eines Wertes

        unset($laender[1]); // Italien

        echo '<pre>';
        var_dump($laender);
        echo '</pre>';

        $laender[1]= 'Norwegen';

        $laender[2]= 'UK';

        // Sortieren des Arrays nach den indizes aufsteigend (php.net viele Funktionen)

        ksort($laender);

        $laender[435] = 'Dänenland';

        //echo "<p>$laender[299]</p>";  // dazwischen existiert trotzdem nicht, Lücken vermeiden!

        echo '<pre>';
        var_dump($laender);
        echo '</pre>';

        echo "<p>$laender[1]</p>";

        echo '<p> Das Array $laender hat ' . count($laender) . ' Einträge</p>'; 

        // Ausgabe im Produktivteil mit Schleifen foreach()

        foreach($staedte as $stadt){

            echo "Stadt: $stadt<br>";
        }


        //Gibt die ersten zwei Einträge aus:

        for($i = 0; $i < 2; $i++){
            echo"<p>$laender[$i]<br><p>";
        }



        ?>
</body>
</html>