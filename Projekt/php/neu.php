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
    'Miniblog-NEUERSTELLUNG',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );

if(!empty($_POST)){

    $posts_autor_id_ref = mysqli_real_escape_string($db, $_POST['aid']);
    $posts_kateg_id_ref = mysqli_real_escape_string($db, $_POST['kid']);
    $posts_titel= mysqli_real_escape_string($db, $_POST['titel']);
    $posts_inhalt= mysqli_real_escape_string($db, $_POST['text']);
    $posts_bild= mysqli_real_escape_string($db, $_POST['url']);

    $sql = "INSERT INTO `tbl_posts` (
        posts_autor_id_ref, 
        posts_kateg_id_ref, 
        posts_titel,
        posts_inhalt,
        posts_bild
        )
        VALUES
        (
        ?,?,?,?,?
        )";

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
        echo mysqli_affected_rows($db);
        echo ' Datensatz wurde hinzugefügt <br></p>';
        echo 'HInzugefügte ID:' . $id . '</p>';

        mysqli_stmt_close($stmt);
    }

}


?>


    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <div>Titel: <input type="text" name="titel"></div>
        <div>Autoren-ID: <input type="text" name="aid"></div>
        <div>Kathegorie-ID: <input type="text" name="kid"></div>
        <div>Bild-URL: <input type="text" name="url"></div>
        <div>Text: <textarea name="text" id="" cols="30" rows="10"></textarea></div>

        <div><button type="submit">Speichern</button>
        <button type="reset">Zurücksetzen</button></div>

    </form>

<br>
<?php get_footer(true, true); ?>