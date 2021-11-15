<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>In eine Datei schreiben</title>
</head>
<body>

    <h1>In eine Datei schreiben</h1>


    <?php 
    
        $datei = 'bestellung.csv';


        // Prüfen ob die Datei bereits angelegt ist

        $tkopf = file_exists($datei);

        if(true === $tkopf){

        // Mime-Type auslesen

        $mtype = mime_content_type($datei);

        // prüfung auf nicht textbasierte Dateien

            if($mtype !== 'text/plain'){
                echo "<p>Die Datei <b>$datei</b> vom Typ $mtype kann nicht zum Lesen geöffnet werden!</p>";
                die('<p> Das Programm wird geschlossen.</p>');
            }

        }

        // öffnen der Datei, wenn nicht vorhanden wird sie angelegt.
        
        $fh = fopen($datei, 'a');

        // Prüfen ob öffnen erfolgreich war

        if(false === $fh) {
            echo " <p> Die Datei <b>$datei</b> konnte nicht geöffnet werden</p>";
            die('<p>Das Programm wird geschlossen.</p>');
        }

        //Wenn die Datei neu angelegt wurde

        if(false === $tkopf){
            //... dann schreibe den Tabellenkopf
            fwrite($fh, "Name;Vorname;Ort;Anschrift;PLZ\r\n");

        }



        $k_name='Maulwurf';
        $k_vorn = 'Hans';
        $k_ort = 'Springfield';
        $k_anschrift = 'Evergreen Terace';
        $k_zip = '12345';

        $inhalt = "$k_name;$k_vorn;$k_ort;$k_anschrift;$k_zip\r\n";

        if(fwrite($fh, $inhalt)){
            echo '<p>Folgende Daten wurden gespeichert:<br>';
            echo "$k_name<br>$k_vorn<br>$k_zip $k_ort<br>$k_anschrift";
        }else{
            echo '<p>Das Schreiben der Daten ist fehlgeschlagen.</p>';
        }


        fclose($fh);


    
    ?>

    <h2>Alles auf einmal</h2>


    <?php 
    
    $datei = 'text.txt';

    file_put_contents($datei, "Daten für Zeile 1\r\n", FILE_APPEND);
    
    ?>
</body>
</html>