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
    'Miniblog-ÜBERSICHT',
    array(
        'Mein Blog',
    array( 'Übersicht' => 'index.php',
     $_SESSION['navlog'] => $_SESSION['navlink'],
     'Registrierung' => 'registrierung.php',
     $_SESSION['navneu'] => $_SESSION['neulink'])
        )
    );
get_header( ...$args );

//Auslesen der Kategorien für Select-Filter:

    $sql = "SELECT kateg_id,
    kateg_name
    FROM `tbl_kategorien`";


    $result = mysqli_query($db, $sql);

?> 

<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="get">
    
        <p id="kt"><b>Kategorie auswählen:</b> <select name="auswahl" ></p>

    <?php

        if(false===$result){
            echo get_db_error($db, $sql);
        }else{
            while ($row = mysqli_fetch_assoc( $result)): ?>


                <option value="<?php echo $row['kateg_id']; ?>"><?php echo $row['kateg_name']; ?></option>

            <?php endwhile;

        }

    ?>

    </select>

        <button type="submit">Filtern</button>
        <button><a href="index.php">Alle</a></button>

</form>

<?php 


// Kategorien in $_GET schreiben (nicht sehr elegant)

$sql2 = "SELECT kateg_id,
kateg_name
FROM `tbl_kategorien`";


$result2 = mysqli_query($db, $sql2);


if(false===$result2){
    echo get_db_error($db, $sql2);
}else{
    while ($row = mysqli_fetch_assoc( $result2)):
        
       
            $_SESSION[$row['kateg_name']] = $row;
            
       
     endwhile;
}

?>


<!-- Anzeigen der gefilterten Posts oder alle Posts: -->

<div class="container"></div>
<div class="row">

<?php 

    if (isset( $_GET['auswahl'])){

        $auswahl=$_GET['auswahl'];

        $sql = "SELECT posts_id,
        posts_titel,
        posts_inhalt,
        posts_bild FROM `tbl_posts` WHERE posts_kateg_id_ref=$auswahl";


        $result = mysqli_query($db, $sql);


        if(false===$result){
            echo get_db_error($db, $sql);
        }else{
            while ($row = mysqli_fetch_assoc( $result)): ?> 

                
                <div class="col">
                    <div class="card bg-light" style="width: 18rem;">
                    <img class="card-img-top" src="<?php echo $row['posts_bild']; ?>" alt="Card image cap">
                      <div class="card-body">
                    
                          <h3 class="card-title">
                    
                              <div><b>Titel:</b> <?php echo $row['posts_titel']; ?></div>
                              </a>
                          </h3>
                          <p class="card-text">
                              <div><b>Text:</b> <?php echo $row['posts_inhalt']; ?></div>
                          </p>
                          <a href="detail.php?<?php echo 'page='. $row['posts_id']; ?>" class="btn btn-primary">Artikel lesen</a>
                    
                          <br>
                      </div>
                    </div><br>
                </div>
                <br>


            <?php endwhile;
  
        }

    }else{

        $sql = "SELECT posts_id,
        posts_titel,
        posts_inhalt,
        posts_bild FROM `tbl_posts`";


        $result = mysqli_query($db, $sql);


        if(false===$result){
            echo get_db_error($db, $sql);
        }else{
            while ($row = mysqli_fetch_assoc( $result)): ?> 
            
                <div class="col">
                    <div class="card bg-light" style="width: 18rem;">
                        <img class="card-img-top" src="<?php echo $row['posts_bild']; ?>" alt="Card image cap">
                          <div class="card-body">
                    
                              <h3 class="card-title">
                    
                                  <div><b>Titel:</b> <?php echo $row['posts_titel']; ?></div>
                                  </a>
                              </h3>
                              <p class="card-text">
                                  <div><b>Text:</b> <?php echo $row['posts_inhalt']; ?></div>
                              </p>
                              <a href="detail.php?<?php echo 'page='. $row['posts_id']; ?>" class="btn btn-primary">Artikel lesen</a>
                    
                              <br>
                          </div>
                    </div><br>
                </div>
                <br>


            <?php endwhile;
  
        }

    }
 
?>
</div>
</div>
    
<?php get_footer(true, true); ?>