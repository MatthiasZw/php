<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    "Royal Sweets",null,true,'Royal Sweets - Warenkorb',['<img src="rs-logo-109x56.png" alt="logo">Royal Sweets ',['Start'=>'index.php','Schokolade'=>'schokolade.php','Pralinen'=>'pralinen.php','Warenkorb'=>'warenkorb.php']]
);
include 'artikel.php';
get_header( ...$args );
if(isset($_POST['schokolade']) OR isset($_POST['pralinen'])){
    foreach ($_POST as $art_nr => $menge) {
        if ((int)$menge>0) {
            $_SESSION[$art_nr]=(int)$menge;
        }else{
            if (array_key_exists($art_nr,$_SESSION)){
                unset($_SESSION[$art_nr]);
            }
        }
        
    }
}

if(isset($_GET['delete'])){
    unset($_SESSION[$_GET['delete']]);


}

?>
<table class="table table-hover">
    <tr class="table-success">
        <th>Artikel Nummer</th>
        <th>Bezeichnung</th>
        <th>Menge</th>
        <th>Aktion</th>
    </tr>
    <?php foreach ($_SESSION as $key => $value): ?>
        <tr>
            <td><?php echo $key; ?></td>
            <td>
                <?php
                 //echo str_starts_with($key,'s')?$array_schokolade[$key]:''; 

                if (str_starts_with($key, 's')){
                    $link = 'schokolade.php';
                    echo $array_schokolade[$key];

                }
                //echo str_starts_with($key,'p')?$array_pralinen[$key]:''; 

                if (str_starts_with($key, 'p')){
                    $link = 'pralinen.php';
                    echo $array_pralinen[$key];

                }
    
                 ?>
            </td>
            <td><?php echo $value; ?></td>

            <td><a href="<?php echo $_SERVER['PHP_SELF']; ?>?delete=<?php echo $key; ?>">del</a>

            <a href="<?php echo $link; ?>?edit=<?php echo $key; ?>">edit</a>
        </td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Was moechten Sie als naechstes tun?</p>

<style>

        .delete{

            pointer-events: none;
            cursor: default;
            text-decoration: none;
            color: #666;
        }

</style>

<?php 

        $delete = '';
        if(empty($_SESSION)){

            $delete = 'delete';

        }

?>

<ul>
    <li><a href="schokolade.php">Schokolade bestellen</a></li>
    <li><a href="pralinen.php">Pralinen bestellen</a></li>
    <li><a href="kasse.php" class="<?php echo $delete; ?>">Bestellung abschliessen</a></li>
</ul>

<?php get_footer(true, true); ?>