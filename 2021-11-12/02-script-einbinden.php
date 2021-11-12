<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>externes Skript einbinden</title>
</head>
<body>
    <h1>externes Skript einbinden</h1>

    <?php 
    
        /* Zum EInbinden von Skripten kennt PHP 4 Befehle:
        
        include
        require

        include_once         Warnung       once damit nicht zweimal die funktion deklariert wird. Hat mit AUfruf nichts zu tun.
        require_once         Error   

        */

        include '02-funktion.inc.php';  // alternativ wird in PHP/PEAR-Ordner gesucht. Include führt Script weiter aus wenn Fehler. Require nicht.

        // require '02-funktion.inc.php';

        echo "<p>Irgend was anderes</p>";


        echo klausdieter('zefix');

        echo gib_mir('Hansen', 'Hans', 76);


        /* Seit PHP8 Anderung der Parameterreihenfolge möglich durch benannt Parameter */

        echo gib_mir(vorname: 'Hans', alter: 25, nachname: 'Hansen');
    ?>
</body>
</html>