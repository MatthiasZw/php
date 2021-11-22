<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Newsletter abonnieren',
    NULL,
    true,
    
);
get_header( ...$args );
?>
<h3>Über dieses Formular können Sie sich für den Newsletter anmelden:</h3>
<form action="newsletter.php" method="post">

Ihr Name: <input type="text" name="hauptname" ><br>
Ihre E-Mail-Adresse: <input type="email" name="email" ><br>

<button type="submit" name="senden">Absenden</button>



</form>
    
<?php get_footer(); ?>