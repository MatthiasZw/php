<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kontrolle Verschachtelt</title>
</head>
<body>
    <h1>Kontrolle Verschachtelt</h1>


    <?php 
    
    $zw= ''; // Rechnung, Vorkasse, Sofortüberweisung
    
    if($zw == 'Rechnung'){
        echo '<p>Zahlung per Rechnung, <br> bitte überweisen Sie in 10 Tagen.</p>';
    }elseif ($zw == 'Vorkasse') {
        echo '<p>Zahlung per Vorkasse, <br> bitte überweisen Sie nichts.</p>';
    }elseif ($zw == 'Sofortüberweisung') {
        echo '<p>Zahlung per Sofort, <br> bitte überweisen Sie sofort nichts.</p>';
    }else {
        echo '<p>Zahlung per ELSE, <br> .</p>';
    }
    
    ?>

    <h2>Gepäck-Kategorie</h2>

    <?php 
    
    $g = 45;

    if ($g <= 20) {
        echo '<p>Kategorie S bis 20 KG.</p>';
    }else {
        if ($g <= 40){
            echo '<p>Kategorie M bis 40 KG.</p>';
        }else {
            if ($g <=60){
                echo '<p>Kategorie L bis 60 KG.</p>';
            }else{
                echo '<p>Kategorie XL über 60 KG.</p>';
            }
        }
    }

    ?>

</body>
</html>