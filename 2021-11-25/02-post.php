<?php
require_once( '../includes/functions.inc.php' );
// get_header( string $title, string/array $css=NULL, bool $bootstrap=false, string $header=NULL, array $nav=NULL, bool $fluid=false )
$args = array(
    'Mein Blog',
    NULL,
    false,
    'Artikel Übersicht',
    array('Mein Blog',
       array( 'PHP' => '02-post.php?id=1',
        'HTML' => '02-post.php?id=2',
        'CSS' => '02-post.php?id=3',
        'JavaScript' => '02-post.php?id=4')
    )
);
get_header( ...$args );

if(!empty($_GET)){
    $post_id=$_GET['id'];

    $sql='SELECT id, post_header, post_body, post_img, img_alt
    FROM posts
    WHERE
    id=?';

    if($stmt = mysqli_prepare($db, $sql)){
        mysqli_stmt_bind_param($stmt, 'i', $post_id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_bind_result($stmt, $id, $post_header, $post);

    }
}


?>
    
<?php get_footer(); ?>