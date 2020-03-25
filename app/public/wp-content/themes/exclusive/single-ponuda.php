<?php
// Template name: Single-Ponuda
get_header();

$image = get_field('slika');

while (have_posts()) :
    the_post();

    ?>

    <div id="main" class="mb-50">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url(),
            'Ponuda' => site_url('ponuda'),
        ]) ?>

        <div class="container-fluid mt-50">
            <div class="row">
                <div class="col-md-12">

                    <?php if ($image) : ?>

                        <img class="img-single-page"
                             data-aos="fade-up-right"
                             src="<?= $image['url'] ?>"
                             srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                             sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"/>

                    <?php endif; ?>

                    <div class="text-big mb-50" data-aos="fade-up"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    </div>

<?php
endwhile;

get_footer();

?>