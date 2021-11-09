<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fehlermeldungen</title>
</head>
<body>
        <h1>Fehlermeldungen</h1>

        <?php 
        

            error_reporting(E_ALL);

            echo "<p>Der Wert der Variablen i ist: $i</p>";


            echo 4/0;
                                                    // ab fatal error wird nichts mehr ausgegeben, bei parse error wird nichts ausgegeben
            echo '<p>Weitere Meldungen etc.</p>';
        
        
        
        
        
        
        
        
        
        ?>
</body>
</html>