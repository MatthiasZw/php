<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uebung Form</title>
</head>
<body>
    <h1>Uebung Form</h1>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

    <p>Zahl 1: <input type="text" name="zahl1"><br>
        Zahl 2: <input type="text" name="zahl2"><br>
        Zahl 3 (optional) : <input type="text" name="zahl3" value="0"></p>

        <input type="submit" value="Absenden" name="senden">


        
</form>

    <?php 
    
    if(empty($_Post['zahl1'])){

        echo "<p>Bitte Zahlen eingeben und auf 'Absenden' klicken</p>";

    }else{

    $a=$_POST['zahl1'];
    $b=$_POST['zahl2'];
    $c=$_POST['zahl3'];

    include '04-funktion.inc.php';

    $erg= addiere($a, $b, $c);

    echo "<p> Das Formular wurde abgesendet, das Ergbebnis der Addition (Zahlen $a, $b , $c) lautet $erg </p>";

    }
    ?>


</body>
</html>