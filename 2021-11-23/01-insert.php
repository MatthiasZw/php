<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Sichere INSERTS',
    NULL,
    true
);
get_header( ...$args );


    // Formular gesendet?

    if(!empty($_POST)){

        $gerte_name = mysqli_real_escape_string($db, $_POST['gerte_name']);
        $gerte_kateg_id_ref = mysqli_real_escape_string($db, $_POST['gerte_kateg_id_ref']);
        $gerte_beschreibung= mysqli_real_escape_string($db, $_POST['gerte_beschreibung']);

        $sql = "INSERT INTO `tbl_gerichte` (
            gerte_name, 
            gerte_beschreibung, 
            gerte_kateg_id_ref 
            )
            VALUES
            (
            '$gerte_name',
            '$gerte_beschreibung',
            $gerte_kateg_id_ref
            )";

        $result= mysqli_query($db, $sql) ;
        
        if(false=== $result){
            echo get_db_error($db, $sql);
        }else{
            echo '<p class="alert alert-success">';
            echo mysqli_affected_rows($db);
            echo ' Datensatz wurde hinzugefügt</p>';
        }

    }


?>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <h2>Neues Gericht anlegen</h2>

    <p>Name des Gerichts: <input type="text" name="gerte_name"> </p>

    <p>Beschreibung: <br>
        <textarea name="gerte_beschreibung"></textarea>
    </p>

    <p>

        Kategorie:<br>
        <select name="gerte_kateg_id_ref">

            <?php 
            
                $sql = "SELECT `kateg_id`, `kateg_name` FROM `tbl_kategorien`";
                $result = mysqli_query($db, $sql);

                if(false===$result){
                    echo get_db_error($db, $sql);
                }else{
                    while ($row = mysqli_fetch_assoc( $result)): ?>
                    
                        <option value="<?php echo $row['kateg_id']; ?>"><?php echo $row['kateg_name']; ?></option>

                    <?php endwhile;
                }
            
            ?>

        </select>

    </p>

    <p>

        <button type="submit">Speichern</button>

    </p>
    


</form>
<?php get_footer(); ?>