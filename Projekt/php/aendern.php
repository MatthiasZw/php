<?php
session_start();

$page= $_GET['page'];
/* Verhindern dass Seite über URL geladen werden kann:  */

    if(!isset($_SESSION['login']) OR $_SESSION['login']==false){
        
        header("Refresh:0; url=bitteanmelden.php?page=$page");

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

/* Auslesen für Formular: */



$sql = "SELECT posts_id,
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
    


    <form class="form" action="geaendert.php?<?php echo 'page='. $row['posts_id']; ?>" method="post">

    <p>
        <div><b>Titel: </b><input type="text" name="titel" value="<?php echo $row['posts_titel']; ?>"></div><br>
        <div><b>Kategorie:</b>
            <select name="auswahl" >
                    <option value="<?php echo $_SESSION['Gitarre']['kateg_id']; ?>"><?php echo $_SESSION['Gitarre']['kateg_name']; ?></option>
                    <option value="<?php echo $_SESSION['Bass']['kateg_id']; ?>"><?php echo $_SESSION['Bass']['kateg_name']; ?></option>
                    <option value="<?php echo $_SESSION['Schlagzeug']['kateg_id']; ?>"><?php echo $_SESSION['Schlagzeug']['kateg_name']; ?></option>
                    <option value="<?php echo $_SESSION['Saxophon']['kateg_id']; ?>"><?php echo $_SESSION['Saxophon']['kateg_name']; ?></option>
                </select>
        </div><br>
        
        <div><b>Bild-URL:</b> <input type="text" name="url" value="<?php echo $row['posts_bild']; ?>"></div>
    </p>
    <div><b>Text:</b> <textarea name="text" id="" cols="30" rows="10"><?php echo $row['posts_inhalt']; ?></textarea></div><br>

    <div><button type="submit">Speichern</button>
    <button type="reset">Zurücksetzen</button></div>

    </form>


    <?php endwhile;
}


?>


<br>
<?php get_footer(true, true); ?>