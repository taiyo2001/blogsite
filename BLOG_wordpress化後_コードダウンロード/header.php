<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('chrset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TAIYO PORTFOLIO</title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon.ico" id="favicon">
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-180x180.png">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- loading -->
    <div class="loading" id="loading">
        <div class="loader" id="loader">

            <p class="loader-txt">Now Loading...</p>
        </div>
    </div>

    <!-- hamburger -->
    <div class="hamburger">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ham_before.png" alt="" class="ham-before">
        <img src="<?php echo get_template_directory_uri(); ?>/img/ham_after.png" alt="" class="ham-after">
    </div>

    <!-- btt -->
    <div class="btt" id="btt">
        <p class="btt-txt">back to top</p>
        <p class="btt-click">click</p>
    </div>

    <div class="page-wrapper">

        <!-- header -->
        <header class="header" id="top">
            <h1 class="header__logo logo"><a href="" class="header__logo_link logo-link">TAIYO folio</a></h1>
            <nav id="global-nav" class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__nav-item"><a id="header-to-top" href="#top" class="header__nav-link link-animation">top</a></li>
                    <li class="header__nav-item"><a id="header-to-about" href="#about" class="header__nav-link link-animation">it's me</a></li>
                    <li class="header__nav-item"><a id="header-to-service" href="#service" class="header__nav-link link-animation">service</a></li>
                    <li class="header__nav-item"><a id="header-to-work" href="#work" class="header__nav-link link-animation">work</a></li>
                    <li class="header__nav-item"><a id="header-to-contact" href="#contact" class="header__nav-link link-animation">contact</a></li>
                </ul>
            </nav>
        </header>