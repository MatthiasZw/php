<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Funktionsübungen</title>
</head>
<body>
    <h1>Funktionsübungen</h1>

    <?php  
    function addiere($a, $b, $c=0){
        $erg= $a + $b+ $c;
        echo "$a plus $b plus $c ergibt $erg <br>";
    }

    function multipliziere($a, $b, $c=1){
        $erg= $a * $b * $c;
        echo "$a mal $b mal $c ergibt $erg";
    }

    addiere(3, 4,);

    multipliziere(3, 4);
    
    
    
    
    
    
    
    ?>
</body>
</html>