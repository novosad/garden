<?php
/**
 * Template Name: Board Page
 * View message board.
 */

// message post
$board_args = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'DESC',
    'post_type' => 'message_board',
    'post_status' => 'publish'
);

$boards = get_posts($board_args);

get_header(); ?>
    <div class="content-headline">
        <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
        <?php minezine_get_breadcrumb(); ?>
    </div>

    <div class="entry-content">
        <?php
        if (isset($boards) && count($boards) > 0) {
            foreach ($boards as $board) : $post = $board;
                setup_postdata($post); ?>
                <div class="board_entry">
                    <div class="board_title">
                         <span class="date_board">
                             <?php echo get_the_date(); ?>
                         </span>
                         <span class="title_board">
                             <?php echo get_the_title(); ?>
                         </span>
                    </div>
                    <div class="board_content">
                        <?php echo get_the_content(); ?>
                    </div>
                </div>
                <?php wp_reset_postdata(); endforeach; ?>
        <?php }
        ?>
    </div>

    </div>
    <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>