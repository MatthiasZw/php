<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Royal Sweets',
    NULL,
    true,
    'Royal Sweets - Ihr Schoko-Laden-Laden',
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
get_header( ...$args );
?>

<p class="lead">Herzlich Wilkommen in unserem Schoko-Laden-Laden</p>
<p>Bitte wählen Sie aus unseren Angeboten:</p>

<ul>
    <li><a href="schokolade.php">Schokolade</a></li>
    <li><a href="pralinen.php">Pralinen</a></li>
</ul>
    
<?php get_footer(true, true); ?>