<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('chrset'); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        <?php if( is_single() ) {
            $display = 'block';
        }else{
            $display = 'none';
        } ?>
        .connection-article {
            display: <?php echo $display ?>;
        }
        /* .connection-article {
            display: block;
        } */

    </style>

    <title><?php bloginfo('name'); ?></title>
    <link rel="icon" href="<?php echo get_template_directory_uri(); ?>/img/男の子アイコン.jpg" id="favicon">
    <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon-180x180.png">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>

    <!-- header -->
    <header class="blog-header" id="header">

        <div class="blog-header__wrapper-top">
            <h1 class="blog-header__logo"><a href="<?php echo esc_url( home_url('/') ); ?>" class="blog-header__logo_link"><span>K-POP</span>で<span>ハングル習得</span>レッスン<img src="<?php echo get_template_directory_uri(); ?>/img/ハート.png" alt=""></a></h1>
            <div class="menu-blog-open"><img src="<?php echo get_template_directory_uri(); ?>/img/menu-blog-open.png" alt=""></div>
        </div>

        <div class="blog-header__wrapper-bottom">
            <!-- カスタムメニューの登録 -->
            <?php
                wp_nav_menu(
                    array(
                        'theme_location'  => 'globalnav',
                        'container'       => 'nav',
                        'container_class' => 'blog-header__nav',
                        'container_id'    => 'global__nav',
                        'menu_class'      => 'blog-header__nav-list',
                    )
                );
            ?>
            <!-- <nav id="global-nav" class="blog-header__nav">
                <ul class="blog-header__nav-list">
                    <li class="blog-header__nav-item"><a id="header-to-top" href="#top" class="blog-header__nav-link"><img src="<?php echo get_template_directory_uri(); ?>/img/email-before.png" alt=""><p>top</p></a></li>
                    <li class="blog-header__nav-item"><a id="header-to-about" href="#about" class="blog-header__nav-link"><img src="<?php echo get_template_directory_uri(); ?>/img/email-before.png" alt=""><p>top</p></a></li>
                    <li class="blog-header__nav-item"><a id="header-to-service" href="#service" class="blog-header__nav-link"><img src="<?php echo get_template_directory_uri(); ?>/img/email-before.png" alt=""><p>top</p></a></li>
                    <li class="blog-header__nav-item"><a id="header-to-work" href="#work" class="blog-header__nav-link link-animation"><img src="<?php echo get_template_directory_uri(); ?>/img/email-before.png" alt=""><p>top</p></a></li>
                    <li class="blog-header__nav-item"><a id="header-to-contact" href="#contact" class="blog-header__nav-link link-animation"><img src="<?php echo get_template_directory_uri(); ?>/img/email-before.png" alt=""><p>top</p></a></li>
                </ul>
            </nav> -->
        </div>
    </header>