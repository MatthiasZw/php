<?php
session_start();
if(!$_SESSION['navlog']){
    $_SESSION['navlog']='Login';
    $_SESSION['navlink']='login.php';
}
require_once( '../includes/functions.inc.php' );
$database = 'miniblog';
require_once( '../includes/db-connect.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Miniblog',
    'css/blog.css',
    true,
    'Miniblog-UEBERSICHT',
    array(
        'Mein Blog',
    array( 'Uebersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );

if( !empty($_POST)){

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


        if(password_verify($autor_passwort, $db_upw)){
            
            $_SESSION['login']=true;
            $_SESSION['navlog']='Logout';
            $_SESSION['navlink']='logout.php';
            $_SESSION['navneu']='Neu';
            $_SESSION['neulink']='neu.php';

            
            echo '<p class="alert alert-success">Login erfolgreich! Sie werden in 3 Sekunden zurück zur Hauptseite geleitet. </p>';
            
            header("refresh:30; url=index.php");

        }else{
            echo '<p class="alert alert-danger">Login fehlgeschlagen!</p>';
            $_SESSION['login']=false;
            $_SESSION['navlog']='Login';
            $_SESSION['navlink']='login.php';
            
        }
        
    }

    //Autor ID in $_SESSION
    
    $sql2 = "SELECT
    `autor_id` 
    FROM
        `tbl_autoren`
    WHERE
        autor_email = '$autor_email'";


    $result2 = mysqli_query($db, $sql2);

    if(false===$result2){
        echo get_db_error($db, $sql2);
    }else{
        while ($row = mysqli_fetch_assoc( $result2)):
        
        $_SESSION['aid']= $row['autor_id'];
           

         endwhile;
    }


    // Kategorien in $_SESSION

    $sql3 = "SELECT
    `kateg_id`,
    `kateg_name` 
    FROM
        `tbl_kategorien`";


    $result3 = mysqli_query($db, $sql3);


    if(false===$result3){
        echo get_db_error($db, $sql3);
    }else{
        while ($row = mysqli_fetch_assoc( $result3)):
            
           
                $_SESSION[$row['kateg_name']] = $row;
                
            
            echo '<pre>', var_dump( $row ), '</pre>';

        
           
         endwhile;
    }

}                

?>

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
    <p>E-Mail-Adresse: <input type="text" name="autor_email" ></p>
    <p>Passwort: <input type="text" name="autor_passwort"></p>
    <p><button type="submit">Login</button></p>
</form>
<br>

    
<?php get_footer(true, true); ?>