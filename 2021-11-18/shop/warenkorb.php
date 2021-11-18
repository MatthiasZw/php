<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Royal Sweets',
    NULL,
    true,
    'Royal Sweets - Warenkorb',
    array(
        'Royal Sweets',
        array(
            'Start' => 'index.php',
            'Pralinen' => 'pralinen.php',
            'Schokolade' => 'schokolade.php',
            'Warenkorb' => 'warenkorb.php'
        )
    )
);

include 'artikel.php';

get_header( ...$args );

echo '<pre>', var_dump( $_POST ), '</pre>';


if(isset($_POST['schokolade']) OR isset($_POST['pralinen'])){

    // Das Post-array durchlaufen...

    foreach($_POST as $art_nr => $menge) {

        // Prüfe ob $menge > 0 (Kunde hat bestellt)

        if((int)$menge > 0){

            // Menge in das Session-array schreiben

            $_SESSION[$art_nr] = (int)$menge;

        } else {
            if(isset($_SESSION[$art_nr])){
                unset($_SESSION[$art_nr]);
            }
        }

    }

}

echo '<pre>', var_dump( $_SESSION ), '</pre>';
?>
    
<?php get_footer(true, true); ?>