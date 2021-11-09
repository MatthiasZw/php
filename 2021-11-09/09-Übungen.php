<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Übungen</title>
</head>
<body>
    <h1>Gitarrenlegende Eric Clapton</h1>


    <?php 
    
    echo "<p> Geboren am 30.03.1945 in Surrey, England </p> \n\t";

    echo "<p> Spitzname: Slowhand / englischer Blues- und Rock Gitarrist </p>\n\t";

    echo "<p> Gilt als einer der \"besten und bedeutendsten\" Gitarristen </p>\n\t";

    print "Eine Liste der faszinierenden Lieder wird zu lang...\n\t";

    echo "<p> <b> Filmauftritte: u.a. \"Blues Brothers 2000\", Rockoper \"Tommy\".<b> </p>\n\t"
    
    
    ?>


    <h2>Möbel</h2>

    <?php 
    
    define( 'MWST', 0.19);
    define('EU', '&euro;');
    

    $bez_tisch= 'Schreibtisch';
    $bez_stuhl= 'Bürostuhl';
    $bez_lampe= 'Lampe';
    $bez_pctisch= 'Computertisch';

    (float)$pr_tisch = 1999.00;
    (float)$pr_stuhl = 589.00;
    (float)$pr_lampe = 29.00;
    (float)$pr_pctisch = 999.00;

    (float)$netto = $pr_tisch + $pr_stuhl + $pr_lampe + $pr_pctisch;
    (float)$brutto = $netto -($netto * MWST);

    echo "<p> Der Gesammtpreis lautet <b> $netto <b>" . EU . "</p>";
    echo "<p> Der Brutto Preis lautet <b> $brutto <b>" . EU . "</p>";

    $brutto_tisch = $pr_tisch + ($pr_tisch * MWST);
    $brutto_stuhl = $pr_stuhl + ($pr_stuhl * MWST);
    $brutto_lampe = $pr_lampe + ($pr_lampe * MWST);
    $brutto_pctisch = $pr_pctisch + ($pr_pctisch * MWST);

    echo "<p> Der Bruttopreis von $bez_tisch lautet $brutto_tisch" . EU . ".</p>";
    echo "<p> Der Bruttopreis von $bez_stuhl lautet $brutto_stuhl " . EU . ".</p>";
    echo "<p> Der Bruttopreis von $bez_lampe lautet $brutto_lampe " . EU . ".</p>";
    echo "<p> Der Bruttopreis von $bez_pctisch lautet $brutto_pctisch " . EU . ".</p>"

    ?>   

    <h2>Switch</h2>

    <?php 
    
    $punkte = 4;

    switch ($punkte) {
        case 10:
            echo "<p> Sehr gut.</p>";
            break;
        case 9:
            echo "<p> Gut.</p>";
            break;    
        case 8:
            echo "<p> Befriedigend.</p>";
            break;
        case 7:
            echo "<p> Ausreichend.</p>";
            break; 
        case 6:
        case 5:
        case 4:            
        case 3:
        case 2:
        case 1:
        case 0:
            echo "<p> Leider zu wenige Punkte erreicht.</p>"  ;
            break;             
        default:
        echo "<p> Keine Bewertung möglich</p>" ;
            break;
    }
    
    for ($punkte=10; $punkte >=0; $punkte--){

        switch ($punkte) {
            case 10:
                echo "<p> 10 Punkte ergeben folgende Bewertung: Sehr gut.</p>";
                break;
            case 9:
                echo "<p> 9 Punkte ergeben folgende Bewertung: Gut.</p>";
                break;    
            case 8:
                echo "<p> 8 Punkte ergeben folgende Bewertung: Befriedigend.</p>";
                break;
            case 7:
                echo "<p> 7 Punkte ergeben folgende Bewertung: Ausreichend.</p>";
                break; 
            case 6:
                echo "<p> 6 Punkte ergeben folgende Bewertung: Leider zu wenige Punkte erreicht.</p>";
                break;
            case 5:
                echo "<p> 5 Punkte ergeben folgende Bewertung: Leider zu wenige Punkte erreicht.</p>";
                break;
            case 4:   
                echo "<p> 4 Punkte ergeben folgende Bewertung: Leider zu wenige Punkte erreicht.</p>";
                break;         
            case 3:
                echo "<p> 3 Punkte ergeben folgende Bewertung: Leider zu wenige Punkte erreicht.</p>";
                break;
            case 2:
                echo "<p> 2 Punkte ergeben folgende Bewertung: Leider zu wenige Punkte erreicht.</p>";
                break;
            case 1:
                echo "<p> 1 Punkte ergeben folgende Bewertung: Leider zu wenige Punkte erreicht.</p>";
                break;
            case 0:
                echo "<p> 0 Punkte ergeben folgende Bewertung: Leider zu wenige Punkte erreicht.</p>"  ;
                break;             
            default:
            echo "<p> Keine Bewertung möglich</p>" ;
                break;
        }
        
    }
    

    ?>

    <h2>WeilSchleifen</h2>

    <?php 
     $z= 1; 
     $x = 1;
 
     while($z <= 5){
         echo "<p>While $z<br></p>";
         $z++;
     }

      
    do {
        echo "<p>DO-While $x<br></p>";
        $x++;
    } while ($x <= 5);

    
    ?>
</body>
</html>