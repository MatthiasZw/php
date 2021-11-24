<?php
require_once( '../includes/functions.inc.php' );
$database = 'hardware';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Uebung Hardware 2',
    NULL,
    true
);
get_header( ...$args );

$sql = 'SELECT 
    hersteller,
    typ,
    gb,
    preis,
    artnummer,
    prod

 FROM fp';

$result= mysqli_query($db, $sql);

if (false === $result){
    echo '<p>Fehler</p>';
}else{
    $zahl = mysqli_affected_rows($db);
    echo "<p>$zahl Datensätze gefunden</p>";


    while ($row = mysqli_fetch_assoc($result)){

        

        echo $row['hersteller'] . ', ' . $row['typ'] . ', ' . $row['gb'] . ', ' . $row['preis'] . ', ' . $row['artnummer'] . ', ' . $row['prod'] . '<br>';

    }
}
?>

<p>
    <h2>Uebung 2b</h2>
</p>

<?php 

$sql = 'SELECT 
    hersteller,
    typ,
    gb,
    preis,
    artnummer,
    prod

 FROM fp
 where 
 gb > 60 and preis < 150
 ORDER BY gb desc';

$result= mysqli_query($db, $sql);

if (false === $result){
    echo '<p>Fehler</p>';
}else{
    $zahl = mysqli_affected_rows($db);
    echo "<p>$zahl Datensätze gefunden</p>";

    
    while ($row = mysqli_fetch_assoc($result)){

        

        echo $row['hersteller'] . ', ' . $row['typ'] . ', ' . $row['gb'] . ', ' . $row['preis'] . ', ' . $row['artnummer'] . ', ' . $row['prod'] . '<br>';

    }
}


?>


<p>
    <h2>Uebung 2c</h2>
</p>

<?php 

$sql = 'SELECT 
    hersteller,
    typ,
    artnummer,
    prod

 FROM fp
 where 
 prod between "2008.01.01" and "2008.07.31" 
 ORDER BY prod';

$result= mysqli_query($db, $sql);

if (false === $result){
    echo '<p>Fehler</p>';
}else{
    $zahl = mysqli_affected_rows($db);
    echo "<p>$zahl Datensätze gefunden</p>";

    
    while ($row = mysqli_fetch_assoc($result)){

        

        echo $row['hersteller'] . ', ' . $row['typ']  . ', ' . $row['artnummer'] . ', ' . $row['prod'] . '<br>';

    }
}


?>

<p>
    <h2>Uebung 3</h2>
</p>

<p>Anzeigen der Festplatten aus der gewählten Preisgruppe</p>

<form action="auswertung.php" method="post">
    
    <p>
        <input type="radio" name="rad" value="1" checked> bis 120 € einschl.<br>
        <input type="radio" name="rad" value="2"> ab 120 € ausschl. bis 140 einschl.<br>
        <input type="radio" name="rad" value="3" > ab 140 € ausschl.<br>
    </p>

    <p><input type="checkbox" name="chck" value="1" checked>
    Ausgabe nach Preis (absteigend) sortiert</p> <br>

    <p><button type="submit" >Daten absenden</button> <button type="reset">Zurücksetzen</button></p>
</form>

<p>
    <h2>Uebung 4</h2>
</p>


<p>Anzeigen der Festplatten des ausgewählten Herstellers</p>

<form action="auswertung1.php" method="post">


<p>
<select name="Firma" >
  <option value="IBM">IBM</option>
  <option value="Seagate">Seagate</option>
  <option value="Quantum">Quantum</option>
  <option value="Fujitsu">Fujitsu</option>
</select>
</p>


<p><button type="submit">Daten absenden</button> <button type="reset">Zurücksetzen</button></p>



</form>


<?php get_footer(true, true); ?>