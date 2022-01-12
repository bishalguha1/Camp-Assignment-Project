<?php
/**
 * The template for displaying comments
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package camp_assign
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if ( post_password_required() ) {
	return;
}
?>



<!--widget-comments-->
<div class="widget mb-50">
	<div class="title">
		<?php 
			if(have_comments()):
				$comments_number = get_comments_number();
		?>
		<h5><?php echo $comments_number . ($comments_number === '1' ? ' comment' : ' comments'); ?></h5>
		<?php
			endif;
		?>
		
	</div>

	<!-- Get comment list from inc/custom-comment-list.php through callback -->
	<?php 
		wp_list_comments(
			array(
				'style'      => ' ',
				'short_ping' => true,
				'callback' => 'custom_comment_list'
			)
		);
	?>

	<!-- Comment pagination -->
	<?php 
		if(!comments_open()):
	?>
		<h4 class="comment-blank">
		<?php esc_html_e( 'Comments are closed.', 'campassign' ); ?>
		</h4>
	<?php
		endif;
	?>

	<!--Custom Comment form -->
	<?php 
		comment_form(array(
			
			'fields' => array(
				'author' => '<input type="text" name="name" id="name" class="form-control" placeholder="Name*" required="required">',
				'email' => '<input type="email" name="email" id="email" class="form-control" placeholder="Email*" required="required">',
				'url' => '<input type="text" name="website" id="website" class="form-control" placeholder="website">'
			),
			'comment_field' => '<textarea name="message" id="message" cols="30" rows="5" class="form-control" placeholder="Message*" required="required"></textarea>',
			'submit_button' => '<button type="submit" name="submit" class="btn-custom">Post Comment</button>',
			'class_form' => 'widget-form',
			'title_reply' => '<div class="title"><h5>Leave a Reply</h5></div>'

		));
	?>
</div>
