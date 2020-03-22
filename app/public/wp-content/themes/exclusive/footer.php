<footer>
    <div class="container-fluid">
        <img src="<?= get_theme_mod('exclusive_transparent_neg_logo') ?>"
             alt="<?= get_bloginfo() . get_bloginfo('description') ?>"
             class="footer-logo initFadeIn slower"/>
        <div class="footer-menu">
            <?php exclusive_the_nav_links('mainNavLocation', 'nav-link'); ?>
        </div>
    </div>
    <div class="container-fluid copyright">
        <div class="row">
            <div class="col-sm-8">
                <div class=copyright-left>
                    <span style="white-space: pre;">&copy; Copyright</span> 2020 EXCLUSIVE Catering & Special Events,
                    All
                    rights
                    reserved.
                </div>
            </div>
            <div class="col-sm-4">
                <div class="copyright-right">Izradio <a href="mailto:denishmorinski@gmail.com">Denis Hmorinski</a>
                </div>
            </div>
        </div>
    </div>
</footer>
</div>

<?php wp_footer(); ?>

</body>
</html>