<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Uebungen</title>
</head>
<body>
    <h1>Uebungen Montag</h1>

    <?php 
    
    echo '<h2> Hans Maulwurf </h2>';
    echo '<p> Evergreen Terrace 2 <br> 893892 Springfield <br> Tel.: 12432523452</p>';

    ?>

<h1>Aufgabe 2</h1>

<?php 

$hans = 'Hans Maulwurf';
$street = 'Evergreen Terrace 2 ';
$city = '893892 Springfield ';
$tel= '12432523452 ';


echo "<h2> $hans </h2>";
echo "<p> $street <br> $city <br>Tel.: $tel </p>";

?>

<h2>Math</h2>
<form action="<?php echo $_SERVER['PHP_SELF'] ?>">  <!-- empfohlene Methode für Selbstaufruf --> 

<p>Erste Zahl: <input type="number" name="zahl1" value="<?php echo $zahl1; ?>"></p>
<p>Zweite Zahl: <input type="number" name="zahl2" value="<?php echo $zahl2; ?>"></p>

<p>
    <input type="submit" value="+" name="plus">
    <input type="submit" value="x" name="mal">
</p>



</form>
<?php 
 $zahl1='';
 $zahl2='';    

 if(isset($_GET['plus'] ) OR isset($_GET['mal'])){ 

 $zahl1 = $_GET['zahl1'];
 $zahl2 = $_GET['zahl2'];    

 $erg = 0;

 //echo '<pre>', var_dump( $_GET ), '</pre>';

 if(isset($_GET['plus'])){
     $erg = (float)$_GET['zahl1'] +(float)$_GET['zahl2'];
 }else{
     $erg = (float)$_GET['zahl1'] * (float)$_GET['zahl2'];
 }

 echo "<p>$erg (". gettype($erg). ")</p>";

 }
?>


<h2>Kreis</h2>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>">  <!-- empfohlene Methode für Selbstaufruf --> 

<p>Kreisradius: <input type="number" name="rad" value="<?php echo $rad; ?>"></p>
</p>

<p>
    <input type="submit" value="Berechnen" name="radi">
    
</p>



</form>
<?php 
$rad= '';

if(isset($_GET['radi'])){
    $fla = (float)$_GET['rad'] * (float)$_GET['rad'] * 3.1415 ;
    $umf = (float)$_GET['rad'] *2*3.1415;

    echo " Die Fläche beträgt $fla, der Umfang $umf .";
}
?>
 <h2>KGV</h2>
 
 <form action="<?php echo $_SERVER['PHP_SELF'] ?>">  <!-- empfohlene Methode für Selbstaufruf --> 

<p>Erste Zahl: <input type="number" name="gaz1" value="<?php echo $zahl1; ?>"></p>
<p>Zweite Zahl: <input type="number" name="gaz2" value="<?php echo $zahl2; ?>"></p>

<p>
    <input type="submit" value="Berechnen" name="kgv">
    
</p>

</form>

<?php 

$gaz1= '';
$gaz2='';


if(isset($_GET['gaz1'])){

    if ((int)$_GET['gaz1'] > (int)$_GET['gaz2']){


        for($i=1; $i<=(int)$_GET['gaz1'] * (int)$_GET['gaz2'] ; $i++){

            if(((int)$_GET['gaz1'] * $i) % (int)$_GET['gaz2'] == 0){

            echo " Das KGV beträgt". (int)$_GET['gaz1'] *$i ;
            
        }
    }


    }





   

    
}



?>



</body>
</html>