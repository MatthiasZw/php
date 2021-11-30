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
    'css/blog.css',
    true,
    'Miniblog-AENDERN',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );

/* Auslesen für Formular */

$page= $_GET['page'];

/* $sql = "SELECT posts_id,
posts_autor_id_ref, 
posts_kateg_id_ref, 
posts_titel,
posts_inhalt,
posts_bild FROM `tbl_posts` WHERE posts_id= $page";


$result = mysqli_query($db, $sql);

if(false===$result){
    echo get_db_error($db, $sql);
}else{
    while ($row = mysqli_fetch_assoc( $result)): ?>
    


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

    <div>Titel: <input type="text" name="titel" value="<?php echo $row['posts_titel']; ?>"></div>
    <div>Autoren-ID: <input type="text" name="aid" value="<?php echo $row['posts_autor_id_ref']; ?>"></div>
    <div>Kathegorie-ID: <input type="text" name="kid" value="<?php echo $row['posts_kateg_id_ref']; ?>"></div>
    <div>Bild-URL: <input type="text" name="url" value="<?php echo $row['posts_bild']; ?>"></div>
    <div>Text: <textarea name="text" id="" cols="30" rows="10"><?php echo $row['posts_inhalt']; ?></textarea></div>

    <div><button type="submit">Speichern</button>
    <button type="reset">Zurücksetzen</button></div>

    </form>


    <?php endwhile;
} */

/* Neu schreiben */

if(!empty($_POST)){

    $posts_autor_id_ref = mysqli_real_escape_string($db, $_POST['aid']);
    $posts_kateg_id_ref = mysqli_real_escape_string($db, $_POST['kid']);
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
        // Werte und Datentypen an die Platzhalter (?) binden 

        mysqli_stmt_bind_param($stmt, 'iisss', $posts_autor_id_ref, $posts_kateg_id_ref, $posts_titel, $posts_inhalt, $posts_bild);

        // Ausführung

        mysqli_stmt_execute($stmt);

        // Liefert die zuletzt hinzugefügt ID

        $id= mysqli_stmt_insert_id($stmt);

        echo '<p class="alert alert-success">';
        echo 'Ihr Post mit dem Titel: <b>' . $_POST['titel'] . ' </b> wurde geändert! Sie werden in 3 Sekunden zurück zur Hauptseite geleitet.</p>';

        mysqli_stmt_close($stmt);

        header("Refresh:3; url=index.php");
    }

}


?>


<br>
<?php get_footer(true, true); ?>