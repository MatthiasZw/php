<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerbung, Newsletter oder Infomaterial</title>
</head>
<body>
    <h1>Bewerbung, Newsletter oder Infomaterial</h1>


Bitte nennen Sie uns Ihr Anliegen:

<?php 
$vorn = '';
$nachn = '';
$email = '';
$anr1 = '';
$anr2= '';


if (isset($_GET['bew']) OR isset($_GET['news']) OR isset($_GET['inf']) ){
$vorn= $_GET['vorn'];
$nachn= $_GET['nachn'];
$email= $_GET['email'];
$anr =$_GET['anr'];

if ($anr =='Frau'){
    $anr2 = 'checked';
}else{$anr1= 'checked';}


}
?>

<form action="<?php echo $_SERVER['PHP_SELF'] ?>">
    
            <p>
            Anrede:  Herr <input type=radio name="anr" value="Herr" <?php echo $anr1; ?>></input> 
            Frau <input type=radio name="anr" value="Frau" <?php echo $anr2; ?>></input> <br>  

            Vorname:<input type="text" name="vorn" value="<?php echo $vorn; ?>"> <br>
            Nachname:<input type="text" name="nachn" value="<?php echo $nachn; ?>"><br>
            Mailadresse: <input type="text" name="email" value="<?php echo $email; ?>"><br>
            </p>
    
            <input type="submit" value="bei Ihnen bewerben" name="bew" >
            <input type="submit" value="Newsletter abonieren" name="news">
            <input type="submit" value="Infomaterial anfordern" name="inf">
</form>


<!-- Fehlt Abfrage ob Felder gefüllt sind. String zusammenbauen mit $blabla .= würde auch gehen -->

<?php 

echo '<p>';
echo  'Herzlichen Dank, <b>', $_GET['anr'], ' ',  $_GET['nachn'], '</b>, für Ihre ';

if(isset($_GET['bew'])) {
    echo 'Bewerbungsanfrage.';
}elseif(isset($_GET['news'])){
    echo 'NewsletterAbonierungsAnfrage.';
}elseif(isset($_GET['inf'])){
    echo 'Informierungsanfrage.';
}

echo 'Unsere Personalabteilung wird per E-Mail - an Ihre Adresse  <b>', $_GET['email'], '</b> Kontakt zu Ihnen aufnehmen.';

echo '</p>';
echo '<pre>', var_dump( $_GET ), '</pre>';

?>

</body>
</html>