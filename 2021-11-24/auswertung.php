<?php
require_once( '../includes/functions.inc.php' );
$database = 'hardware';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Anzeige Festplatten-Auswahl',
    NULL,
    true
);
get_header( ...$args );



if($_POST['rad']==1){

    if(isset($_POST['chck'])){
    $sql = 'SELECT 
            hersteller,
            typ,
            preis

        FROM fp
        where 
        preis <= 120
        ORDER BY preis desc';

    }else{ $sql = 'SELECT 
        hersteller,
        typ,
        preis

    FROM fp
    where 
    preis <= 120';
    }


    

    $result= mysqli_query($db, $sql);

        if (false === $result){
            echo '<p>Fehler</p>';
        }else{
            $zahl = mysqli_affected_rows($db);
            

            
            while ($row = mysqli_fetch_assoc($result)){

                

                echo $row['hersteller'] . ', ' . $row['typ'] . ', ' . $row['preis'] . '<br>';

            }
        }


}elseif($_POST['rad']==2){
    if(isset($_POST['chck'])){
        $sql = 'SELECT 
                hersteller,
                typ,
                preis
    
            FROM fp
            where 
            preis > 120 AND preis <=140
            ORDER BY preis desc';
    
        }else{ $sql = 'SELECT 
            hersteller,
            typ,
            preis
    
        FROM fp
        where 
        preis > 120 AND preis <=140';
        }

    $result= mysqli_query($db, $sql);

        if (false === $result){
            echo '<p>Fehler</p>';
        }else{
            $zahl = mysqli_affected_rows($db);
            

            
            while ($row = mysqli_fetch_assoc($result)){

                

                echo $row['hersteller'] . ', ' . $row['typ'] . ', ' . $row['preis'] . '<br>';

            }
        }
}elseif($_POST['rad']==3){
    if(isset($_POST['chck'])){
        $sql = 'SELECT 
                hersteller,
                typ,
                preis
    
            FROM fp
            where 
            preis > 140
            ORDER BY preis desc';
    
        }else{ $sql = 'SELECT 
            hersteller,
            typ,
            preis
    
        FROM fp
        where 
        preis > 140';
        }

    $result= mysqli_query($db, $sql);

        if (false === $result){
            echo '<p>Fehler</p>';
        }else{
            $zahl = mysqli_affected_rows($db);
            

            
            while ($row = mysqli_fetch_assoc($result)){

                

                echo $row['hersteller'] . ', ' . $row['typ'] . ', ' . $row['preis'] . '<br>';

            }
        }

    }

?>


    
<?php get_footer(); ?>