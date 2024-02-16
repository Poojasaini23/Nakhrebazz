<div class="comments container">
    <?php if (post_password_required()) : ?>
    <p><?php _e( 'Post is password protected. Enter the password to view any comments.', 'html5blank' ); ?></p>
<?php return; endif; ?>
    <ul>
        <?php
        $comments = get_comments(array(
            'post_id' => get_the_ID(),
            'status' => 'approve' //Change this to the type of comments to be displayed
        ));

        //Display the list of comments
        wp_list_comments(array(
            'avatar_size'=> 50,
            'per_page' => 10, //Allow comment pagination
            'reverse_top_level' => false //Show the oldest comments at the top of the list
        ), $comments);

        ?>

    </ul>
<?php //elseif ( ! comments_open() && ! is_page() && post_type_supports( get_post_type(), 'comments' ) ) : ?>
    <p><?php //_e( 'Comments are closed here.', 'html5blank' ); ?></p>
<?php //endif; ?>
<?php comment_form(); ?>
</div>
