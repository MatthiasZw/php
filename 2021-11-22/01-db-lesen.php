<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'DB Lesen', 
    NULL,
    true,
    'Informationen aus der Datenbank lesen'
);
get_header( ...$args );

    $sql = "SELECT `bstlg_nachname`, `bstlg_sorte`, `bstlg_menge` FROM `tbl_bestellung`";


/* aBFRAGE AN DEN DB-Server abschicken */

if($result = mysqli_query($db, $sql)){
    /* Abfrage war korrekt? */

    /* echo '<pre>', var_dump( $result ), '</pre>';

    $anzahl = mysqli_num_rows($result);

    echo "<p>Es wurden <b> $anzahl </b> Datensätze gefunden</p>"; */

    while ( $erg = mysqli_fetch_array($result, MYSQLI_ASSOC)){
        echo '<pre>', var_dump( $erg ), '</pre>';
    }

}else {
    /* Abfrage war nicht korrekt? */
    echo 'Fehlerhafte Abfrage';

    /* Fehlermeldung des MariaDB */
/* 
    $errnum = mysqli_errno($db);
    $errmsg = mysqli_error($db);

    echo "<p>Fehler-Nr: <b>$errnum</b><br>
    $errmsg</p>"; */

    /* Alles auf einmal: */

    echo get_db_error($db, $sql);
}

mysqli_close($db);
?>
    
<?php get_footer(); ?>