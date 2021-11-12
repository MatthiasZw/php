<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kugel</title>
</head>
<body>
    <h1>Kugelrechner</h1>


    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

<p>Durchmesser: <input type="text" name="zahl1"><br>
Material: <select name="mat">
                <option></option>
                <option value="Holz">Holz</option>
                <option value="Styropor">Styropor</option>
                <option value="Glas">Glas</option>
                <option value="Metall">Metall</option>
            </select>

</p>

    <input type="submit" value="Absenden" name="senden">


    <?php 
    
   


    function kugel($durch, $mat){
       
        $durch = $durch/100;

         $vol= 4/3 * ($durch/2)*($durch/2)*($durch/2)*3.1415;
        
         switch($mat){
            case('Holz'):
                $pr= 100*$vol*1.19;
                break;
            case('Styropor'):
                $pr= 20*$vol*1.19;
                break;
            case('Glas'):
                $pr= 250*$vol*1.19;
                break;    
            case('Metall'):
                $pr= 175*$vol*1.19;
                break;  
            default:
            echo "<p> Fehlermeldung </p>";      
        }
            return $pr;
    }



    if(empty($_POST['zahl1'])){

        echo "<p>Bitte Werte eingeben und auf 'Absenden' klicken</p>";

    }else{

    echo "<p>Der Endpreis für " . $_POST['zahl1'] . " cm ". $_POST['mat'] ." beträgt ", round(kugel((float)$_POST['zahl1'], $_POST['mat']),2), " Euro.</p>";
    
    }
    ?>



</body>
</html>