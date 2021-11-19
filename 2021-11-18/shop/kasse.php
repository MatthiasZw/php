<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    "Royal Sweets",null,true,'Royal Sweets - Abschliessen Ihrer Bestellung',[' <img src="rs-logo-109x56.png" alt="logo">Royal Sweets',['Start'=>'index.php','Schokolade'=>'schokolade.php','Pralinen'=>'pralinen.php','Warenkorb'=>'warenkorb.php']]
);
include 'artikel.php';
get_header( ...$args );

if(isset($_POST['absenden'])):
    
$vname = $_POST['vname'];
$nname = $_POST['nname'];
$strasse = $_POST['strasse'];
$ort = $_POST['ort'];
echo '<p>';
echo"Vielen Dank, $vname $nname, fuer ihre Bestellung<br>";
echo"Wir senden Ihre bestellten Artikel and folgende Adresse:<br>$strasse<br>$ort";
echo '</p>';
//CSV ERZEUGEN
//Ueberschrift in der csv datei
$bestellung = "Art-NR.;Artikel;Menge\r\n";
//bestellte artikel fuer die csv datei uebernehmen
foreach ($_SESSION as $artnr => $menge) {
    $bestellung.= str_starts_with($artnr,'s')?"$artnr;".$array_schokolade[$artnr].";"."$menge\r\n":''; 
    $bestellung.= str_starts_with($artnr,'p')?"$artnr;".$array_pralinen[$artnr].";"."$menge\r\n":'';
}
//adresse in die csv datei aufnehmen
$bestellung.= "\r\nbestelltvon:\r\n$vname;$nname;$strasse;$ort\r\n\r\n";
//csv detei erstellen und /oder bestellung hinzufuegen
if(file_put_contents('bestellung.csv',$bestellung,FILE_APPEND)){
    echo '<p class="alert alert-success">';
    echo'Die Bestelldaten wurden uebermittelt.';
    echo '</p>';
    //session zerstoeren
    $_SESSION = [];
    session_destroy();
}else{
    echo '<p class="alert alert-danger">';
    echo'Die Bestelldaten konnten nicht uebermittelt werden.<br>Bitte versuchen Sie es noch einmal';
    echo '</p>';
}

else:
?>
 <table class="table table-hover">
    <tr class="table-primary">
        <th>Artikel Nummer</th>
        <th>Bezeichnung</th>
        <th>Menge</th>
    </tr>
    <?php foreach ($_SESSION as $key => $value): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td>
                <?php
                 echo str_starts_with($key,'s')?$array_schokolade[$key]:''; 
                 echo str_starts_with($key,'p')?$array_pralinen[$key]:''; 
                 ?>
            </td>
            <td><?php echo $value; ?></td>
        </tr>
    <?php endforeach; ?>
</table>  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    
    <div class="form-group">
        <label for="vname" class="form-label">Vorname</label>
        <input type="text" name="vname" id="vname" class="form-control">
    </div>
    <div class="form-group">
        <label for="nname" class="form-label">Nachname</label>
        <input type="text" name="nname" id="nname" class="form-control">
    </div>
    <div class="form-group">
        <label for="strasse" class="form-label">Strasse</label>
        <input type="text" name="strasse" id="strasse" class="form-control">
    </div>
    <div class="form-group">
        <label for="ort" class="form-label">PLZ Ort</label>
        <input type="text" name="ort" id="ort" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary" name="absenden">Absenden und Bestellung abschliessen</button>
</form>
<?php endif; ?>
<?php get_footer(true, true); ?>