<?php 
//echo 'den test';

if ( have_comments() ) : ?>
		<h3 id="comments">
		
			<?php
				printf( _n( 'One Comment', '%1$s Comment ', get_comments_number(), 'mtcframework' ),
					number_format_i18n( get_comments_number() ), '' );
			?>
		</h3> 

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-above">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'mtcframework' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'mtcframework' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'mtcframework' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<ol class="commentlist">
			<?php
				/* Loop through and list the comments. Tell wp_list_comments()
				 * to use mtcframework_comment() to format the comments.
				 * If you want to overload this in a child theme then you can
				 * define mtcframework_comment() and that will be used instead.
				 * See mtcframework_comment() in mtcframework/functions.php for more.
				 */
				/* wp_list_comments(  ); */
				wp_list_comments( array( 
					'callback' => 'mtc_comments'
				) );
			?>
		</ol>

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
		<nav id="comment-nav-below">
			<h1 class="assistive-text"><?php _e( 'Comment navigation', 'mtcframework' ); ?></h1>
			<div class="nav-previous"><?php previous_comments_link( __( '&larr; Older Comments', 'mtcframework' ) ); ?></div>
			<div class="nav-next"><?php next_comments_link( __( 'Newer Comments &rarr;', 'mtcframework' ) ); ?></div>
		</nav>
		<?php endif; // check for comment navigation ?>

		<?php
		/* If there are no comments and comments are closed, let's leave a little note, shall we?
		 * But we only want the note on posts and pages that had comments in the first place.
		 */
		if ( ! comments_open() && get_comments_number() ) : ?>
		<p class="nocomments"><?php _e( 'Comments are closed.' , 'mtcframework' ); ?></p>
		<?php endif; ?>

<?php endif; // have_comments() ?>
	
<?php 
	$required_text	= '';
	$req 			= get_option( 'require_name_email' );
	$aria_req 		= ( $req ? " aria-required='true'" : '' );
	$comments_args 	= array(
		'id_form' 			=> 'commentform',
		'id_submit' 		=> 'submit',
		'title_reply' 		=> __( 'Your Commment','mtcframework' ),
		'title_reply_to' 	=> __( 'Leave a Reply to %s','mtcframework' ),
		'cancel_reply_link' => __( 'Cancel Reply','mtcframework' ),
		'label_submit' 		=> __( 'Comment' ,'mtcframework'),
		'comment_field' 	=> '<p><textarea name="comment" id="comment" cols="100" rows="10" tabindex="4"></textarea></p>',
		'must_log_in' 		=> '<p class="must-log-in">' .  sprintf( __( 'You must be <a href="%s">logged in</a> to post a comment.','mtcframework' ), wp_login_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'logged_in_as' 		=> '<p class="logged-in-as">' . sprintf( __( 'Logged in as <a href="%1$s">%2$s</a>. <a href="%3$s" title="Log out of this account">Log out?</a>' ,'mtcframework'), admin_url( 'profile.php' ), $user_identity, wp_logout_url( apply_filters( 'the_permalink', get_permalink( ) ) ) ) . '</p>',
		'comment_notes_before' 	=> '<p class="comment-notes">' . __( 'Email (will not be published)','mtcframework' ) . ( $req ? $required_text : '' ) . '</p>',
		'comment_notes_after' 	=> '',
		'fields' => apply_filters( 'comment_form_default_fields', array(
			'author' => '<p class="comment-form-author"><label for="author">' . __( 'Name','mtcframework' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input name="author" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" size="22" tabindex="1" type="text" ' . $aria_req . '> </p>',
			'email' => '<p class="comment-form-email"><label for="email">' . __( 'Email','mtcframework' ) . ( $req ? ' <span class="required">*</span>' : '' ) . '</label><input name="email" id="email" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" size="22" ' . $aria_req . ' tabindex="2" type="text" ' . $aria_req . '> </p>',
			'url' 	=> '<p class="comment-form-url"><label for="url">' . __( 'Website','mtcframework' ) . '</label><input name="url" id="url" value="' . esc_attr( $commenter['comment_author_url'] ) . '" size="22" tabindex="3" type="text" ></p>' ) ) 
	);

comment_form($comments_args);

?>