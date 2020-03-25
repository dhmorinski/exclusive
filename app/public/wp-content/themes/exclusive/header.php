<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://fonts.googleapis.com/css?family=Oswald:400,500&display=swap" rel="stylesheet">
<!--    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,700&display=swap" rel="stylesheet">-->
    <?php wp_head(); ?>
</head>
<body>
<div id="sidenav">
    <img src="<?= get_theme_mod('exclusive_transparent_neg_logo') ?>"
         alt="<?= get_bloginfo() . get_bloginfo('description') ?>"
         id="sidenav-logo"/>
    <div class="sidenav-menu">
        <?php exclusive_the_main_nav_links('sidenav-menu-item'); ?>
    </div>
    <div class="sidenav-contact">
        <?php exclusive_the_nav_links('contactNavLocation', true, true); ?>
    </div>
    <div class="sidenav-socials">
        <?php exclusive_the_nav_links('socialsNavLocation', 'btn btn-secondary', false, true); ?>
    </div>
</div>
<button id="show-side-nav-btn" class="hamburger hamburger--collapse" type="button"
        onclick="toggleNav()">
          <span class="hamburger-box">
            <span class="hamburger-inner"></span>
          </span>
</button>
<div id="body">
    <header>
        <div class="hidden-md-up"><?php exclusive_site_logo(); ?></div>
        <div class="header-info hidden-sm-down">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-4 col-xs-12">
                        <div class="header-info-left">
                            <?php exclusive_the_nav_links('contactNavLocation', 'btn btn-sm', true, true); ?>
                        </div>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <?php exclusive_site_logo(); ?>
                    </div>
                    <div class="col-sm-4 col-xs-12">
                        <div class="header-info-right">
                            <?php exclusive_the_nav_links('socialsNavLocation', 'btn btn-secondary btn-sm', false, true); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div id="navbar" class="menu hidden-sm-down">
        <nav class="main-nav container">
            <?php exclusive_the_main_nav_links('nav-link'); ?>
        </nav>
    </div>
