<?php
// Template name: O nama
get_header();

while (have_posts()) :
    the_post();
    $child_pages = new WP_Query(
        ['post_type' => 'o_nama',
            'orderby' => 'date',
            'order' => 'DESC'
        ]);
    ?>

    <div id="main">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url()
        ]) ?>


        <?php if (get_the_content()) : ?>
            <div class="container-fluid bg-white">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-big"
                             data-aos="fade-in">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
        $counter = get_the_content() ? 2 : 1;
        while ($child_pages->have_posts()) :
            $child_pages->the_post();
            $image = get_field('slika', get_the_ID());
            $bgClass = $counter % 2 === 0 ? 'bg-gray' : 'bg-white';
            ?>

            <div class="container-fluid <?= $bgClass ?>">
                <div class="row">

                    <div class="col-md-12">

                        <?php if ($image) : ?>

                            <a href="<?= $image['url'] ?>"
                               data-fancybox--
                               data-caption="<?= $image['title'] ?>"
                               title="<?= $image['title'] ?>">
                                <img class="img-single-page"
                                     data-aos="fade-up-right"
                                     src="<?php echo wp_get_attachment_image_url($image['ID']) ?>"
                                     srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                                     sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"
                                     alt="<?= $image['title'] ?>"/>
                            </a>

                        <?php endif; ?>

                        <h2 class="home-heading" data-aos="fade-up"><?php the_title() ?></h2>
                        <div class="text-big" data-aos="fade-up"><?php the_content(); ?></div>
                    </div>

                </div>
            </div>

            <?php
            $counter++;
        endwhile;
        wp_reset_postdata(); //remember to reset data
        ?>

    </div>

<?php
endwhile;

get_footer();

?>