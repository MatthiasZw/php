<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Die Auswertung</title>
</head>
<body>
    <h1>Die Auswertung</h1>

    <?php 

    // isset() bedeutet soviel wie: ist vorhanden
    if(isset($_POST['senden'])){
        //Hier die Formular-Auswertung vornehmen 

            // Prüfe ob die bereinigte (trim) Adresse leer ist (empty).

            if(empty( trim($_POST['email']))){
                echo '<p>Mail ist leer</p>';
            }else{
                echo '<p>Mail-Adresse: ' . $_POST ['email'] . '</p>';
            }

         echo '<p> Ihre Nachricht: <br>' . nl2br($_POST['memo'], false) . '</p>';   //newline2break
            
         echo '<pre>', print_r( $_POST ), '</pre>';
    }else{
        echo '<p> Diese Seite wurde nicht durch das Formular aufgerufen. Bitte fülle zunächst das 
        <a href="06-form-elemente.html "> Formular </a> aus! </p>';
    }
    
  
    
    ?>

</body>
</html>