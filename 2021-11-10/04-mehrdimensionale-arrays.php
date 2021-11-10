<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mehrdimensiionale Arrays</title>
</head>
<body>
        <h1>Mehrdimensionale Arrays</h1>

        <h2>Mehrdimensiionale indizierte arrays</h2>
        
        
        <?php 
        
            $personen = array(
                array(
                    'Manfred',
                    'deutsch',
                    53,
                    'männlich'
                ),
                array(
                    'Hans',
                    'italienisch',
                    49,
                    'männlich'
                ),
                array(
                    'Ute',
                    'polnisch',
                    39,
                    'weiblich'
                )
            );
       
            //Zugriff

            echo'<p>' . $personen[2][0] . ' ist ' . $personen[2][2] . ' Jahre alt, spricht ' . $personen[2][1] . ' und ist ' . $personen[2][3] . '</p>';

        
            // Ändern

            $personen[2][2] = 41;

            
            // Hinzufügen

            $personen[] = array(
                'Ursula',
                'dänisch',
                34,
                'weiblich gelesen'
            );

            $personen[4][0] = ' Johanna';
            $personen[4][1] = ' bayerisch';
            $personen[4][2] = ' 38';
            $personen[4][3] = ' divers';
            
            echo '<pre>', var_dump( $personen ), '</pre>';
        ?>

<table border= "1">
    <tr>
        <th>Name</th>
        <th>Sprache</th>
        <th>Alter</th>
        <th>Geschlecht</th>
    </tr>

            <!--  Schleife für das äußere Array (Zeilen) -->
            <?php foreach($personen as $person): ?>

        <tr>

                <!-- Schleife für inneres Array (Spalten)-->
                <?php  foreach($person as $info): ?>
            
                    <td><?php echo $info; ?></td>
                 
                <?php endforeach; ?>

        </tr>

         <?php endforeach; ?>       

</table>

<h2>Ausgabe der Personen mit der list()- Funktion</h2>

<table border= "1">
    <tr>
        <th>Name</th>
        <th>Geschlecht</th>
        <th>Sprache</th>
        <th>Alter</th>
    </tr>

     <!-- Schleife für das äußere Array (Zeilen) -->
     
     <?php foreach($personen as $person): ?>

        <tr>
        <!-- list() für das innere Array (Spalten) -->
        
            <?php list($pname, $sprache, $alter, $geschlecht) = $person; ?>

            <td><?php echo $pname; ?></td>
            <td><?php echo $geschlecht; ?></td>
            <td><?php echo $sprache; ?></td>
            <td><?php echo $alter; ?></td>
        </tr>


     <?php endforeach; ?>   

</table>

<h2>mehrdimensionale assoziative Arrays</h2>

<?php 

$laender = array(
    'Spanien' => array(
        'Hauptstadt' => 'Madrid',
        'Sprache' => 'spanisch',
        'Waehrung' => 'Euro',
        'Flaeche' => '504.645 qkm'
    ),
    'England' => array(
        'Hauptstadt' => 'Londinium',
        'Sprache' => 'keltisch',
        'Waehrung' => 'quadratunzen',
        'Flaeche' => '130.395 qkm'

    ),
    'Portugal' => array(
        'Hauptstadt' => 'Lisbon',
        'Sprache' => 'portugiesisch',
        'Waehrung' => 'Euro',
        'Flaeche' => '92.345 qkm'

    )

);

// Zugriff

$land = 'England';

echo '<p>Angaben zu ' . $land . '<br>';
echo 'Hauptstadt: ' . $laender[$land]['Hauptstadt'] . '<br>'; 
echo 'Fläche: ' . $laender[$land]['Flaeche'] . '<br>';
echo 'Sprache: ' . $laender[$land]['Sprache'] . '<br>';
echo 'Währung: ' . $laender[$land]['Waehrung'] . '</p>';

?>

<table border= "1">
    <tr>
        <th>Land</th>
        <th>Hauptstadt</th>
        <th>Sprache</th>
        <th>Währung</th>
        <th>Fläche</th>
    </tr>

    <?php foreach($laender as $land => $infos): ?>

        <tr> 

            <td><?php echo $land; ?></td>
            
            <?php foreach($infos as $info): ?>

                <td><?php echo $info; ?></td>

            <?php endforeach; ?>
        </tr>

     <?php endforeach ?>   

</table>



</body>
</html>