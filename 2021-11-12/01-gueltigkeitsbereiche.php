<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gueltigkeitsbereiche</title>
</head>
<body>
    <h1>Gueltigkeitsbereiche von Variablen</h1>


    <?php 
    
        $ausgabe = 'ein Wert';   // Top Level Scope

        function tue_etwas($n){
            global $ausgabe;     //  Verpönt, nicht machen, mit return arbeiten
            
            $ausgabe = $n;   // Lokale Variable

            $innen=42;

            echo '<pre> 1.Funktion:', var_dump( $ausgabe ), '</pre>';

            $ausgabe= 'noch ein Wert';

            echo '<pre> 2.Funktion:', var_dump( $ausgabe ), '</pre>';
        }
    

        tue_etwas($ausgabe);

        echo '<pre>3. Script ', var_dump( $ausgabe ), '</pre>';
        
        // echo '<pre>', var_dump( $innen ), '</pre>'; geht gar nicht
        
    ?>

    <h2>Funktionsaufruf per Referenz</h2>

        <?php 
        
            function quadrat($zahl){

                echo "<p>Das Quadrat von $zahl ist:";
                $zahl *= $zahl;
                echo " $zahl .</p>";

            }
            
            function quadrat_ref(&$zahl){

                echo "<p>Das Quadrat von $zahl ist:";
                $zahl *= $zahl;
                echo " $zahl .</p>";

            }

            $wert=3;

            echo "<p>Der Ausgangswert von \$wert ist <b>$wert</b>.</p>";
            
            echo '<h3> call-by-value</h3>';

            for ($i = 1; $i < 4; $i++){
                quadrat($wert);
            } 
            
            echo '<h3> call-by-referenz</h3>';

            for ($i = 1; $i < 4; $i++){
                quadrat_ref($wert);
            }

                echo '<pre>', var_dump( $wert ), '</pre>';

                echo"<p>Der Wert der Variablen \$wert nach der call-by-referenz-Funktion:<b>$wert</b>.</p>";



           
        
        ?>


</body>
</html>