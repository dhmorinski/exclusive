<?php
// Template name: O nama
get_header();

while (have_posts()) {
    the_post(); ?>

    <div id="main">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url()
        ]) ?>

        <?php if (get_the_content()) : ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-big mb-50 initFadeIn slower">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <?php
        global $post;
        $child_pages_query_args = array(
            'post_type' => 'o_nama',
            'orderby' => 'date',
            'order' => 'DESC'
        );

        $child_pages = new WP_Query($child_pages_query_args);

        $counter = get_the_content() ? 2 : 1;
        while ($child_pages->have_posts()) :
            $child_pages->the_post();
            $image = get_field('slika', get_the_ID());
            $bgClass = $counter % 2 === 0 ? 'content-bg-grey' : 'content-bg-white';
            ?>

            <div class="container-fluid <?= $bgClass ?>">
                <div class="row">

                    <?php if ($image) : ?>

                        <div class="col-md-6 initFadeInLeft">
                            <h2 class="home-heading"><?php the_title() ?></h2>
                            <div class="text-big mb-50"><?php the_content(); ?></div>
                        </div>
                        <div class="col-md-6 initFadeInRight">
                            <img class="img-responsive"
                                 src="<?php echo wp_get_attachment_image_url($image['ID']) ?>"
                                 srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                                 sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"
                                 alt="<?= $image['title'] ?>"/>
                        </div>

                    <?php else : ?>

                        <div class="col-md-12 initFadeIn slower">
                            <h2 class="home-heading"><?php the_title() ?></h2>
                            <div class="text-big mb-50"><?php the_content(); ?></div>
                        </div>

                    <?php endif; ?>
                </div>
            </div>

            <?php
            $counter++;
        endwhile;
        wp_reset_postdata(); //remember to reset data
        ?>

    </div>

    <?php
}

get_footer();

?>