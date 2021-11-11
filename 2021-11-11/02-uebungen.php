<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Auswertung</title>
</head>
<body>

<h1>Auswertung des Formulars</h1>

<?php 




            echo 'Vorname: ', $_POST['vorn'], '<br>';
            echo 'Nachname: ', $_POST['nachn'], '<br>';
            echo 'Ort: ', $_POST['wohn'], '<br>';
            echo 'Wohnung: ', $_POST['haus'], '<br>';
            echo 'Beliebte TV-Sendungen: ';
            foreach ($_POST['TV'] as $send){
            echo $send, ' ';
            }
            echo '<br>';

            if (empty($_POST['nachricht'])){
                 echo 'Nachricht: keine';
       
            }else {
                 echo 'Nachricht: ', $_POST['nachricht'];
            }
?>
    
</body>
</html>