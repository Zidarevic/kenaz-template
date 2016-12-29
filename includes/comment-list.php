<?php
function mytheme_comment($comment, $args, $depth) {
	$GLOBALS['comment'] = $comment;
	extract($args, EXTR_SKIP);

	if ( 'div' == $args['style'] ) {
		$tag = 'div';
		$add_below = 'comment';
	} else {
		$tag = 'li';
		$add_below = 'div-comment';
	}
?>
	<?php echo $tag ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ) ?> id="comment-<?php comment_ID() ?>">
	<?php if ( 'div' != $args['style'] ) : ?>
	<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
		<div class="comment-author vcard">
			<?php if ( $args['avatar_size'] != 0 ) echo get_avatar( $comment, $size='55' ); ?>
			<div class="commRight">
				<div class="commTop">
					<?php printf( __( '<cite class="fn">%s</cite>' ), get_comment_author_link() ); ?>
					<?php if ( $comment->comment_approved == '0' ) : ?>
						<em class="comment-awaiting-moderation"><?php _e( 'Your comment is awaiting moderation.' ); ?></em><br />
					<?php endif; ?>
			
					<a class="commentDate" href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ); ?>">
						<?php
						/* translators: 1: date, 2: time */
						printf( __('%1$s %2$s'), get_comment_date('M jS, Y'),  get_comment_time() ); ?>
					</a>
					<?php edit_comment_link( __( '(Edit)' ), '  ', '' );
					?>
					<div class="reply">
						<?php comment_reply_link( array_merge( $args, array( 'add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
					</div>
				</div>
			

		<?php comment_text(); ?>

		<?php if ( 'div' != $args['style'] ) : ?>
			</div>
			<div class="clear"> </div>
		
	</div>
	<?php endif; ?>
<?php
}
?>
