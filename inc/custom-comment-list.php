<?php
if( ! function_exists( 'custom_comment_list' ) ):
function custom_comment_list($comment, $args, $depth) {
?>
<ul class="widget-comments">
  <li class="comment-item" id="li-comment-<?php comment_ID() ?>">
    <?php if ($comment->comment_approved == '0') : ?>
    <em><?php esc_html_e('Your comment is awaiting moderation.','5balloons_theme') ?></em>
    <br />
    <?php endif; ?>
    <?php echo get_avatar($comment,$size='80',$default='http://0.gravatar.com/avatar/36c2a25e62935705c5565ec465c59a70?s=32&d=mm&r=g' ); ?>
    <div class="content">
      <ul class="info list-inline">
        <li><?php echo get_comment_author(); ?></li>
        <li class="dot"></li>
        <li><?php echo get_comment_date(); ?></li>
      </ul>
      <p>
        <?php comment_text() ?>
      </p>
      <div>
        <span class="link">
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth'], 'reply_text' => '<i class="arrow_back"></i> reply'))) ?>
        </span>
      </div>
    </div>
  </li>
</ul>
<?php
}
endif;