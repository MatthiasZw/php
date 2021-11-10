<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assoziative Arrays</title>
</head>
<body>

    <h1>Assoziative Arrays</h1>

<?php 

    $hauptstaedte = array(
        'Schweiz' => 'Bern',
        'Frankreich' => 'Paris',
        'Spanien' => 'Madrid'
    );

    echo "<p>{$hauptstaedte['Frankreich']}</p>";

    //Hinzufügen

    $hauptstaedte['Polen'] = 'Varchar';

    echo '<pre>', var_dump( $hauptstaedte ), '</pre>';
    
    echo '<pre>', print_r( $hauptstaedte ), '</pre>';

    // Löschen mit unset()

    unset($hauptstaedte['Spanien']);

    echo '<pre>', print_r( $hauptstaedte ), '</pre>';    
?>

<table style="border: 1px solid gray;">
    <tr>
        <th>Land</th>
        <th>Hauptstadt</th>
    </tr>

    <?php 
    
        // Syntax foreach(array as key => value)

        foreach($hauptstaedte as $land =>$stadt){

            echo '<tr>';

            echo "<td>$land</td>";
            echo "<td>$stadt</td>";

            echo '</tr>';

        }

    ?>

</table>


</body>
</html>