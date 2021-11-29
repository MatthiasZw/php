<?php
session_start();
require_once( '../includes/functions.inc.php' );
$database = 'miniblog';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog',
    'css/blog.css',
    true,
    'Miniblog-Registrierung',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php?id=1',
     'Login' => 'login.php',
     'Registrierung' => 'registrierung.php',
     'Neu' => 'neu.php')
        )
    );
get_header( ...$args );
?>

    
<?php get_footer(true, true); ?>