<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Royal Sweets',
    NULL,
    true,
    'Royal Sweets - Schoko-Laden',
    array(
        'Royal Sweets',
        array(
            'Start' => 'index.php',
            'Pralinen' => 'pralinen.php',
            'Schokolade' => 'schokolade.php',
            'Warenkorb' => 'warenkorb.php'
        )
    )
);

include 'artikel.php';

get_header( ...$args );
?>

<p class="lead">Bitte tragen Sie die gewünschte Menge ein:</p>
<form action="warenkorb.php" method="post">

    <table class="table table-hover">

        <tr class="table-warning">
            <th>Artikel-Nr.</th>
            <th>Bezeichnung</th>
            <th>Menge</th>
            <th>Einheit</th>
        </tr>

        <?php foreach ($array_schokolade as $art_nr => $bez): ?>

            <?php $menge = isset($_SESSION[$art_nr]) ? $_SESSION[$art_nr] : 0 ?>

            <tr>
                <td><?php echo $art_nr; ?></td>
                <td><?php echo $bez; ?></td>
                <td>
                    <input type="number" name="<?php echo $art_nr; ?>" value="<?php echo $menge ?>" size="5">
                    
                </td>
                <td>Tafel (100g)</td>
            </tr>

         <?php endforeach; ?>   

         <tr>
             <td colspan="4">
                 <input type="submit" name="schokolade" value="In den Warenkorb" class="btn btn-primary">
                 <input type="reset" value="Abbrechen" class="btn btn-secondary">
             </td>
         </tr>

    </table>

</form>
    
<?php get_footer(true, true); ?>