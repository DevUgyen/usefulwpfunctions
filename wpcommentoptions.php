<?php 
function remove_comment_url($arg) {
	$arg['url'] = '';
	return $arg;
}
 
add_filter('comment_form_default_fields', 'remove_comment_url');

function good_comment_policy($arg) {
	$arg['comment_notes_before'] = '<p class="comment-policy">We are glad you have chosen to leave a comment. Please keep in mind that comments are moderated according to our <a href="https://nepaleseinfinland/comment-policy-page/" style="text-decoration: underline;">comment policy</a>.</p>';
	return $arg;
}
add_filter('comment_form_defaults', 'good_comment_policy');

function move_comment_form_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	unset( $fields['comment'] );
	$fields['comment'] = $comment_field;
	return $fields;
}
add_filter( 'comment_form_fields', 'move_comment_form_to_bottom');
