<?php
// Template name: Single-Ponuda
get_header();

$image = get_field('slika');

while (have_posts()) :
    the_post();

    ?>

    <div id="main">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url(),
            'Ponuda' => site_url('ponuda'),
        ]) ?>

        <div class="container-fluid mb-50">
            <div class="row">

                <?php if ($image) : ?>

                    <div class="col-md-6" data-aos="fade-up-right">
                        <div class="text-big mb-50"><?php the_content(); ?></div>
                    </div>
                    <div class="col-md-6" data-aos="fade-up-left">
                        <img class="img-responsive"
                             src="<?= $image['url'] ?>"
                             srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                             sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"/>
                    </div>

                <?php else: ?>

                    <div class="col-md-12" data-aos="fade-up">
                        <div class="text-big mb-50"><?php the_content(); ?></div>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

<?php
endwhile;

get_footer();

?>