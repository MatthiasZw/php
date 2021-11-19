<?php
session_start();
require_once( '../../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Royal Sweets',
    NULL,
    true,
    'Royal Sweets - Pralinen',
    array(
        '<img src="rs-logo-109x56.png" alt="logo">Royal Sweets ',
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

        <?php foreach ($array_pralinen as $art_nr => $bez): ?>

            <?php $menge = isset($_SESSION[$art_nr]) ? $_SESSION[$art_nr] : 0 ;?>

            <?php 
            
            //funktioniert nur mit edit-button

            $focus='';
            if(isset($_GET['edit']) && $art_nr === $_GET['edit']){
                $focus='autofocus';
            }
            
            ?>

            <tr>
                <td><?php echo $art_nr; ?></td>
                <td><?php echo $bez; ?></td>
                <td>
                    <input type="number" name="<?php echo $art_nr; ?>" value="<?php echo $menge ?>" size="5" <?php echo $focus; ?>>
                    
                </td>
                <td>Schachtel (250g)</td>
            </tr>

         <?php endforeach; ?>   

         <tr>
             <td colspan="4">
                 <input type="submit" name="pralinen" value="In den Warenkorb" class="btn btn-primary">
                 <input type="reset" value="Abbrechen" class="btn btn-secondary">
             </td>
         </tr>

    </table>

</form>

<script>
    /* Selektiert ein Form-Input wenn es den Fokus hat */
    const elements = document.querySelectorAll ("input");
    for (let i=0; i<elements.length; i++) {
        elements[i].addEventListener("focus", function(){
            this.select();
        });
    }
</script>
    
<?php get_footer(true, true); ?>