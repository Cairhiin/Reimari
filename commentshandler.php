<?php
/* Comments Handler */

define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Our variables

function my_comments_callback( $comment, $args, $depth ) {
    $GLOBALS['comment'] = $comment;
 
    ?>
    <div <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
        <article id="comment-<?php comment_ID(); ?>" class="comment">
 
            	<div class="comment-content"><?php comment_text(); ?></div>
 				<div class="comment-author"><?php comment_author(); ?></div>
        </article>
    </div>
    <?php
}

$getComments = (isset($_GET['getComments'])) ? $_GET['getComments'] : 0;
$postId = (isset($_GET['postId'])) ? $_GET['postId'] : 0;
	global $post, $wp_query;

    $args = array(
        'post_id' => $postId,
        'status' => 'approve',
        'order'   => 'ASC'
    );
    $wp_query->comments = get_comments( $args );

if ($getComments == 0):
?>
<div class="col-xs-12 comments-text">
	<?php
		wp_list_comments(array( 'callback' => 'my_comments_callback' ));
	?>
</div>

<?php else: ?>
<div class="col-xs-12 comments-box">
	<?php
    	comment_form( $args, $postId);
	?>
</div>
<?php endif; ?>

