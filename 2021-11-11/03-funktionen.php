<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionen</title>
</head>
<body>
    <h1>Funktionen</h1>


    <?php 
    
        /* Eine Funktion wird definiert... */


        function hallo($ausgabe){
            
            if (!empty($ausgabe)){
            return "<p> Hallo $ausgabe ^_^</p>";           
        }
        echo 'Tu was!';
    }

        /* Funktion aufrufen */

        echo hallo('Wald');
    
        $msg = hallo('Wiese');
        
        echo $msg;

        hallo('');


        function summe($zahl1, $zahl2){
            $summe= $zahl1 + $zahl2;
            return $summe;
        }

        $erg = summe(34,8);

        echo "<p> Das Ergebnis: $erg </p>";

        echo "<p> Ergebnis: " . summe(45,-3) . '</p>';

        /* optionale Parameter ans Ende der Kette und vorbelegen*/

        function gesamtpreis( $anzahl, $preis = 42, $waehrung = 'Quadratunzen'){
            $erg = $anzahl * $preis;
            return " <p>Ihr Einkauf kostet $erg $waehrung.</p>";
        }

        echo gesamtpreis(5,12.5,'Euro');
        echo gesamtpreis(5);
        echo gesamtpreis(23,17);
        echo gesamtpreis(23, 25, 'Delaybrezen');

        /* Beliebig viele Parameter für die Funktion */

        function viele_parameter($a){
            $args= func_get_args();
            $anz= func_num_args();

            echo '<pre>', var_dump( $args ), '</pre>';

            echo "<p>Der erste Parameter ist $a.</p>";
            echo "<p> Der zweite Parameter ist $args[1].</p>";
            echo "<p> Es wurden $anz Parameter übergeben.</p>";
            echo '<p> Der letzte Parameter ist:' . func_get_arg($anz - 1) . '.</p>';
        }

        viele_parameter(5, 'Quatsch', true, 12.5);

        /* seit PHP 5.7 - variadische Parameter */

        function variadisch(...$params){
            echo '<pre>', var_dump( $params ), '</pre>';
        }

        variadisch(34,23,552,435,true,'quatsch');


        /* Anwendung: */


        function mitarbeiter(string | array $m_name, string $m_vorname, string $beruf, int $alter ): string{
            if (is_array($m_name)){
                $nn = implode(', ', $m_name);
            }else {
                $nn= $m_name;
            }
           return "<p>$m_vorname $nn ist $beruf und $alter Jahre alt.</p>";
        }

        /* normal aufrufen */

        echo mitarbeiter('Maulwurf','Hans', 'Baggerer', 89 );

        /* variadisch aufrufen */

        $m_array = array(
            array ('Rubble','"Geröllheimer"'),
            'Barney',
             'Hammerer',
             46
        );

        echo mitarbeiter(...$m_array);





    ?>
</body>
</html>