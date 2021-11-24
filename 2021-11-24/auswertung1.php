<?php
require_once( '../includes/functions.inc.php' );
$database = 'hardware';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Anzeige Firma Tabelle',
    NULL,
    true
);
get_header( ...$args );
?>

<?php 


if($_POST['Firma']== "IBM"){

    $sql = 'SELECT 
    hersteller,
    typ,
    gb,
    preis,
    artnummer,
    prod

 FROM fp WHERE hersteller = "IBM Corporation"';

}elseif($_POST['Firma']== "Seagate"){

    $sql = 'SELECT 
    hersteller,
    typ,
    gb,
    preis,
    artnummer,
    prod

 FROM fp WHERE hersteller = "Seagate"';
}elseif($_POST['Firma']== "Quantum"){

    $sql = 'SELECT 
    hersteller,
    typ,
    gb,
    preis,
    artnummer,
    prod

 FROM fp WHERE hersteller = "Quantum"';
}elseif($_POST['Firma']== "Fujitsu"){

    $sql = 'SELECT 
    hersteller,
    typ,
    gb,
    preis,
    artnummer,
    prod

 FROM fp WHERE hersteller = "Fujitsu"';
}

$result = mysqli_query($db, $sql);
if (false === $result) {


    echo get_db_error($db, $sql);

    }else{ ?>

            <table class="table">
                <tr>
                    <th>Hersteller</th>
                    <th>Typ</th>   
                    <th>GB</th>
                    <th>Preis</th>
                    <th>Artn</th>
                    <th>Datum</th>
                </tr>

                <?php while ($row = mysqli_fetch_assoc($result)): ?>

            <tr>

                    <td><?php echo $row['hersteller'];?></td>
                    <td><?php echo $row['typ'];?></td>
                    <td><?php echo $row['gb'];?></td>
                    <td><?php echo $row['preis'];?></td>
                    <td><?php echo $row['artnummer'];?></td>
                    <td><?php echo $row['prod'];?></td>

            </tr>

            <?php endwhile ?>

            </table>

    <?php 
    }

?>




    
<?php get_footer(); ?>