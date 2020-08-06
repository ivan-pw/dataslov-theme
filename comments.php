<?php
/**
 * @package WordPress
 * @subpackage Theme_Compat
 * @deprecated 3.0.0
 *
 * This file is here for backward compatibility with old themes and will be removed in a future version
 */
_deprecated_file(
    /* translators: %s: Template name. */
    sprintf(__('Theme without %s'), basename(__FILE__)),
    '3.0.0',
    null,
    /* translators: %s: Template name. */
    sprintf(__('Please include a %s template in your theme.'), basename(__FILE__))
);

// Do not delete these lines.
if (!empty($_SERVER['SCRIPT_FILENAME']) && 'comments.php' == basename($_SERVER['SCRIPT_FILENAME'])) {
    die('Please do not load this page directly. Thanks!');
}

if (post_password_required()) {
    ?>
<p class="nocomments"><?php _e('This post is password protected. Enter the password to view comments.');?></p>
<?php
return;
}
?>

<!-- You can start editing here. -->

<?php if (have_comments()): ?>
<h3 id="comments">
  <?php
if (1 == get_comments_number()) {
    printf(
        /* translators: %s: Post title. */
        __('One response to %s'),
        get_the_title()
    );
} else {
    printf(
        /* translators: 1: Number of comments, 2: Post title. */
        _n('%1$s предложения к слову %2$s', '%1$s предложений к слову %2$s', get_comments_number()),
        number_format_i18n(get_comments_number()),
        get_the_title()
    );
}
?>
</h3>

<div class="navigation">
  <div class="alignleft"><?php previous_comments_link();?></div>
  <div class="alignright"><?php next_comments_link();?></div>
</div>

<ol class="commentlist">
  <?php wp_list_comments();?>
</ol>

<div class="navigation">
  <div class="alignleft"><?php previous_comments_link();?></div>
  <div class="alignright"><?php next_comments_link();?></div>
</div>
<?php else: // This is displayed if there are no comments so far. ?>

<?php if (comments_open()): ?>
<!-- If comments are open, but there are no comments. -->

<?php else: // Comments are closed. ?>
<!-- If comments are closed. -->
<p class="nocomments"><?php _e('Comments are closed.');?></p>

<?php endif;?>
<?php endif;?>

<?php
$args = [
    'comment_notes_after' => '',
    'id_form'             => 'commentform',
    'id_submit'           => 'submit',
    'class_form'          => 'comment-form',
    'class_submit'        => 'submit btn btn-blue',
    'name_submit'         => 'submit',
    'title_reply'         => __('Ответить'),
    'title_reply_to'      => __('Ответить на %s'),
    'title_reply_before'  => '<h5 id="reply-title" class="comment-reply-title">',
    'title_reply_after'   => '</h5>',
    'cancel_reply_before' => ' <small>',
    'cancel_reply_after'  => '</small>',
    'cancel_reply_link'   => __('Cancel reply'),
    'label_submit'        => __('Post Comment'),
    'submit_button'       => '<input name="%1$s" type="submit" id="%2$s" class="%3$s" value="%4$s" />',
    'submit_field'        => '<p class="form-submit">%1$s %2$s</p>',
    'format'              => 'xhtml',
];

comment_form($args);?>