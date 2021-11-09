<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Switch_case</title>
</head>
<body>
    <h1>Switch_case</h1>
<h2>Wochentage</h2>

<?php 

$heute = 'Samstag';


switch($heute) {
    case 'Samstag':
        echo '<p>Heute ist Wochenende</p>';
        break;
    case 'Sonntage':
        echo '<p>Heute ist fast nicht mehr Wochenende</p>';
        break;
    case 'MOntag':
        echo '<p>Heute ist fast noch Wochenende</p>';    
        break;
    default:
        echo '<p>Bald ist Wochenende</p>'; 
}

?>

<h2>Prüfungsergebnis</h2>

<?php 

$note = 2;
switch ($note) {
    case 1:
    case 2:
    case 3:
    case 4:            
        $erg = 'bestanden'; 
        break;
    case 5:
    case 6:
        $erg= 'nicht ganz bestanden';
        break;    
    case 'keine wertung':
        $erg=$note; 
        break;   
    default:
        $erg = 'keine auswertbare Bedingung';
}

echo "<p>Das Ergebnis der Prüfung: <b>$erg</b>.</p>"; 


switch (true ){
    case (($note >= 1) AND ($note <=4)):
        $erg = 'bestanden';
        break;
    case (($note >=5)AND ($note <=6)):
        $erg= 'nicht ganz bestanden';
        break;
    case ($note== 'keine wertung'):
        $erg=$note;
        break;
    default:
    $erg = 'keine auswertbare Bedingung';
}

echo "<p>Das Ergebnis der Prüfung: <b>$erg</b>.</p>"; 
?>




</body>
</html>