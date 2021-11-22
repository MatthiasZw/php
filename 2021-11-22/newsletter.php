<?php
require_once( '../includes/functions.inc.php' );
$database = 'homepage';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Newsletter',
    NULL,
    true
);
get_header( ...$args );

$sql = ' INSERT INTO `newsletter`
( 
`UserName`,
`UserMail`
)
VALUES
(
    ' . '"' . $_POST['hauptname'] . '"' . ' ,
    ' . '"' . $_POST['email'] . '"' . '    
)';

echo '<pre>', var_dump( $sql ), '</pre>';

if (empty($_POST['email'])){

    echo '<p>  <a href="05-uebung.php">Bitte HIER E-Mail-Adresse eingeben</a></p>';

}

if($result = mysqli_query($db, $sql)){

    $anzahl = mysqli_affected_rows($db);

    echo "$anzahl Datensätze wurden hinzugefügt. Die E-Mail-Adresse " . $_POST['email'] . " wurde gespeichert";

}else{

    $errmsg = mysqli_error($db);

    echo "<p>
    $errmsg</p>";


    //echo get_db_error($db, $sql);


} 

mysqli_close($db);


?>
    
<?php get_footer(); ?>