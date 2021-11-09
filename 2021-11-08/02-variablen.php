<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variablen</title>
</head>
<body>
    <h1>Variablen</h1>
    
    <?php 
    
    // Variablen beginnenin PHP mit einem $
    // Bekanntgabe (Deklaration) und Wertzuweisung (Initialisierung)

    $eine_zahl = 5; // Datentyp Integer (Ganzzahl)
    $eine_zeichenkette ='Hier kommt ein Karton.?';  //Datentyp: String (Zeichenkette)
    $keine_ahnung = '5'; // 

    /* 
        Umgang mit Zeichenketten
    
    */

    echo '<h2>' . $eine_zeichenkette . '</h2>';

    echo "<h2>$eine_zeichenkette $eine_zahl $keine_ahnung</h2>"; // Verkettung mit "" wird interpretiert, Variablen werden durch ihren Wert ersetzt

    echo '<p> Das Ergebnis ist: ' . $keine_ahnung + $eine_zahl . '</p>';  // ab PHP 8 geht Typkonvertierung

    echo '<p>' . gettype($eine_zahl) . '<br>';
    echo gettype ($eine_zeichenkette) . '<br>';
    echo gettype ($keine_ahnung) . '</p>';

    
    // automatische Typkonvertierung

    $keine_ahnung = 10.5;  //Dezimalzahl (double/float)

    echo '<p>' . gettype($keine_ahnung) . '</p>';

    /* === Rechnen mit Variablen
    ============================================================================================= */

    $a = 2.4;
    $b = ' 3 Tassen Kaffe';
    $c = '2.5';

    $erg = $a * $c;

    print('<p>' . $erg . '</p>'); // oder:

    echo "<p>$a mal $c ist gleich $erg.</p>";

    // bei arithmethischen Operationen werden Strings, bei denen ein numerischer Wert am Anfang steht
    // in einen numerischen Datentyp konvertiert

    $preis= $eine_zahl * $b;

    echo "<p> $b kosten $preis €. </p>";



    /* === Inkrement und Dekrement
    ============================================================================================= */

    // 1. Pre - Inkrement
    $a = 39;
    $b= 2;

    echo "<p> a= $a, b= $b </p>";

    ++$a; // Inkrement ist das Selbe wie $a + 1;

    echo "<p> a= $a, b= $b </p>";

    $erg = ++$a + $b;

    echo "<p>Das Ergebnis von $a + $b ist <b>$erg</b>. </p>";

    // Post-Inkrement

    $a = 39;
    $b= 2;

    $erg = $a++ + $b;

    echo "<p>Das Ergebnis von $a + $b ist <b>$erg</b>. </p>";


    /* === Abgekürzte Addition
    ============================================================================================= */

    $a= 10;
    $a += 5;//  entspricht $a = $a + 5;

    echo "<p>Das Ergebnis von a ist $a</b>. </p>";

    // Ist für alle arithmetischen Operationen möglich  $a -= 5, $a *=5; $a /=5;

    /* === Datentyp explizit konvertieren
    ============================================================================================= */


    $z1 = '25.8';
    $z2 = '17';
    $z3= (int)$z2;
    $z4= (double)$z1;

    $erg = $z3 + $z4;

    print('<p> Das Ergebnis ist ' . $erg . ' Ochsen </p>');


    $z1 = '25.8';
    $z2 = '17';
    $z5= (double)$z2;
    $z6= (int)$z1;

    $erg = $z5 + $z6;

    print('<p> Das Ergebnis ist ' . $erg . ' Ochsen </p>');









    ?>
</body>
</html>