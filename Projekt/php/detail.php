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

//Auslesen von Autor-Namen und -Nachnamen des anzuzeigenden Posts

    $sql1 = "SELECT * FROM `tbl_autoren` FULL JOIN tbl_posts on `autor_id` = `posts_autor_id_ref` WHERE posts_id= $page";


    $result1 = mysqli_query($db, $sql1);

    if(false===$result1){
        echo get_db_error($db, $sql1);
    }else{
        while ($row = mysqli_fetch_assoc( $result1)): ?>
        
        <?php $name= $row['autor_vorname'] . ' ' . $row['autor_nachname']; ?>

        <?php endwhile;
    }

// Auslesen von Daten des anzuzeigenden Posts

    $sql = "SELECT * FROM `tbl_posts` 
    FULL JOIN tbl_kategorien on `posts_kateg_id_ref` = `kateg_id` 
    WHERE posts_id= $page";


    $result = mysqli_query($db, $sql);

    if(false===$result){
        echo get_db_error($db, $sql);
    }else{
        while ($row = mysqli_fetch_assoc( $result)): ?>
        


        <div class="card" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo $row['posts_bild']; ?>" alt="Card image cap">
                      <div class="card-body">
                    
                          <h3 class="card-title">
                    
                              <div><b>Titel:</b> <?php echo $row['posts_titel']; ?></div>
                              </a>
                          </h3>

                          <h4 class="card-subtitle mb-2 text-muted"><?php echo " <b>Autor:</b> $name"; ?></h4>
                          <h5 class="card-subtitle mb-2 text-muted"><?php echo " <b>Kategorie:</b>" . $row['kateg_name']; ?></h5>
                          <h6 class="card-subtitle mb-2 text-muted"><?php echo " <b>Bild:</b>" . $row['posts_bild']; ?></h6>

                          <p class="card-text">
                              <div><b>Text:</b> <?php echo $row['posts_inhalt']; ?></div>
                          </p>
                          
                          <a href="aendern.php?<?php echo 'page='. $row['posts_id']; ?>" class="btn btn-primary">Ändern</a>
                    
                          <br>
                      </div>
                    </div>



        
           <!--  <div><b>Titel: </b><?php echo $row['posts_titel']; ?></div>
            </a>
            <div><b>Autor:</b> <?php echo $name; ?></div>
            <div><b>Autoren-ID:</b> <?php echo $row['posts_autor_id_ref']; ?></div>
            <div><b>Kathegorie:</b> <?php echo $row['kateg_name']; ?></div>
            <div><b>Bild-Pfad:</b> <?php echo $row['posts_bild']; ?></div>
            <div><b>Text:</b> <?php echo $row['posts_inhalt']; ?></div> <br>

            <a href="aendern.php?<?php echo 'page='. $row['posts_id']; ?>"><button>Ändern</button></a>
            <br> -->


        <?php endwhile;
    }




?>

 <br>   
<?php get_footer(true, true); ?>