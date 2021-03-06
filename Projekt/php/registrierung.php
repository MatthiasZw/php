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
    '../css/blog.css',
    true,
    'Miniblog-Registrierung',
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

    $autor_vorname=$_POST['autor_vorname'];
    $autor_nachname=$_POST['autor_nachname'];
    $autor_email = $_POST['autor_email'];
    $autor_passwort = password_hash($_POST['autor_passwort'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO
        tbl_autoren
        (autor_vorname, autor_nachname, autor_email, autor_passwort)
        VALUES
        (?,?,?,?)";

        $stmt = mysqli_prepare($db, $sql);

        if(false=== $stmt) {
            echo get_db_error($db, $sql);
        }else{

            mysqli_stmt_bind_param($stmt, 'ssss', $autor_vorname, $autor_nachname, $autor_email, $autor_passwort);
            mysqli_stmt_execute($stmt);

            printf('<p class="alert alert-success">Ihre Registrierung war erfolgreich!<br>Anzahl der hinzugefügten Datensätze:%d</p>', 
            mysqli_affected_rows($db));

            mysqli_stmt_close($stmt);

        }
        
        mysqli_close($db);

}

?>
    
    <p><h2 class="head2">Bitte geben Sie einen Namen, Benutzernamen und ein Passwort an!</h2></p>

    <form class="form" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <p>Name: <input type="text" name="autor_nachname"></p>
        <p>Vorname: <input type="text" name="autor_vorname"></p>
        <p>E-Mail-Adresse: <input type="text" name="autor_email"></p>
        <p>Passwort: <input type="text" name="autor_passwort"></p>
        <p><button type="submit">Registrieren</button></p>

    </form>

<br>
<?php get_footer(true, true); ?>