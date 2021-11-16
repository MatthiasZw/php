<?php 
require_once 'functions.inc.php';

$args = array(
    'Testdatei', 
    array('css/style.css', 
    'css/meinstyle.css'), 
    true, 
    NULL, //HEader
    array(
        'Branding',
        array(
            'Startseite' => 'index.php',
            'Über uns' => 'über-uns.php',
            'Test' => 'test.php',
            'Kontakt' => 'kontakt.php'
        )
    ), //nav array
    true
);


get_header( ...$args);


get_footer(true, true);