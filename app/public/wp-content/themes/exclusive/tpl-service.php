<?php
// Template name: Ponuda
get_header();

while (have_posts()) :
    the_post(); ?>

    <div id="main">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url()
        ]) ?>

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-big mb-50" data-aos="fade-in">
                        <?php the_content(); ?>
                    </div>
                </div>

                <?php
                global $post;
                $child_pages = new WP_Query([
                    'post_type' => 'ponuda',
                    'orderby' => 'date DESC'
                ]);

                while ($child_pages->have_posts()) :
                    $child_pages->the_post();
                    $image = get_field('slika', get_the_ID());
                    $serviceShortText = get_field('kratki_opis', get_the_ID());
                    ?>

                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <a href="<?php the_permalink() ?>" class="service-item" data-aos="fade-up">
                            <img src="<?= $image['url'] ?>"
                                 srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                                 sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"
                                 alt="<?php the_title() ?>"/>
                            <div class="service-item-content">
                                <h5><?= get_the_title() ?></h5>
                                <p><?= $serviceShortText ?></p>
                            </div>
                        </a>
                    </div>

                <?php
                endwhile;
                wp_reset_postdata(); //remember to reset data
                ?>

            </div>
        </div>
    </div>

<?php
endwhile;

get_footer();

?>