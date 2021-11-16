<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suchdings</title>
</head>
<body>
<h1>Begriff in einer Textpassage suchen</h1>

    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
    Originaltext:    <textarea name="text1" id="" cols="30" rows="10" value="terxt"></textarea>
         <p>Suche nach:<input type="text" name="such"></p>

        <p><input type="submit" value="Suchen" name="senden"></p>

    </form>


    <?php 
    
    if (isset($_POST['senden'])){

        $org= $_POST['text1'];
        $such = $_POST['such'];

        echo '<pre>', var_dump( $org ), '</pre>';
        echo '<pre>', var_dump( $such ), '</pre>';

        echo "<p>Die Suche ($such) kommt in <b>" . $org . '</b> genau <b>' . substr_count($org, $such) . '-mal</b> vor.</p>';


    }
    
    ?>

    
</body>
</html>