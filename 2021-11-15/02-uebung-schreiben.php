<?php  

if (isset($_POST['senden'])){

    $datei = 'gewinn.csv';

    $tkopf = file_exists($datei);

    if(true === $tkopf){

        // Mime-Type auslesen

        $mtype = mime_content_type($datei);

        // prüfung auf nicht textbasierte Dateien

            if($mtype !== 'text/plain'){
                echo "<p>Die Datei <b>$datei</b> vom Typ $mtype kann nicht zum Lesen geöffnet werden!</p>";
                die('<p> Das Programm wird geschlossen.</p>');
            }

        }


}

$fh = fopen($datei, 'a');

if(false === $fh) {
    echo " <p> Die Datei <b>$datei</b> konnte nicht geöffnet werden</p>";
    die('<p>Das Programm wird geschlossen.</p>');
}

if(false === $tkopf){
    //... dann schreibe den Tabellenkopf
    fwrite($fh, "Vorname und Name;Straße;PLZ und Ort;Internet;Webseite;Bestellsystem;Nachricht\r\n");

}

$g_name = $_POST['vname'];
$g_stra = $_POST['stra'];
$g_plz = $_POST['plz'];
$g_int = $_POST['int'];
$g_web = $_POST['web'];
$g_best = $_POST['best'];
$g_nach = $_POST['mit'];

$g_all = "$g_name;$g_stra;$g_plz;$g_int;$g_web;$g_best;$g_nach";

if(fwrite($fh, $g_all)){
    echo '<p>Folgende Daten wurden gespeichert:<br>';
    echo "$$g_name<br>$g_stra<br>$g_plz <br> $g_int<br>$g_web<br>$g_best<br>$g_nach";
}else{
    echo '<p>Das Schreiben der Daten ist fehlgeschlagen.</p>';
}


fclose($fh);

?>