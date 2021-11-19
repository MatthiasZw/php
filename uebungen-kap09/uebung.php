<?php
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Übung K 10',
    '../../css/styles.css',
    true,
    'Übung zu Kapitel 10: <small>String-Funktionen</small>'
);
get_header( ...$args );
?>
<h2>1. Fließkommazahl formatieren</h2>
<?php
$fkz = 8.123456789;

printf( '<p>Ergebnis: <b>%09.5f</b></p>', $fkz );
/*************************************************/
?>




<h2>2. Zeichenkette formatieren</h2>
<p>
<?php
$string1 = 'Beachten Sie das Angebot für die ';
$string2 = 'folgende Kalenderwoche: ';
$string3 = '';
$string4 = 'Bananen, 5 Kilo für nur 5.- Euro!';

printf( "%s---%s---%'*5s---%s", trim($string1), trim($string2), trim($string3), $string4 );
/*************************************************/
?>
</p>




<h2>3. Variablen / Arrays</h2>
<?php
$string = $string1 . $string2 . $string3 . $string4;

$str_array = explode( ' ', $string );

echo '<ul>';
foreach( $str_array as $str ) {
    echo '<li>', $str, '</li>';
}
echo '</ul>';

echo '<p>';
echo implode( '#', $str_array );
echo '</p>';
/*************************************************/
?>




<h2>4. Zeichenkette ersetzen</h2>
<?php
echo '<p><b>Zeichenkette original:</b><br>', $string, '</p>';

$string5 = str_replace( 'das Angebot', '<b>unser Sonderangebot</b>', $string );

$string6 = str_replace( 'Bananen', 'Alle Obstsorten', $string5 );

echo '<p><b>Zeichenkette ersetzt:</b><br>', $string6, '</p>';
?>
<?php get_footer(); ?>