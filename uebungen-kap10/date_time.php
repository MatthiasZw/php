<?php
require_once( '../../includes/functions.inc.php' );
$args = array(
  'Übung 1 aus Kapitel 11',
  '../../css/style.css',
  true,
  'Übung 1 zu Datumsfunktionen'
);
get_header( ...$args );
?>
<h2>Übung Teil 1: <small>Verschiedene Darstellungen des aktuellen Datums</small></h2>

<?php
echo "<p>" . date("d.m.y") . "</p>";
echo "<p>" . date("d-m-Y") . "</p>";
echo "<p>" . date("d.m.Y - H:i:s") . "</p>";
echo "<p>" . date("m/d/y - h:i A") . "</p>";
echo "<p>" . date("Y-m-d") . "</p>";
echo "<p>" . date("H:i") . " Uhr</p>";
?>


<h2>Übung Teil 2: <small>Englische Datumsbezeichnungen ins Deutsche übersetzen</small></h2>
<?php
setlocale(LC_ALL, "deu"); // bzw.: "de_DE"
echo "<p>" . "Aktueller Wochentag: " . strftime("%A") . "</p>";
?>



<h2>Übung Teil 3: <small>Ausgaben zu Wochentagen</small></h2>
<?php
$datum = getdate();
switch ($datum["wday"]) {
    case 0:
    echo "<p>Was sich nicht von der Couch erledigen lässt bleibt liegen! Schönen Sonntag!</p>";
    break;
    case 1:
    echo "<p>Zu kalt,<br>zu früh,<br>zu Montag!</p>";
    break;
    case 2:
    echo "<p>Dienstag, und ich bin schon wieder reif für's Wochenende.</p>";
    break;
    case 3:
    echo "<p>Heute ist gefühlt der dritte Montag in dieser Woche. Schönen Mittwoch!</p>";
    break;
    case 4:
    echo "<p>Heute bitte nicht stören – Ich warte auf Freitag!</p>";
    break;
    case 5:
    echo "<p>Freitag es ist! Durst größer wird ich fühle!</p>";
    break;
    case 6:
    echo "<p>Eigentlich bin ich heute aufgestanden, um die Welt zu retten. Aber es ist Samstag. Ich muss jetzt erstmal <b>einkaufen</b>.</p>";
    break;
    default:
    echo "<p>Drei Tage unterwegs gewesen. Nur noch von einem gewusst. <span class='uc'>Wtf ist heute für ein Tag</span>???</p>";
}
?>    
<?php get_footer(); ?>