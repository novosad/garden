<?php
/**
 * Template Name: Debtors Page
 * View debtors page.
 */

// garden group
$gardens = get_post_meta(get_the_ID(), 'ga_garden_group', true);

get_header(); ?>

    <div class="content-headline">
        <h1 class="entry-headline"><span class="entry-headline-text"><?php the_title(); ?></span></h1>
        <?php minezine_get_breadcrumb(); ?>
    </div>

    <div class="entry-content">

        <?php
        if (isset($gardens) && count($gardens) > 0) { ?>
            <table class="garden_package">
                <tbody>
                <tr>
                    <th>Ф.И.О.</th>
                    <th>Период</th>
                    <th>Причина</th>
                    <th>Сумма</th>
                </tr>
                <?php foreach ($gardens as $garden) {
                    echo '<tr>';
                    echo '<td>' . $garden['garden_fio'] . '</td>';
                    echo '<td>' . $garden['garden_period'] . '</td>';
                    echo '<td>' . $garden['garden_reason'] . '</td>';
                    echo '<td>' . number_format($garden['garden_price'], 0, ' ', ' ') . ' Br. </td>';
                    echo '</tr>';
                } ?>
                </tbody>
            </table>
        <?php } else {
            echo 'Должники СТ "Золотая осень" отсуствуют ';
        }
        ?>

    </div>

    </div>
    <!-- end of content -->
<?php get_sidebar(); ?>
<?php get_footer(); ?>