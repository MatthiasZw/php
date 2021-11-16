<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Zeichenketten-Funktionen', 
    NULL,
    true
);
get_header( ...$args );

    $e_mail='Brigitte.B@abc.com';
    echo "<p>Original-Zeichenkette:<b>$e_mail</b></p>";

    /* Zeichenkette finden */

    echo '<p>';

        echo 'Suche nach B@ ergibt: <b>' . strstr( $e_mail, 'B@', true) . '</b><br>';
        echo 'Suche nach B@ ergibt: <b>' . strstr( $e_mail, 'B@') . '</b><br>';
        echo 'Suche nach b@ ergibt: <b>' . stristr( $e_mail, 'b@') . '</b><br>'; // casenonsensitive

    echo '</p>';
    
    /* EInzelne Zeichen finden  */

    echo '<p>';

    echo 'Suche nach i ergibt: <b> ' . strchr($e_mail, 'i') . '</b><br>';
    echo 'Suche nach i ergibt: <b> ' . strrchr($e_mail, 'i') . '</b><br>'; //reverse

    echo '</p>';

    /* PHP 8 neue Funktionen */

    echo '<p>';

    echo 'Suche nach g ergibt: <b> ' . str_contains($e_mail, 'g') . '</b><br>';
    

    echo '</p>';

    /* Beginnt mit / endet mit (bool) */


    echo '<p>';

    echo 'Suche nach Bri ergibt: <b> ' . str_starts_with($e_mail, 'Bri') . '</b><br>';
    echo 'Suche nach Bri ergibt: <b> ' . str_ends_with($e_mail, 'Bri') . '</b><br>'; 
    
    echo 'Suche nach .com ergibt: <b> ' . str_starts_with($e_mail, '.com') . '</b><br>';
    echo 'Suche nach .com ergibt: <b> ' . str_ends_with($e_mail, '.com') . '</b><br>';
    

    echo '</p>';

    /* Einzelne Zeichen finden, Position leifern */

    echo '<p>';

    echo 'Suche nach i ergibt: <b> ' . strpos($e_mail, 'i') . '</b><br>';
    echo 'Suche nach i ergibt: <b> ' . strrpos($e_mail, 'i') . '</b><br>';
    echo 'Suche nach b ergibt: <b> ' . stripos($e_mail, 'b') . '</b><br>';
    
    echo '</p>';

    /* Beginn der Suche angeben */

    echo 'Suche nach i ergibt: <b> ' . strpos($e_mail, 'i', 3) . '</b><br>';

    /* Teilstrings extrahieren */

    $e_mail = 'meister.nadeloehr@wie-ist-meine-ip.de';

    echo "<p> Die Original-Zeichenkette: <b>$e_mail</b>.</p>";

    echo '<p>';

    echo 'Domainnamen extrahieren: <b> ' . substr($e_mail, 18, ) . '</b><br>';
    echo 'Domainnamen extrahieren: <b> ' . substr($e_mail, -19, ) . '</b><br>';
    

    echo '</p>';


    $adressen= array(
        'Brigitte.B@web.de',
        'meister.nadeloehr@wie-ist-meine-ip.de',
        'ben.a@gmx.de'
    );

    echo '<p>';

    foreach($adressen as $adress){
        $pos = strpos($adress, '@');
        echo 'Domainname: <b>' . substr($adress, $pos + 1) . '</b><br>';
    }

    echo '</p>';

    /* Anzahl der Zeichen in einer Zeichenkette */

    $str1 = 'Häuser';
    $str2 = 'Hauser';

    echo '<p>Die zeichenkette ' . $str1 . ' besteht aus <b>' . strlen($str1) . '</b> Bytes. <br>';
    echo 'Die zeichenkette ' . $str2 . ' besteht aus <b>' . strlen($str2) . '</b> Bytes. <br></p>';

    /* Anzahl der gefundenen Suchbegriffe */
    echo '<p>Das / die Zeichen ei kommt in <b>' . $e_mail . '</b> genau <b>' . substr_count($e_mail, 'ei') . '-mal</b> vor.</p>';

    /* zeichenketten wiederholen */

    echo '<p>' . str_repeat($e_mail, 10) . '<p>';

    /* Zeichenfolgen vertauschen */
    $str =' Buch buchen';
    echo '<p>' . strtr($str, 'uh', 'ak') . '<p>';
    /* $str = strtr($str, 'uh', 'ak');
    echo '<p>' . strtr($str, 'b', 'k') . '<p>'; */

    $tausch = array('u' => 'au', 'ch' => 'sch');
    echo '<p>' . strtr($str, $tausch) . '</p>';

    /* Yeichenfolgen ersetzen */
    $str='Meine Tante lebt in Frankreich. Meine Tante ist noch nicht so alt.';

    echo "<p> Original:$str</p>";

    $str = str_replace('Tante', '<i>Nichte</i>', $str);
    $str = str_replace('Frankreich', '<b>Italien</b>', $str );

    echo "<p>$str</p>";








?>
    
<?php get_footer(true); ?>