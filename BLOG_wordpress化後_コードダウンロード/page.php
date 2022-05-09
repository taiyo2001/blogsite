<!-- header -->
<?php get_header('blog'); ?>

    <!-- menu-blog-hidden -->
    <div class="menu-blog-hidden">
        <div class="menu-blog-close-wrapper">
            <p>.MENU</p>
            <div class="menu-blog-close"><img src="<?php echo get_template_directory_uri(); ?>/img/menu-blog-close.png" alt=""></div>
        </div>

        <div class="sitemap">
            <ul class="sitemap-list" id="sitemap">
                <!-- <!– HOME –> -->
                <li class="sitemap-item-fixed"><a href="<?php echo esc_url( home_url('/') ); ?>"><span>▶</span>TOP</a></li>

                <!-- <!– 固定ページ –> -->
                <?php
                $pages = wp_list_pages('title_li=&exclude=165&link_before=<span>▶</span>');
                ?>

                <!-- <!– 投稿（カテゴリー単位） –> -->

                <!-- 歌詞和訳を表示 -->
                <?php $category = get_category(3); ?>
                <li class="sitemap-item-post"><a href="<?php echo get_category_link( $category->term_id ); ?>"><span>▶</span><?php echo $category->name; ?><span class="total-number">（全<span class="total-number2"><?php echo $category->count; ?></span>記事を見る）</span></a>

                <!-- 歌詞和訳の中に子カテゴリを表示 -->
                    <ul>
                        <?php
                        $categories = get_categories('parent=3&exclude=');
                        foreach($categories as $category) :
                        ?>
                        <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><span>・</span><?php echo $category->cat_name; ?><span class="total-number">（全<span class="total-number2"><?php echo $category->count; ?></span>記事を見る）</span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <!-- 歌詞和訳以外の直下カテゴリを表示 -->
                <?php
                $categories = get_categories('parent=0&exclude=3');
                foreach($categories as $category) :
                ?>
                <li class="sitemap-item-post"><a href="<?php echo get_category_link( $category->term_id ); ?>"><span>▶</span><?php echo $category->cat_name; ?><span class="total-number">（全<span class="total-number2"><?php echo $category->count; ?></span>記事を見る）</span></a></li>
                <?php endforeach; ?>
            </ul>
            <?php get_search_form(); ?>
        </div>
    </div>

    <!-- btt -->
    <div class="btt-blog" id="btt">↑</div>

    <!-- breadcrumb -->
    <div class="breadcrumb"><?php output_breadcrumb(); ?></div>

    <div class="wrapper">

        <!-- main -->
        <main class="main">

        <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
            <?php the_post() ?>
            <article <?php post_class('page-article'); ?>>
                <h2 class="main__ttl"><?php echo get_the_title(); ?></h2>
                <div>
                    <?php the_content(); ?>
                </div>
            </article>
            <?php endwhile; ?>       
        <?php endif; ?>

        </main>
    
        <!-- sidebar -->
        <?php get_sidebar(); ?>

    </div>

<!-- footer -->
<?php get_footer('blog'); ?>