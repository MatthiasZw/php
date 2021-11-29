<?php
session_start();
if( ! isset($_SESSION['navlog'])){
    $_SESSION['navlog']='Login';
    $_SESSION['navlink']='login.php';
    
    $_SESSION['navneu']='';
    $_SESSION['neulink']='';
}

require_once( '../includes/functions.inc.php' );
$database = 'miniblog';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog',
    'css/blog.css',
    true,
    'Miniblog-DETAILSEITE',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );

$page= $_GET['page'];

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
    
        <a href="aendern.php?<?php echo 'page='. $row['posts_id']; ?>">
            <div>Titel: <?php echo $row['posts_titel']; ?></div>
        </a>
        <div>Autoren-ID: <?php echo $row['posts_autor_id_ref']; ?></div>
        <div>Kathegorie-ID: <?php echo $row['posts_kateg_id_ref']; ?></div>
        <div>Bild-Pfad: <?php echo $row['posts_bild']; ?></div>
        <div>Text: <?php echo $row['posts_inhalt']; ?></div> 
        <br>


    <?php endwhile;
}


?>


    
<?php get_footer(true, true); ?>