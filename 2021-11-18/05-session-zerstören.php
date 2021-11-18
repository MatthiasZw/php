<?php
session_start();

require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions', 
    NULL, 
    true,
    'Sessions - Daten zerstören'
);
get_header( ...$args );

/* einzelne EInträge löschen */

echo '<pre>' . print_r($_SESSION) . '</pre>';

unset($_SESSION['vorname']);

echo '<pre>' . print_r($_SESSION) . '</pre>';

/* === Session Zerstören
============================================================================================= */

/* 1. Session-Array leeren */

$_SESSION = array();

echo '<p>Die Session mit der ID: ' . session_id() . 'wurde ';

// 2. Session zerstören

if(session_destroy()){
    echo '<span class="text-success">erfolgreich zerstört</span>';
}else {
    echo '<span class="text-danger">nicht zerstört</span>';
}



?>
    
<?php get_footer(); ?>