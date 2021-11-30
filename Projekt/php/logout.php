<?php
session_start();
if( ! isset($_SESSION['navlog'])){
    $_SESSION['navlog']='Login';
    $_SESSION['navlink']='login.php';
    
    $_SESSION['navneu']='';
    $_SESSION['neulink']='';
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
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );


$_SESSION = array();


if(session_destroy()){
    echo '<div><h1><span class="text-success">Sie wurden erfolgreich ausgelogt. Herzlichen Dank für Ihren Besuch!</span></h1></div><div><h2><a href="index.php">Sie werden in 3 Sekunden zurück zur Übersicht geleitet.</a></h2></div>';

    header("Refresh:3; url=index.php");

}else {
    echo '<span class="text-danger">Auslogen fehlgeschlagen!</span>';
}


?>


<br>    
<?php get_footer(true, true); ?>