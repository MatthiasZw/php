<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Datumsfunktionen',
    NULL,
    true
);
get_header( ...$args );

echo '<pre>', var_dump( getdate() ), '</pre>';

$datum = getdate(1596709131);

printf( '<p>Das Datum: %s, %d. %s %d</p>', $datum['weekday'], $datum['mday'], $datum['month'],$datum['year'] );

// könnte auch alles Ayurvedisch übergeben werden, als ...Array

/* === Funktionen zur formatierten Datumsausgabe
============================================================================================= */


/* Datumsausgabe mit strftime() */

echo '<p>';
echo time ();
echo '</p>';

echo strftime('%A, %e. %B %Y' );

// Setze die lokalen Ausgaben Länderspezifisch 
// Dies funktioniert nur in Verbindung mit strftime()

setlocale(LC_ALL, 'DE');

echo '<br>';
echo strftime('%A, der %e. %B %Y',time() - 28 * 24 * 60 *60 );

/* erzeugt einen Zeitstempel aufgrund eines Datums.
    dabei erfolgt die Datums-Angabe in folgender Reihenfolge:
    STd, MIn, Sek, Monat, Tag, Jahr */

$zeitstempel= mktime(17, 0, 0, 12, 24, 2021);

/* Datums-Ausgabe mit date() */


printf('<p>Datums- und Zeitausgabe mit date(): %s</p>', date('d.m.Y H:i', $zeitstempel)); // ohne zweiten paramter wird aktuelle ServerZeit ausgegeben


echo '<p>';
echo date('l, \d\e\r d.m.y H:i:s \U\h\r', $zeitstempel);
echo '</p>';

//Zeitmessung mit microtime();

echo '<p>';
echo 'microtime() string micro sec ' . microtime() . '<br>';
echo 'microtime(true) float sec.micro' . microtime(true) . '<br>';

echo '</p>';


//Kurzes Beispiel

$start = microtime(true);

for($i = 1; $i <=100000; $i++){
    $quadrat = sqrt($i);
}
 $ende = microtime(true);


 echo '<p> Die Ausführungsdauer: ' . ($ende - $start) .  ' Sekunden</p>';

 // Zeitstempel mit englischen Zeitnagaben
 $zeitstempel = strtotime('+ 2 weeks 2 days 2 hours 2 minutes');

 echo '<p>';
 echo date('d.m.Y H:i:s', $zeitstempel);
 echo '</p>';

?>


<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
<p>Geben Sie bitte das Datum in der Form tt.mm.jjjj ein!</p>

<input type="text" name="datum">
<input type="submit" value="Prüfen" name="senden">
</form>

<?php 

if (isset($_POST['senden'])){

    // Zum Prüfen des korrekten Datums mit der Funktion
    // checkdate() benötigen wir das Datum in seine einzelnen
    // Teile zerlegt


    // Zerlege die Zeichenkette Datum anhand eines Trennzeichens (.) in ein ARRAy

    $datum = explode('.', $_POST['datum'], 3);

    $check = checkdate($datum[1], $datum[0], $datum[2]);

    if($check) {
        echo '<p class="alert alert-success">' . $_POST['datum'] . ' basst scho</p>';
    }else {
        echo '<p class="alert alert-danger">' . $_POST['datum'] . ' basst nicht</p>';
    }

}



echo '<h1>Übungen</h1>';

echo '<p>';
echo date('d.m.y ') . '<br>';
echo date('d-m-Y '). '<br>';
echo date('d-m-Y  - h:m:s'). '<br>';
echo date('d/m/Y  - h:m:s \P\M'). '<br>';
echo date('Y-m-d '). '<br>';
echo date('h:m \U\h\r'). '<br>';

setlocale(LC_ALL, 'DE');
echo strftime('%A');

$tsd= strftime('%A');


switch($tsd){
    case 'Montag':
        echo "<p> Heute ist $tsd</p>";
        break;
        case 'Dienstag':
            echo "<p> Heute ist $tsd</p>";
            break;
            case 'Mittwoch':
                echo "<p> Heute ist $tsd</p>";
                break;
                case 'Donnerstag':
                    echo "<p> Heute ist $tsd</p>";
                    break;
                    case 'Freitag':
                        echo "<p> Heute ist $tsd</p>";
                        break;
                        case 'Samstag':
                            echo "<p> Heute ist $tsd</p>";
                            break;
                            case 'Sonntag':
                                echo "<p> Heute ist $tsd</p>";
                                break;
    default:
    echo '<p>Fehler<p>';    
}
echo '</p>';
function sq(float $num):float{
    $erg=$num*$num;
    return $erg;
}

$anf = microtime(true);

for($i = 1; $i <=100000; $i++){
    $quadrat2 = sq($i);
}
 $en= microtime(true);


 echo '<p> Die Ausführungsdauer mit Funktion: ' . ($en - $anf) .  ' 
 Sekunden</p>';

 $anf2 = microtime(true);

 for($i = 1; $i <=100000; $i++){
     $quadrat3 = $i*$i;
 }
  $en2= microtime(true);

  echo '<p> Die Ausführungsdauer mit $i*$i: ' . ($en2 - $anf2) .  ' 
  Sekunden</p>';



?>
    
<?php get_footer(true); ?>

