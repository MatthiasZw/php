<?php
require_once( '../includes/functions.inc.php' );
$database = 'obstladen';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Daten einfügen',
    NULL,
    true,
    'Daten in eine DB eintragen'
    
);
get_header( ...$args );

    $sql = ' INSERT INTO `tbl_bestellung`
        ( 
        `bstlg_vorname`,
        `bstlg_nachname`,
        `bstlg_ort`,
        `bstlg_sorte`,
        `bstlg_menge`
        )
        VALUES
        (
            "Heinz",
            "Müller",
            "Gotha",
            "Jonagold",
            8
        )';

if($result = mysqli_query($db, $sql)){

    $anzahl = mysqli_affected_rows($db);

    echo "$anzahl Datensätze wurden hinzugefügt";

}else{

    echo get_db_error($db, $sql);


} 

mysqli_close($db);

?>
    
<?php get_footer(); ?>