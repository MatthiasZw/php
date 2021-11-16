<?php 
require_once 'functions.inc.php';
get_header(
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

get_nav();

get_footer(true);