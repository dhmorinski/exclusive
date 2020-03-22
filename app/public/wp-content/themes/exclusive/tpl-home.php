<?php
// Template name: Home
get_header();


while (have_posts()) :
    the_post();

// Homepage fields.
    $slider_id = get_field('slider');
    $entry_title = get_field('entry_title');
    $entry_text = get_field('entry_text');
    $entry_image = get_field('entry_image');
    $entry_link = get_field('entry_link');

// Contact fields.
    $contact_page = get_page_by_path('kontakt');
    $form_title = get_field('naslov_kontakt_forme', $contact_page->ID);
    $form_id = get_field('kontakt_forma', $contact_page->ID);
    $first_action_title = get_field('naslov_prve_akcije', $contact_page->ID);
    $first_action_content = get_field('sadrzaj_prve_akcije', $contact_page->ID);
    $first_action_nav = get_field('navigacija_prve_akcije', $contact_page->ID);
    $second_action_title = get_field('naslov_druge_akcije', $contact_page->ID);
    $second_action_content = get_field('sadrzaj_druge_akcije', $contact_page->ID);
    $second_action_nav = get_field('navigacija_druge_akcije', $contact_page->ID);

// Service posts.
    $services = new WP_Query([
        'post_type' => 'ponuda',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);

// Gallery posts.
    $galleries = new WP_Query([
        'post_type' => 'galerija',
        'posts_per_page' => 4,
        'orderby' => 'date',
        'order' => 'DESC'
    ]);

    ?>

    <div id="main">

        <!-- SLIDER -->
        <?php
        if ($slider_id) {
            echo do_shortcode('[smartslider3 slider=' . $slider_id . ']');
        }
        ?>

        <!-- HOMEPAGE ENTRY -->
        <?php if (($entry_title && $entry_image) || ($entry_title && $entry_text)) : ?>

            <article class="home-entry container-fluid">
                <div class="row">

                    <?php if (!$entry_image) : ?>

                        <div class="col-xs-12 text-big initFadeIn slower">
                            <h2 class="home-heading">
                                <a href="<?= site_url($entry_link) ?>"><?= $entry_title ?></a></h2>

                            <?php if ($entry_text) {
                                echo $entry_text;
                            } ?>

                        </div>

                    <?php else: ?>
                        <div class="col-lg-6 col-md-12 text-big initFadeInLeft">
                            <h2 class="home-heading">
                                <a href="<?= site_url($entry_link) ?>"><?= $entry_title ?></a></h2>

                            <?php if ($entry_text) {
                                echo $entry_text;
                            } ?>

                        </div>
                        <div class="col-lg-6 col-md-12 initFadeInRight">
                            <img src="<?= $entry_image['url'] ?>"
                                 srcset="<?= wp_get_attachment_image_srcset($entry_image['ID']) ?>"
                                 sizes="<?= wp_get_attachment_image_sizes($entry_image['ID']) ?>"
                                 alt="<?= get_the_title($entry_image->ID) ?>"
                                 class="img-responsive"/>
                        </div>

                    <?php endif; ?>

                </div>
            </article>

        <?php endif;

        // HOMEPAGE CONTENT
        if (get_the_content_feed()) : ?>

            <article class="container-fluid mb-50">
                <?php the_content(); ?>
            </article>

        <?php endif; ?>


        <!-- SERVICES -->
        <?php if ($services->posts) :
            $service_page = get_page_by_path('ponuda');
            ?>

            <article class="home-services container-fluid">
                <h2 class="home-heading initFadeIn slower">
                    <a href="<?= get_permalink($service_page) ?>"><?= $service_page->post_title ?></a>
                </h2>

                <?php if ($service_page->post_content) : ?>

                    <div class="home-heading-info initFadeIn slower"><?= $service_page->post_excerpt ?></div>

                <?php endif; ?>

                <div class="row">

                    <?php foreach ($services->posts as $key => $value) :
                        $image = get_field('slika', $value->ID);
                        $short_text = get_field('kratki_opis', $value->ID); ?>

                        <div class="col-xl-3 col-sm-6 col-xs-12">
                            <a href="<?php the_permalink($value->ID) ?>" class="service-item initFadeIn slower">
                                <img src="<?= $image['url'] ?>"
                                     srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                                     sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"/>
                                <div class="service-item-content">
                                    <h5><?= get_the_title($value->ID) ?></h5>
                                    <p><?= $short_text ?></p>
                                </div>
                            </a>
                        </div>

                    <?php endforeach; ?>

                </div>
            </article>

        <?php endif; ?>

        <!-- CONTACT FORM BLOCK -->
        <?php
        if (
            ($first_action_title || $first_action_content) ||
            ($second_action_title || $second_action_content) ||
            $form_id
        ) :
            ?>
            <article class="contact-block home-contact-block container-fluid">
                <div class="row">

                    <?php if (
                        ($first_action_title || $first_action_content) ||
                        ($second_action_title || $second_action_content)
                    ): ?>

                        <div class="col-md-6 initSlideInLeft">

                            <!-- FIRST ACTION -->
                            <?php
                            if ($first_action_title) : ?>
                                <h2 class="home-heading"><?= $first_action_title ?></h2>
                            <?php
                            endif;
                            if ($first_action_content) :
                                ?>
                                <div class="home-heading-info-big">
                                    <?= $first_action_content ?>
                                </div>
                            <?php
                            endif;
                            if ($first_action_nav) :
                                ?>
                                <?php exclusive_the_nav_links($first_action_nav, 'btn btn-primary btn-lg', true, true); ?>
                            <?php
                            endif;
                            ?>
                            <!-- SECOND ACTION -->
                            <?php
                            if ($second_action_title) : ?>
                                <h2 class="home-heading"><?= $second_action_title ?></h2>
                            <?php
                            endif;
                            if ($second_action_content) :
                                ?>
                                <div class="home-heading-info-big">
                                    <?= $second_action_content ?>
                                </div>
                            <?php
                            endif;
                            if ($second_action_nav) :
                                ?>
                                <?php exclusive_the_nav_links($second_action_nav, 'btn btn-primary btn-lg', true, true); ?>
                            <?php
                            endif;
                            ?>

                        </div>

                    <?php
                    endif;
                    if ($form_id) :
                        ?>
                        <!-- CONTACT FORM -->
                        <div class="col-md-6 initSlideInRight">
                            <div class="contact-block-right contact-form-wrap">

                                <?php if ($form_title) : ?>
                                    <h2 class="home-heading"><?= $form_title ?></h2>
                                <?php endif; ?>

                                <?= do_shortcode('[contact-form-7 id="' . $form_id . '" title="Kontakt forma"]') ?>

                            </div>
                        </div>

                    <?php endif; ?>

                </div>
            </article>
        <?php endif; ?>

        <!-- GALLERY -->
        <?php if ($galleries->posts) :
            $gallery_page = get_page_by_path('galerija');
            ?>

            <article class="home-gallery container-fluid">
                <h2 class="home-heading initFadeIn slower">
                    <a href="<?= get_permalink($gallery_page) ?>"><?= $gallery_page->post_title ?></a></h2>

                <?php if ($service_page->post_content) : ?>

                    <div class="home-heading-info initFadeIn slower"><?= $gallery_page->post_excerpt ?></div>

                <?php endif; ?>

                <div class="row">

                    <?php
                    foreach ($galleries->posts as $key => $value) :
                        $image = get_field('slika', $value->ID);
                        ?>

                        <div class="col-xl-3 col-sm-6 col-xs-12">
                            <a href="<?php the_permalink($value->ID) ?>" class="gallery-item initFadeIn slower">
                                <img src="<?= $image['url'] ?>"
                                     srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                                     sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"
                                     alt="<?= get_the_title($value->ID) ?>"
                                />
                                <div class="gallery-item-title"><?= get_the_title($value->ID) ?></div>
                                <div class="gallery-overlay"></div>
                            </a>
                        </div>

                    <?php endforeach; ?>

                </div>
            </article>

        <?php endif; ?>

    </div>

<?php
endwhile;
get_footer();
?>