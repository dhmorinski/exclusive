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

        <div class="container-fluid">
            <div class="row">

                <?php if (get_the_content()) : ?>
                    <div class="col-md-<?= $child_pages ? '6' : '12' ?>">
                        <div>
                            <div class="text-big" data-aos="fade-in">
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                <?php endif; ?>

                <?php
                $counter = get_the_content() ? 2 : 1;
                while ($child_pages->have_posts()) :
                    $child_pages->the_post();
                    $image = get_field('slika', get_the_ID());
                    $bgClass = $counter % 2 === 0 ? 'content-bg-grey' : 'content-bg-white';
                    ?>

                    <?php if ($image) : ?>

                    <div class="col-md-6" data-aos="fade-up">
                        <img class="img-responsive mb-50"
                             src="<?php echo wp_get_attachment_image_url($image['ID']) ?>"
                             srcset="<?= wp_get_attachment_image_srcset($image['ID']) ?>"
                             sizes="<?= wp_get_attachment_image_sizes($image['ID']) ?>"
                             alt="<?= $image['title'] ?>"/>
                    </div>

                    <div class="col-md-6" data-aos="fade-up">
                        <div>
                            <h2 class="home-heading"><?php the_title() ?></h2>
                            <div class="text-big"><?php the_content(); ?></div>
                        </div>
                    </div>

                <?php else : ?>

                    <div class="col-md-6" data-aos="fade-up">
                        <div>
                            <h2 class="home-heading"><?php the_title() ?></h2>
                            <div class="text-big"><?php the_content(); ?></div>
                        </div>
                    </div>

                <?php
                endif;
                    $counter++;
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