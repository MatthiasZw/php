<?php 

/* Schreibt einen HTML-Header und den Kopf-Bereich der Seite.
 * 
 * @param $title string required Titel der Webseite (im Head 
 *      Bereich)
 * @param $css string | array optional
 *      Pfad zu CSS-Datei(en)
 *      default NULL
 * @param $bootstrap bool optional
 *      Bootstrap nutzen oder nicht
 *      default false
 * @param $header string optional
 *      Ausgabe der Hauptüberschrift im sichtbaren Bereich
 *      default NULL
 * @param $nav array optional
 *      Wird eine Navigation benötigt, wenn ja: welche
 *      Nav-Punkte
 *      default NULL
 * @param $fluid bool optional
 *      Regelt, ob eine Bootstrap-Klasse 'container' oder 
 *      'container-fluid' benutzt werden soll
 *      default false
 * 
 * @return string HTML-Header und Seiten -Kopfbereich
 */

 function get_header(
     string $title, 
     string | array $css = NULL,
     bool $bootstrap = false,
     string $header = NULL,
     array $nav = NULL,
     bool $fluid = false
 ){
    $class_fluid = (false === $fluid) ? 'container' : 'container-fluid';

    ?>

    <!DOCTYPE html>
    <html lang="de">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo htmlspecialchars($title); ?></title>
        <?php 
        
        if( $bootstrap) {

            echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">';
        }

        if(is_array($css)){
            foreach($css as $css_link){
                echo "\r\n\t<link rel='stylesheet' href='" . htmlspecialchars($css_link) . "'>";
            }
        }elseif (!is_null($css)){
            echo "<link rel='stylesheet' href='" . htmlspecialchars($css) . "'>";
        }
        
        ?>
    </head>
    <body>

    <?php if(!is_null($nav)) get_nav($nav); ?>

    <header>

    <div class="<?php echo $class_fluid; ?>">
        <h1 class="display-3"><?php echo (is_null($header)) ? $title : $header; ?></h1>
    </div>
    </header>
    </main class="<?php echo $class_fluid; ?>">
    <?php 

 }





/* sCHREIBT einen Fußbereich EINER html Seite
 * @param $fluid bool optional   
 *      Regelt ob eine Bootstrap-Klasse 'container' bzw.      
 *      'container-fluid' benutzt werden soll
 *      default false
 * @param $bootstrap_js bool optional
 *      Regelt ob Bootstrap-JS-Dateien eingebunden werden
 *      müssen
 *      default false
 * 
 * @return string Footer-Angaben für dei Html-Seite.   
 */

 
 function get_footer(bool $fluid = false, bool $bootstrap_js = false ) {
     $class_fluid = (false === $fluid) ? 'container' : 'container-fluid';
?>

    <!-- HTML Bereich -->

    </main>

    <footer class="<?php echo $class_fluid; ?>">
    <div>
        <p>&copy; <?php echo date('Y'); ?> Jedermann </p>
    </div>

    </footer>
    
        <?php if( $bootstrap_js):  ?>

            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

<?php endif; ?>
    </body>
    </html>

<?php 

 }