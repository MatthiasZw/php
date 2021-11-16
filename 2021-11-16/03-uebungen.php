<?php 
echo "<h2>Aufgabe 1</h2>";

$a= 72.123456789;
printf("<p>Lösung: <b>%09.5f</b></p>", $a);


echo "<h2>Aufgabe 2</h2>";

$string1 ='Beachten Sie das Angebot für die';
$string2 ='folgende Kalenderwoche:';
$string3 ='';
$string4 ='Bananen, 5KG für nur 5.- Euro!';

 

printf("$string1 - " . "$string2 -" . "%'*5s"  . "$string4", $string3);


echo "<h2>Aufgabe 3</h2>";

$string = "$string1 $string2 $string3 $string4";
//echo '<pre>', var_dump( $string ), '</pre>';

$erg = explode(' ', $string);

foreach($erg as $it){
    echo $it .'<br>';
}

$erg2 = implode('#', $erg );

echo '<p>' . $erg2 . '</p>';

//echo '<pre>', var_dump( $erg2 ), '</pre>';

//echo '<pre>', var_dump( $erg ), '</pre>';

echo "<h2>Aufgabe 4</h2>";

$string5 = str_replace('das Angebot', '<b>unser Sonderangebot</b>', $string1);
$string6 = str_replace('Bananen', 'Alle Obstsorten', $string4);

printf("$string5 " . "$string2 " . "$string3 " . "$string6");


?>


