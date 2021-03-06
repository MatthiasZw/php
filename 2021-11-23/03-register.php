<?php
require_once( '../includes/functions.inc.php' );
$database = 'restaurant';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Benutzer-Registrierung',
    NULL,
    true,
);
get_header( ...$args );

//Prüfe ob Formular gesendet wurde

if(!empty($_POST)){

    // Variablen anlegen

    $bntzr_name = $_POST['bntzr_name'];
    $bntzr_passwort = password_hash($_POST['bntzr_passwort'], PASSWORD_DEFAULT);

    $sql = "INSERT INTO
        tbl_benutzer
        (bntzr_name, bntzr_passwort)
        VALUES
        (?,?)";

        $stmt = mysqli_prepare($db, $sql);

        if(false=== $stmt) {
            echo get_db_error($db, $sql);
        }else{

            mysqli_stmt_bind_param($stmt, 'ss', $bntzr_name, $bntzr_passwort);
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
        
        <p>Benutzername: <input type="text" name="bntzr_name"></p>
        <p>Passwort: <input type="text" name="bntzr_passwort"></p>
        <p><button type="submit">Registrieren</button></p>

    </form>


<?php get_footer(); ?>