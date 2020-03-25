<?php
// Template name: Single-Novosti
get_header();

$image = get_field('slika');

while (have_posts()) :
    the_post();

    ?>

    <div id="main" class="mb-50">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url(),
            'Novosti' => site_url('novosti'),
        ]) ?>

        <div class="container-fluid mt-50">
            <div class="row">
                <div class="col-md-12 content-single-page">

                    <?php if ($image) : ?>

                        <a href="<?= $image['url'] ?>"
                           data-fancybox--
                           data-caption="<?= $image['title'] ?>"
                           title="<?= $image['title'] ?>">
                            <img class="img-single-page"
                                 alt="<?= $image['title'] ?>"
                                 data-aos="fade-up-right"
                                 src="<?= $image['url'] ?>"
                                 srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                                 sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"/>
                        </a>

                    <?php endif; ?>

                    <div class="text-big content-single-page mb-50" data-aos="fade-in"><?php the_content(); ?></div>
                </div>
            </div>
        </div>
    </div>

<?php
endwhile;

get_footer();

?>