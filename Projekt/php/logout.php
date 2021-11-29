<?php
session_start();
if(!$_SESSION['navlog']){
    $_SESSION['navlog']='Login';
    $_SESSION['navlink']='login.php';
}


require_once( '../includes/functions.inc.php' );
$database = 'miniblog';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog',
    'css/blog.css',
    true,
    'Miniblog-LOGOUT',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     'Neu' => 'neu.php')
        )
    );
get_header( ...$args );
?>


    
<?php get_footer(true, true); ?>