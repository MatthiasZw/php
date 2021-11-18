<?php

session_start();    // Als erstes

require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sessions', 
    NULL, 
    true,
    'Sessions - Startseite'
);
get_header( ...$args );
?>

<h2>Die Session wurde gestartet</h2>

<p>Session-ID: <?php echo session_id(); ?> <br> Name der Session
<?php echo session_name(); ?></p>

<p>Weiter zur <a href="02-formular.php">nächsten</a> Seite</p>
    
<?php get_footer(); ?>