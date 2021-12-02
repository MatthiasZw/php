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
    'Miniblog-NEUERSTELLUNG',
    array(
        'Mein Blog',
    array( 'Übersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );

if(!empty($_POST)){

    $posts_autor_id_ref = $_SESSION['aid'];
    $posts_kateg_id_ref = mysqli_real_escape_string($db, $_POST['auswahl']);
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

        mysqli_stmt_bind_param($stmt, 'sisss', $posts_autor_id_ref, $posts_kateg_id_ref, $posts_titel, $posts_inhalt, $posts_bild);

        mysqli_stmt_execute($stmt);


        echo '<p class="alert alert-success">';
        echo 'Ihr Post mit dem Titel: <b>' . $_POST['titel'] . ' </b> wurde erstellt! Sie werden in 3 Sekunden zurück zur Hauptseite geleitet.</p>';

        mysqli_stmt_close($stmt);

        header("Refresh:3; url=index.php");
    }

}

?>

    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">

        <p >
            <div>Titel: <input type="text" name="titel"></div><br>
            <div> Kategorie:
                <select name="auswahl" >
                    <option value="<?php echo $_SESSION['Gitarre']['kateg_id']; ?>"><?php echo $_SESSION['Gitarre']['kateg_name']; ?></option>
                    <option value="<?php echo $_SESSION['Bass']['kateg_id']; ?>"><?php echo $_SESSION['Bass']['kateg_name']; ?></option>
                    <option value="<?php echo $_SESSION['Schlagzeug']['kateg_id']; ?>"><?php echo $_SESSION['Schlagzeug']['kateg_name']; ?></option>
                    <option value="<?php echo $_SESSION['Saxophon']['kateg_id']; ?>"><?php echo $_SESSION['Saxophon']['kateg_name']; ?></option>
                </select>
            </div><br>
            <div>Bild-URL: <input type="text" name="url"></div>
        </p>
        <div>Text: <textarea name="text" id="" cols="30" rows="10"></textarea></div><br>

        <div><button type="submit">Speichern</button>
        <button type="reset">Zurücksetzen</button></div>

    </form>

<br>
<?php get_footer(true, true); ?>