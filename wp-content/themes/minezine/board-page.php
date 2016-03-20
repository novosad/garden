<?php
/**
 * Template Name: Board Page
 * View message board.
 */

// message post
$board_args = array(
    'posts_per_page' => -1,
    'orderby' => 'date',
    'order' => 'ASC',
    'post_type' => 'board',
    'post_status' => 'publish'
);

$boards = get_posts($board_args);

function trim_text($str, $size, $link)
{
    $trim_content = mb_substr($str, 0, mb_strrpos(mb_substr($str, 0, $size, 'utf-8'), ' ', utf - 8), 'utf-8');
    echo $trim_content.'...';
    ?>
    <br/>
    <a href="<?php echo $link->guid; ?>">Читать дальше</a>
<?php }

get_header(); ?>
    <div class="content-headline">
        <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
        <?php minezine_get_breadcrumb(); ?>
    </div>

    <div class="entry-content">
        <?php

if (isset($boards) && count($boards) > 0) {
    foreach ($boards as $board) : $post = $board;
        setup_postdata($post);
        ?>
        <div class="board_entry">
            <div class="board_title">
                         <span class="title_board">
                             <?php echo get_the_title(); ?>
                         </span>
                         <span class="date_board">
                             <?php echo get_the_date(); ?>
                         </span>
            </div>
            <div class="board_content">
                <?php trim_text(get_the_content(), 50, $board); ?>
            </div>
        </div>
        <?php
        wp_reset_postdata();
        endforeach;
        ?>
<?php }
?>
    </div>

    </div>
    <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>