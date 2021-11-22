<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Daten ändern',
    NULL,
    true,
    'Daten in einer DB ändern'
    
);
get_header( ...$args );

    $sql = ' UPDATE `tbl_bestellung`
    SET
    `bstlg_nachname` = "Meyer ",
    `bstlg_menge` = 10
    WHERE 
    `bstlg_nachname` = "Müller" ';
        

if($result = mysqli_query($db, $sql)){

    $anzahl = mysqli_affected_rows($db);

    echo "$anzahl Datensätze wurden geändert";

}else{

    echo get_db_error($db, $sql);


} 

mysqli_close($db);

?>
    
<?php get_footer(); ?>