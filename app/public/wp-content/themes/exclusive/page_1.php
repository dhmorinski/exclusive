<?php

get_header();

while (have_posts()) :
    the_post(); ?>
    <!-- PAGE HEADER AND BREADCRUMBS -->
    <?php exclusive_the_page_header(get_the_title(), [
    'Naslovnica' => site_url()
]) ?>

    <div class="main">
        <div class="container">
            <?php the_content(); ?>
            <?php
            global $post;
            $child_pages_query_args = array(
                'post_type' => 'page',
                'post_parent' => $post->ID,
                'orderby' => 'date DESC'
            );

            $child_pages = new WP_Query($child_pages_query_args);

            while ($child_pages->have_posts()) :
                $child_pages->the_post(); ?>

                <div class="row">
                    <div class="col-md-12">
                        <h2><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h2>
                        <div><?php the_excerpt(); ?></div>
                    </div>
                </div>
            <?php
            endwhile;
            wp_reset_postdata(); //remember to reset data
            ?>


        </div>
    </div>

<?php
endwhile;

get_footer();

?>