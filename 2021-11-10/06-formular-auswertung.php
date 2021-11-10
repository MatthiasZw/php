<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formular Auswertung</title>
</head>
<body>
    <h1>Formular-Auswertung</h1>
    <p>Folgende Daten wurden übermittelt:</p>

    <?php 
    
        echo '<p> Vorname :' . $_POST['vorname'] . '<br>';
        echo '<p> Nachname :' . $_POST['nachname'] . '<br>';
        echo '<p> E-Mail :' . $_POST['email'] . '</p>';

        // Formulardaten zu Testzwecken ausgeben lassen

        echo '<pre>', print_r($_POST), '</p>';
    
    ?>
</body>
</html>