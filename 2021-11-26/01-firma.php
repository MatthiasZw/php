<?php
require_once( '../includes/functions.inc.php' );
$database = 'firma';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Mitarbeiterdatenbank',
    array(
        'css/firma.css',
        'https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css'),
        true,
        '<i class="bi bi-person-fill"></i> Mitarbeiterdatenbank'

);
get_header( ...$args );

    // Aktionen ausführen

    if(! empty($_POST)){
       

        if($_POST['action']  === 'insert'){
          $nachname = $_POST['na'][0];
          $vorname = $_POST['vo'][0];
          $gehalt = $_POST['gh'][0];
          $geburtstag = $_POST['gb'][0];

           //echo '<pre>', var_dump( $_POST ), '</pre>';

            $sql= "INSERT INTO tbl_personen (
                perso_nachname,
                perso_vorname,
                perso_gehalt,
                perso_geburtstag)
                VALUES (
                    '$nachname',
                    '$vorname',
                    $gehalt,
                    '$geburtstag'
                )";        

        }else if($_POST['action'] === 'update'){

            // Ändern 
            $tausch= array('.' => '', ',' =>'.');

            $id = $_POST['id'];
            $nachname = $_POST['na'][$id];
            $vorname = $_POST['vo'][$id];
            $gehalt = strtr($_POST['gh'][$id], $tausch);
            $geburtstag = $_POST['gb'][$id];
            
            $sql = "UPDATE tbl_personen
            SET
            perso_nachname = '$nachname',
            perso_vorname = '$vorname',
            perso_gehalt = $gehalt,
            perso_geburtstag = '$geburtstag'
            WHERE
            perso_id = $id";

            //echo '<pre>', var_dump( $sql ), '</pre>';

        }else if($_POST['action'] === 'delete'){

            $sql = "DELETE FROM tbl_personen WHERE perso_id = {$_POST['id']}";

        }

        $actionresult = mysqli_query($db, $sql);

    }

    $sql = 'SELECT * FROM `tbl_personen`';

    $result = mysqli_query($db, $sql);
    
    if($result or $actionresult):
?>

        <script>

            function send(action, id){

                if(action === 0){

                    document.form.action.value= 'insert';


                }else if(action === 1){
                    
                    document.form.action.value= 'update';

                } else if(action === 2){

                    if(confirm('Den Mitarbeiter mit der Personalnummer' + id + ' wirklich löschen?')){
                        document.form.action.value= 'delete';
                    }else{
                        return;
                    }
                }
                document.form.id.value=id;
                document.form.submit();

            }

        </script>
    
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" name="form">
        
        <input type="hidden" name="action">
        <input type="hidden" name="id">

        <table class="table">
            <tr class="header green">
                <th>Angelegt</th>
                <th>Name</th>
                <th>Vorname</th>
                <th>Pers.-Nr.</th>
                <th>Gehalt</th>
                <th>Geb.-Datum</th>
                <th>Aktion</th>
            </tr>

            <tr class="info">
                <td></td>
                <td><input type="text" name="na[0]" class="form-control"></td>
                <td><input type="text" name="vo[0]" class="form-control"></td>
                <td><input type="text" name="pn[0]" class="form-control"></td>
                <td><input type="text" name="gh[0]" class="form-control"></td>
                <td><input type="date" name="gb[0]" class="form-control"></td>
                <td><a href="javascript:send(0,0)" title="neu eintragen" ><i class="bi bi-save2-fill"></i></a></td>
            </tr>

            <?php 
            
                while($row=mysqli_fetch_assoc($result)):
                    $id = $row['perso_id'];

                  /*   //Das Geburtsdatum anders darstellen als in SQL formatiert
                    $gb = explode('-', $row['perso_geburtstag']);
                    $gbts = mktime(0, 0, $gb[1], $gb[2],$gb[0]); */

                    // Datum und Uhrzeit des erstellt-Feldes:
                    // ersetzen des leerzeichens durch einen html Zeilenumbruch

                    $erstellt = str_replace(' ', '<br>', $row['perso_erstellt']);

            ?>

            <tr>
                <td class="small-fonts number text-success"><?php echo $erstellt ?></td>

                <td><input class="form-control" type="text" name="na[<?php echo $id; ?>]" value="<?php echo $row['perso_nachname'];?> ">
            </td>

                <td><input class="form-control" type="text" name="vo[<?php echo $id; ?>]" value="<?php echo $row['perso_vorname'];?> ">
            </td>

                <td><input class="form-control number" type="text" name="pn[<?php echo $id; ?>]" value="<?php echo $row['perso_id'];?> ">
            </td>

                <td><input class="form-control number" type="text" name="gh[<?php echo $id; ?>]" value="<?php echo number_format($row['perso_gehalt'], 2, ',', '.'); ?>">
            </td>

                <td><input class="form-control number" type="date" name="gb[<?php echo $id; ?>]" value="<?php echo $row['perso_geburtstag'];?>">
            </td>

                <td >
                    <a href="javascript:send(1, <?php echo $id; ?>)" title="ändern"><i class="bi bi-pencil-square"></i></a>

                    <a href="javascript:send(2, <?php echo $id; ?>)" title="löschen"><i class="bi bi-trash-fill"></i></a>
                </td>
            </tr>

            <?php endwhile; ?>

        </table>

    </form>    

<?php 
else:
    echo get_db_error($db, $sql);
endif;
mysqli_close($db);
get_footer(true, true); ?>