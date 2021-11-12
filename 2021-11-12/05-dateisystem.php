<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dateisystem</title>
</head>
<body>
    <h1>Arbeiten mit Dateisystem</h1>

    <h2>Öffnen, Lesen, Schließen</h2>


    <?php 
    
        $datei = 'protokoll.txt';


                                                 // Prüfung ob es sich um eine Datei handelt

        if( is_file($datei)){

                                                 // Datei öffnen

            $fh = fopen($datei, 'r') ;

                                                 // prüfen ob open erfolgreich war

            if(false !== $fh){
                                                // Schleife durchlaufen solange Ende nicht erreicht ist EOF
                while(! feof($fh)){

                   $zeile=  fgets($fh);        // fgets() liest eine Zeile ein, springt Anfang nächste 
               
                    echo "$zeile<br>";
                                     
                }

                    fclose($fh);                // Datei schließen

            }else{
                echo "<p> Unerwarteter Fehler beim öffnen der Datei $datei aufgetreten!</p>";
            }

        }else {

            echo "<p>$datei isn't file.</p>";

        }

    
    ?>

        <h2>Alles auf einmal</h2>

        <?php 
        
            // Datei lesen und sofort ausgeben
            readfile($datei);

            // Datei lesen und Zeilen in Array zurückliefern

            $zeilen_array= file($datei);

            echo '<p>';
            foreach($zeilen_array as $zeile){
                echo "$zeile<br>";
            }
            echo '</p>';


            // Datei komplett lesen
            $inhalt = file_get_contents($datei); 

            echo nl2br($inhalt, false);

        ?>


            <h2>Eine bestimmte Zeile lesen</h2>


        <?php 
        if( is_file($datei)){

            // Datei öffnen

            $fh = fopen($datei, 'r') ;

                    // prüfen ob open erfolgreich war

            if(false !== $fh){


                fseek($fh, 10);

                // Zeile ausgeben
                echo fgets($fh);

                    // Schleife durchlaufen solange Ende nicht erreicht ist EOF
                echo '<p>';  
                $i=0; 
                while(! feof($fh)){
                    $i++;
                    if($i != 2){
                        fgets($fh);
                        continue;
                    }else {
                        echo fgets($fh);
                    }

                }

                echo '</p>';

                fclose($fh);                // Datei schließen

            } else {
                echo "<p> Unerwarteter Fehler beim öffnen der Datei $datei aufgetreten!</p>";
                }

        }else {

        echo "<p>$datei isn't file.</p>";

        }

            
        
        ?>    

</body>
</html>