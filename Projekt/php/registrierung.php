<?php
session_start();
require_once( '../includes/functions.inc.php' );
$database = 'miniblog';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog',
    'css/blog.css',
    true,
    'Miniblog-Registrierung',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php',
     'Login' => 'login.php',
     'Registrierung' => 'registrierung.php',
     'Neu' => 'neu.php')
        )
    );
get_header( ...$args );
if(!empty($_POST)){

    // Variablen anlegen

    $autor_email = $_POST['autor_email'];
    $autor_passwort = password_hash($_POST['autor_passwort'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO
        tbl_autoren
        (autor_email, autor_passwort)
        VALUES
        (?,?)";

        $stmt = mysqli_prepare($db, $sql);

        if(false=== $stmt) {
            echo get_db_error($db, $sql);
        }else{

            mysqli_stmt_bind_param($stmt, 'ss', $autor_email, $autor_passwort);
            mysqli_stmt_execute($stmt);

            printf('<p class="alert alert-success">Ihre Registrierung war erfolgreich!<br>Anzahl der hinzugefügten Datensätze:%d</p>', 
            mysqli_affected_rows($db));

            mysqli_stmt_close($stmt);

        }
        
        mysqli_close($db);

}

?>
    
    <p>Bitte geben Sie einen Benutzernamen und ein Passwort an!</p>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        
        <p>E-Mail-Adresse: <input type="text" name="autor_email"></p>
        <p>Passwort: <input type="text" name="autor_passwort"></p>
        <p><button type="submit">Registrieren</button></p>

    </form>

    
<?php get_footer(true, true); ?>