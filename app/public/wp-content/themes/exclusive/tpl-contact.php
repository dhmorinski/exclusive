<?php
// Template name: Kontakt
get_header();


while (have_posts()) :
    the_post();
// Custom Contact fields.
    $form_title = get_field('naslov_kontakt_forme');
    $form_id = get_field('kontakt_forma');
    $first_action_title = get_field('naslov_prve_akcije');
    $first_action_content = get_field('sadrzaj_prve_akcije');
    $first_action_nav = get_field('navigacija_prve_akcije');
    $second_action_title = get_field('naslov_druge_akcije');
    $second_action_content = get_field('sadrzaj_druge_akcije');
    $second_action_nav = get_field('navigacija_druge_akcije');

    ?>

    <div id="main"
         class="mb-50">
        <!-- PAGE HEADER AND BREADCRUMBS -->
        <?php exclusive_the_page_header(get_the_title(), [
            'Naslovnica' => site_url()
        ]) ?>

        <?php if (get_the_content()) : ?>

            <div class="container-fluid mt-50">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-big mb-50"
                             data-aos="fade-in">
                            <?php the_content(); ?>
                        </div>
                    </div>
                </div>
            </div>

        <?php endif; ?>

        <div class="contact-block container-fluid">
            <div class="row">

                <?php if (
                    ($first_action_title || $first_action_content) ||
                    ($second_action_title || $second_action_content)
                ): ?>

                    <div class="col-lg-4 col-md-6">

                        <!-- FIRST ACTION -->
                        <?php
                        if ($first_action_title) : ?>
                            <h2 class="home-heading"
                                data-aos="fade-right">
                                <?= $first_action_title ?>
                            </h2>
                        <?php
                        endif;
                        if ($first_action_content) :
                            ?>
                            <div class="home-heading-info-big"
                                 data-aos="fade-right">
                                <?= $first_action_content ?>
                            </div>
                        <?php
                        endif;
                        if ($first_action_nav) :
                            ?>
                            <div data-aos="zoom-in"
                                 data-aos-delay="500">
                                <?php exclusive_the_nav_links($first_action_nav, 'btn btn-primary', true, true); ?>
                            </div>
                        <?php
                        endif;
                        ?>
                    </div>
                    <div class="col-lg-4 col-md-6">
                        <!-- SECOND ACTION -->
                        <?php
                        if ($second_action_title) : ?>
                            <h2 class="home-heading"
                                data-aos="fade-right">
                                <?= $second_action_title ?>
                            </h2>
                        <?php
                        endif;
                        if ($second_action_content) :
                            ?>
                            <div class="home-heading-info-big"
                                 data-aos="fade-right">
                                <?= $second_action_content ?>
                            </div>
                        <?php
                        endif;
                        if ($second_action_nav) :
                            ?>
                            <div data-aos="zoom-in"
                                 data-aos-delay="500">
                                <?php exclusive_the_nav_links($second_action_nav, 'btn btn-primary', false, true); ?>
                            </div>
                        <?php
                        endif;
                        ?>

                    </div>

                <?php
                endif;
                if ($form_id) :
                    ?>
                    <!-- CONTACT FORM -->
                    <div class="col-lg-4 col-md-6">
                        <div class="contact-block-right contact-form-wrap" data-aos="fade-up-left">

                            <?php if ($form_title) : ?>
                                <h2 class="home-heading"><?= $form_title ?></h2>
                            <?php endif; ?>

                            <?= do_shortcode('[contact-form-7 id="' . $form_id . '" title="Kontakt forma"]') ?>

                        </div>
                    </div>

                <?php endif; ?>

            </div>
        </div>
    </div>

<?php
endwhile;

get_footer();

?>