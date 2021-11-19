<?php 

$db = mysqli_connect('localhost', 'php-user', '@kupz-*4ARmcWd4f', 'obstladen');

if(! $db){
    echo '<p><b>Fehler:</b>DB-Verbindung konnte nicht hergestellt werden</p>';
    exit;
}

echo '<p>DB-Verbindung hergestellt. Datenbank "obstladen" wurde ausgewählt.</p>';

mysqli_close($db);