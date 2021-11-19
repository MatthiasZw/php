<?php
require_once( '../../includes/functions.inc.php' );
$args = array(
    'Suche',
    '../../css/styles.css',
    true,
    'Übung zu Kapitel 10: <small>Begriff in einer Textpassage suchen</small>'
);
get_header( ...$args );
?>   
<form action="<?php $_SERVER['PHP_SELF']; ?>" method="post">
    
<div class="row">
    <div class="col">
        <label class="form-label" for="ot">Originaltext:</label>
        <textarea class="form-control" name="text" cols="50" rows="12" id="ot">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Reiciendis facere totam non nostrum temporibus, magnam fugiat soluta laborum magni alias, earum, quia laudantium eos amet voluptate repellat veritatis. Quisquam, iste?

Assumenda ex eius dolorem nemo molestias quam ipsum. Eveniet a commodi quam unde libero quod exercitationem perspiciatis illum reiciendis soluta placeat corrupti similique culpa omnis, aspernatur itaque est, excepturi qui.

Laudantium, totam sequi veritatis harum quibusdam aspernatur architecto ipsam excepturi saepe voluptatem unde voluptates dolor animi mollitia, rem temporibus accusamus numquam id quasi quaerat ea. Voluptate velit libero eius omnis.</textarea>
    </div>
    
    <div class="col">
        <label class="form-label" for="sb">Suche nach:</label>
        <input class="form-control" type="search" name="suchbegriff" id="sb" autofocus>
    
        <button type="submit" class="btn btn-primary my-4">Zeichenkette suchen</button>

        <div class="bg-light border p-5 rounded-3">

<?php

// Prüfung, ob das Formular abgesendet wurde
if( isset( $_POST['suchbegriff'] ) ) {
    
    // Erzeugen der Notwendigen Variablen
    $suchbegriff = trim($_POST['suchbegriff']);
    if( empty( $suchbegriff ) ){
        die( '<p class="alert alert-danger">Bitte geben Sie einen Suchbegriff an!</p>' );
    }
    $text = $_POST['text'];
    $anzahl = substr_count( $text, $suchbegriff );
    
    // Ausgabe der Anzahl der gefundenen Suchbegriffe
    printf( '<p class="suchergebnis">Suche nach "<b>%s</b>": <span class="anzahl">%d Mal</span> gefunden.</p>', $suchbegriff, $anzahl );
    
    // Erzeugen des Ausgabe-Strings
    // Der Suchbegriff wird in das <mark>-Tag eingeschlossen
    // und im Text damit ersetzt
    $ausgabe = str_replace( $suchbegriff, '<mark>' . $suchbegriff . '</mark>', $text );
    
    // Der Text mit den ersetzten Suchbegriffen
    // wird ausgegeben
    echo '<p>', nl2br($ausgabe), '</p>';
}

?> 
        </div><!-- /.bg-light -->
    </div><!-- /.col -->
</div><!-- /.row -->

</form>   
<?php get_footer(); ?>