<?php
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, string $header=NULL, bool $fluid=false )
$args = array(
  'Übung 2 aus Kapitel 11',
  '../../css/style.css',
  true,
  'Übung 2 zu Datumsfunktionen'
);
get_header( ...$args );
?>
<h1>Ausführungsdauer: Funktionsaufruf vs. direkter Aufruf</h1>
<?php

function quadrat($zahl) {
    $ergebnis = $zahl * $zahl;
}

$start_funktion = microtime(TRUE);
for ($i = 1; $i <= 10000; $i++) {
    quadrat($i);
}
$ende_funktion = microtime(TRUE);

echo "<p>Ausführungsdauer (10000 x Aufruf Funktion): <b>" . ($ende_funktion - $start_funktion) . " Sekunden.</b></p>";

$start_direkt = microtime(TRUE);
for ($i = 1; $i <= 10000; $i++) {
    $ergebnis = $i * $i;
}
$ende_direkt = microtime(TRUE);

echo "<p>Ausführungsdauer (10000 x direkte Ausführung): <b>" . ($ende_direkt - $start_direkt) . " Sekunden.</b></p>";
?>
  
<?php get_footer(); ?>