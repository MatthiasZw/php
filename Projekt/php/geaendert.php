<?php
session_start();


/* Verhindern dass Seite über URL geladen werden kann:  */

    if(!isset($_SESSION['login']) OR $_SESSION['login']==false){

        header("Refresh:0; url=index.php");

    }

require_once( '../includes/functions.inc.php' );
$database = 'miniblog';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog',
    '../css/blog.css',
    true,
    'Miniblog-AENDERN',
    array(
        'Mein Blog',
    array( 'Übersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );

$page= $_GET['page'];


/* Neu schreiben */

if(!empty($_POST)){

    $posts_autor_id_ref = $_SESSION['aid'];
    $posts_kateg_id_ref = mysqli_real_escape_string($db, $_POST['auswahl']);
    $posts_titel= mysqli_real_escape_string($db, $_POST['titel']);
    $posts_inhalt= mysqli_real_escape_string($db, $_POST['text']);
    $posts_bild= mysqli_real_escape_string($db, $_POST['url']);


    $sql = "UPDATE `tbl_posts` SET 
        posts_autor_id_ref=?, 
        posts_kateg_id_ref=?, 
        posts_titel=?,
        posts_inhalt=?,
        posts_bild=?
        WHERE posts_id=$page";

    $stmt= mysqli_prepare($db, $sql) ;
    
    if(false=== $stmt){
        echo get_db_error($db, $sql);
    }else{
        

        mysqli_stmt_bind_param($stmt, 'iisss', $posts_autor_id_ref, $posts_kateg_id_ref, $posts_titel, $posts_inhalt, $posts_bild);


        mysqli_stmt_execute($stmt);

        echo '<p class="alert alert-success">';
        echo 'Ihr Post mit dem Titel: <b>' . $_POST['titel'] . ' </b> wurde geändert! Sie werden in 3 Sekunden zurück zur Hauptseite geleitet.</p>';

        mysqli_stmt_close($stmt);

        header("Refresh:3; url=index.php");
    }

}


?>


<br>
<?php get_footer(true, true); ?>