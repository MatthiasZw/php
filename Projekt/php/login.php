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
    'Miniblog-LOGIN',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php',
     'Login' => 'login.php',
     'Registrierung' => 'registrierung.php',
     'Neu' => 'neu.php')
        )
    );
get_header( ...$args );
if( !empty($_POST)){

    // Variablen erstellen

    $autor_email = $_POST['autor_email'];
    $autor_passwort = $_POST['autor_passwort'];

    $sql = "SELECT
        autor_email, 
        autor_passwort
        FROM
            tbl_autoren
        WHERE
            autor_email = ?";

            
    $stmt = mysqli_prepare($db, $sql);
      

        if(false === $stmt) {

            get_db_error($db, $sql);

        }else{
            mysqli_stmt_bind_param($stmt, 's', $autor_email);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            mysqli_stmt_bind_result($stmt, $db_uname, $db_upw);
            mysqli_stmt_fetch($stmt);
            mysqli_stmt_close($stmt);

            //Prüfe ob Passwort übereinstimmt
            if(password_verify($autor_passwort, $db_upw)){
                echo '<p class="alert alert-success">Login erfolgreich!</p>';
                $_SESSION['login']=true;
                $_SESSION['navlog']='Logout';
                $_SESSION['navlink']='logout.php';
            }else{
                echo '<p class="alert alert-danger">Login fehlgeschlagen!</p>';
                $_SESSION['login']=false;
                $_SESSION['navlog']='Login';
                $_SESSION['navlink']='login.php';
                
            }
            
        }

}                



?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>E-Mail-Adresse: <input type="text" name="autor_email" ></p>
    <p>Passwort: <input type="text" name="autor_passwort"></p>
    <p><button type="submit">Login</button></p>
</form>


    
<?php get_footer(true, true); ?>