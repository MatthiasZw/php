<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Array-Übungen</title>
</head>
<body>
        <h1>Array-Übungen</h1>
    <?php  
        $kennz = array(
        'HH' => 'Hamburg',
        'B' => 'Berlin',
        'S' => 'Stuttgart'
    );

    $kennz['F']='Frankfurt';
    $kennz['HB']='Bremen';

    unset($kennz['Bremen']);
    $kennz['F']='Frankfurt am Main';

    echo '<pre>', var_dump( $kennz ), '</pre>';
?>
<h2>eindimensional</h2>
<table border="1">
    <th>Kennzeichen</th>
    <th>Stadt</th>
    
<?php  
    foreach($kennz as $info => $stadt){

        echo '<tr>';

            echo "<td style='text-align: center'> $info </td>";
            echo "<td style='text-align: center'> $stadt </td>";
        echo '</tr>';

    }
?>
    </table>

    

    <?php 
    
        $mehr = array(
            array(
                '09:30 Uhr',
                'Diskuswurf',
                'Nebenschauplatz',
                'Jugendmeisterschaften' 

            ),
            array(
                '10:30 Uhr',
                '5-km-Lauf',
                'Stadion-Laufbahn',
                'Offener Lauf'

            ),
            array(
                '11:00 Uhr',
                'Halbmarathon',
                'Waldgebiet',
                'Teilnahme ab 18 Jahren'

            ),
            array(
                '12:00 Uhr',
                'Stabhochsprung',
                'Stadion - Stabhochsprunganlage',
                'Damen'

            )
            );
    
                echo '<pre>', var_dump( $mehr ), '</pre>';
                
    ?>
    
    <h2>mehrdimensional</h2>

    <table border="1">
        <tr>    
            <th>Beginn</th>
            <th>Disziplin</th>
            <th>Ort</th>
            <th>Bemerkung</th>
        </tr>   
            <?php foreach($mehr as $row ): ?>

        <tr>
                 <?php foreach($row as $zeil): ?>   

                    <td><?php echo $zeil; ?></td>
                
                <?php endforeach; ?>    

        </tr>

            <?php endforeach; ?> 

    </table>

</body>
</html>