<?php
/**
 * @package WordPress
 * @subpackage Default_Theme
 */

// Do not delete these lines
	if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']))
		die ('Please do not load this page directly. Thanks!');

	if ( post_password_required() ) { ?>
		<p class="alert">This post is password protected. Enter the password to view comments.</p>
	<?php
		return;
	}
?>

<!-- You can start editing here. -->

<section class="well">
<?php if ( have_comments() ) : ?>
	<h2><?php comments_number('No Responses', 'One Response', '% Responses' );?></h2>

	<ol class="commentlist">
	  <?php wp_list_comments(); ?>
	</ol>

 <?php else : // this is displayed if there are no comments so far ?>

	<?php if ('open' == $post->comment_status) : ?>
		<!-- If comments are open, but there are no comments. -->

	 <?php else : // comments are closed ?>
		<!-- If comments are closed. -->
		<p class="nocomments">Comments are closed.</p>

	<?php endif; ?>
<?php endif; ?>


<?php if ('open' == $post->comment_status) : ?>

	<form class="form form-horizontal" action="<?php echo get_option('siteurl'); ?>/wp-comments-post.php" method="post" id="commentform">
		
		<fieldset>
			<legend>Leave a Reply</legend>
			
		<?php if ( get_option('comment_registration') && !$user_ID ) : ?>
			<p class="alert">You must be <a href="<?php echo get_option('siteurl'); ?>/wp-login.php?redirect_to=<?php echo urlencode(get_permalink()); ?>">logged in</a> to post a comment.</p>
		<?php else : ?>
		
			<div class="cancel-comment-reply">
				<small><?php cancel_comment_reply_link(); ?></small>
			</div>
				
		<?php if ( $user_ID ) : ?>
		
		<p class="alert alert-info">Logged in as <a href="<?php echo get_option('siteurl'); ?>/wp-admin/profile.php"><?php echo $user_identity; ?></a>. <a href="<?php echo wp_logout_url(get_permalink()); ?>" title="Log out of this account">Log out &raquo;</a></p>

		<?php else : ?>
			<div class="control-group">
				<label class="control-label" for="author">Name <?php if ($req) echo "(required)"; ?></label>
				<div class="controls">
					<input type="text" name="author" id="author" class="span5" value="<?php echo $comment_author; ?>" tabindex="1" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>
			</div>
			
			
			<div class="control-group">
				<label class="control-label" for="email">Email (will not be published) <?php if ($req) echo "(required)"; ?></label>
				<div class="controls">
					<input type="text" name="email" id="email" class="span5" value="<?php echo $comment_author_email; ?>" tabindex="2" <?php if ($req) echo "aria-required='true'"; ?> />
				</div>
			</div>
			
			<div class="control-group">
				<label class="control-label" for="url">Website</label>
				<div class="controls"><input class="input-large" class="span5" type="text" name="url" id="url" value="<?php echo $comment_author_url; ?>" tabindex="3" /></div>
			</div>
	
	<?php endif; ?>
	
			<!--<p><small><strong>XHTML:</strong> You can use these tags: <code><?php echo allowed_tags(); ?></code></small></p>-->
			
			<div class="control-group">
				<label class="control-label" for="comment">Message</label>
				<div class="controls"><textarea name="comment" id="comment" class="span5" rows="10" tabindex="4"></textarea></div>
			</div>
		</fieldset>
		
		<div class="form-actions">
			<button class="btn btn-primary bt-large" type="submit" id="submit" tabindex="5">Submit Comment</button>
		</div>
		<?php comment_id_fields(); ?>
		<?php do_action('comment_form', $post->ID); ?>
		
		</form>

<?php endif; // If registration required and not logged in ?>
</section>

<?php endif; // if you delete this the sky will fall on your head ?>
