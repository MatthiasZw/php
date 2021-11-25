<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Mein Blog',
    NULL,
    false,
    'Willkommen im Blog',
    array('Mein Blog',
    array( 'PHP' => '02-post.php?id=1',
     'HTML' => '02-post.php?id=2',
     'CSS' => '02-post.php?id=3',
     'JavaScript' => '02-post.php?id=4')
 )
);
get_header( ...$args );
?>
    
<?php get_footer(); ?>


<!-- in phpmyadmin auf die Server-Ebene wechseln
	
"Benutzerkonten" in der oberen Navigationsleiste auswählen
	
"Benutzerkonto hinzufügen" auswählen
	
Unter "Benutzername" einen Namen auswählen (z.B. 'php-user')
	
"Hostname" -> Lokal
	
Auf "Passwort generieren" klicken oder ein Passwort eintragen.
	
 evtl. generiertes Passwort kopieren
	
OK -->