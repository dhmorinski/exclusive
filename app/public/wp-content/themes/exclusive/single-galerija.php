<?php
// Template name: Single-Galerija
get_header();

while (have_posts()) :
    the_post();

    // Get description custom field.
    $description = get_field('opis', get_the_ID());

    // Get gallery custom field.
    $gallery = get_post_meta($post->ID, 'galerija', true);
    // Get gallery field all image IDs.
    preg_match('/\[gallery.*ids=.(.*).]/', $gallery, $ids);
    $gallery_image_ids = explode(',', $ids[1]);
    ?>

    <div id="main">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url(),
            'Galerija' => site_url('galerija'),
        ]) ?>

        <div class="container-fluid">
            <div class="row">

                <?php if ($description) : ?>

                    <div class="col-md-12">
                        <div class="text-big mb-50" data-aos="fade-in"><?= $description ?></div>
                    </div>

                <?php
                endif;

                // If any images in gallery loop trough and show them.
                if ($gallery_image_ids && is_array($gallery_image_ids)) :
                    foreach ($gallery_image_ids as $image_id) :
                        $image_title = get_the_title($image_id);
                        $image_url = wp_get_attachment_image_src($image_id, 'full')[0];
                        ?>

                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6">
                            <a href="<?= $image_url ?>"
                               data-fancybox--
                               data-caption="<?= $image_title ?>"
                               class="gallery-item" data-aos="fade-up">
                                <img class="img-responsive"
                                     src="<?= wp_get_attachment_image_url($image_id, 'medium') ?>"
                                     srcset="<?= wp_get_attachment_image_srcset($image_id, 'medium') ?>"
                                     sizes="<?= wp_get_attachment_image_sizes($image_id, 'medium') ?>"
                                     alt="<?= $image_title ?>"/>
                                <div class="gallery-item-title"><?= $image_title ?></div>
                                <div class="gallery-overlay"></div>
                            </a>
                        </div>

                    <?php
                    endforeach;
                endif;
                ?>

            </div>
        </div>
    </div>

<?php
endwhile;

get_footer();

?>