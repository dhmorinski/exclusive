<?php
// Template name: Galerija
get_header();

while (have_posts()) {
    the_post(); ?>

    <div id="main">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url()
        ]) ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-big mb-50 initFadeIn slower">
                        <?php the_content(); ?>
                    </div>
                </div>
                <?php
                global $post;
                $child_pages = new WP_Query([
                    'post_type' => 'galerija',
                    'orderby' => 'date DESC'
                ]);


                while ($child_pages->have_posts()) {
                    $child_pages->the_post();
                    $image = get_field('slika', get_the_ID());
                    $serviceShortText = get_field('kratki_opis', get_the_ID());
                    ?>

                    <div class="col-xl-3 col-sm-6 col-xs-12">
                        <a href="<?php the_permalink() ?>" class="gallery-item initFadeIn slower">
                            <img src="<?= $image['url'] ?>"
                                 srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                                 sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"
                                 alt="<?php the_title() ?>"/>
                            <div class="gallery-item-title"><?php the_title() ?></div>
                            <div class="gallery-overlay"></div>
                        </a>
                    </div>

                <?php }
                wp_reset_postdata(); //remember to reset data
                ?>

            </div>
        </div>
    </div>

    <?php
}

get_footer();

?>