<?php

session_start();

$page= $_GET['page'];

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
    '../css/blog.css',
    true,
    'Miniblog-UEBERSICHT',
    array(
        'Mein Blog',
    array( 'Übersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );


echo "<div><h1><span class='text-info'>Bitte Anmelden zum Ändern!</span></h1></div><div><h2><a href='detail.php?page=$page'>Sie werden in 5 Sekunden zurück zum Post geleitet.</a></h2></div>";



    header("Refresh:5; url=detail.php?page=$page");


?> 



 

    
<?php get_footer(true, true); ?>