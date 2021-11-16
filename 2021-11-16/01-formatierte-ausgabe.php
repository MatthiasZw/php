<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Formatierte Ausgaben mit printf()'
);
get_header( ...$args );


printf('<p>Eine normale Zeichenkette</p>');
printf('<p>Ausgabe Typ b: <b> %b </b> </p>', 125); // Ganzzahl in binär 
printf('<p>Ausgabe Typ c: <b> %c </b> </p>', 65); // Ganzzahl in ascii 
printf('<p>Ausgabe Typ d: <b> %010d </b> </p>', 3); // Ganzzahl mit 0 vorne
printf('<p>Ausgabe Typ f: <b> %f </b> </p>', 3); // Float
printf('<p>Ausgabe Typ s: <b> %s </b> </p>', '3 x hallo'); // String
printf('<p>Ausgabe Typ x: <b> %x </b> </p>', '255'); // HEX



?>

<h2>Führende Nullen ausgeben</h2>

<?php 

    $hrs = 4;
    $min = 3;

    printf("<p>Ausgabe der Uhrzeit: <b>%02d:%02d Uhr </b> </p>", $hrs, $min);
?>

<h2>Zeichenkette auffüllen</h2>

<?php 
printf("<p>ein aufgefüllter String: <b>%'#7s</b></p>", 'Test');
?>
  
<h2>Formatierte Zahlenwerte</h2>

<p>
    <?php
    $preise = array(22124.665, 12.8, 234, 53.123123123, .5);
    
    foreach($preise as $preis){
    printf('Unser Preis: %03.2f €<br>', $preis);
    }
    ?>
</p>

<h2>Formatierte Zahlen mit number_format()</h2>

<?php 
echo '<p>';
foreach($preise as $preis){
    echo number_format($preis, 2, ',', '.') . '@<br>';
}
?>

<?php get_footer(); ?>

