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
                $pages = wp_list_pages('title_li=&exclude=&link_before=<span>▶</span>');
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

            <article class="page404">
                <h2 class="page404-ttl">404 NOT FOUND<br>お探しのページは見つかりませんでした</h2>
                <p>
                    読者様がお探しのページは、削除されたか、アドレスが変更された可能性があります。<br>
                    お手数ですが、下記サイトマップより目的のページをお探しください。<br>
                    また、ブックマークを登録されている場合は、お手数ですが設定の変更をお願いいたします。<br>
                </p>
                <a class="button-to-top" href="<?php echo esc_url( home_url('/') ); ?>">TOPに戻る</a>
            </article>

            <article class="site-map">
                <h2 class="main__ttl">SITE MAP</h2>

                <div class="sitemap">

                    <ul class="sitemap-list" id="sitemap">
                        <!-- <!– HOME –> -->
                        <li class="sitemap-item-fixed"><a href="<?php echo esc_url( home_url('/') ); ?>"><span>▶</span>TOP</a></li>

                        <!-- <!– 固定ページ –> -->
                        <?php
                        $pages = wp_list_pages('title_li=&exclude=165&link_before=<span>▶</span>');
                        // $pages = str_replace('<li class="', '<li class="sitemap-item-fixed ', $pages);
                        // $pages = str_replace('">', '"><span>▶</span>', $pages);
                        // echo $pages;
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
                                
                                <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><span>・</span><?php echo $category->cat_name; ?><span class="total-number">（全<span class="total-number2"><?php echo $category->count; ?></span>記事を見る）</span></a>
                                    <ul>
                                    <?php
                                    $categorylist = array(
                                    'cat' => $category->cat_ID,
                                    'posts_per_page' => 3,
                                    'post__not_in' => array(),
                                    );
                                    ?>
                                    <?php
                                    query_posts($categorylist);
                                    if (have_posts()) : while (have_posts()) : the_post();
                                    ?>
                                        <li class="post"><a href="<?php echo get_the_permalink(); ?>"><?php the_title(); ?></a></li>
                                    <?php endwhile; endif; wp_reset_query(); ?>
                                    </ul>
                                </li>
                                <?php endforeach; ?>
                            </ul>
                        </li>

                        <!-- 歌詞和訳以外の直下カテゴリを表示 -->
                        <?php
                        $categories = get_categories('parent=0&exclude=3');
                        foreach($categories as $category) :
                        ?>
                        <li class="sitemap-item-post"><a href="<?php echo get_category_link( $category->term_id ); ?>"><span>▶</span><?php echo $category->cat_name; ?><span class="total-number">（全<span class="total-number2"><?php echo $category->count; ?></span>記事を見る）</span></a>
                            <ul>
                            <?php
                            $categorylist = array(
                            'cat' => $category->cat_ID,
                            'posts_per_page' => 5,
                            'post__not_in' => array(),
                            );
                            ?>
                            <?php
                            query_posts($categorylist);
                            if (have_posts()) : while (have_posts()) : the_post();
                            ?>
                                <li class="post"><a href="<?php echo get_the_permalink(); ?>"><span>・</span><?php the_title(); ?></a></li>
                            <?php endwhile; endif; wp_reset_query(); ?>
                            </ul>
                        </li>
                        <?php endforeach; ?>
                    </ul>
                </div>

            </article>

        <?php if(have_posts()): ?>
            <?php while(have_posts()): ?>
            <?php the_post() ?>
            <article <?php post_class(); ?>>
                <h2><?php echo get_the_title(); ?></h2>
                <?php if(has_post_thumbnail()): ?>
                    <img src="<?php echo get_the_post_thumbnail_url('','thumbnail'); ?>" alt="<?php echo get_the_title(); ?>">
                <?php else: ?>
                    <img src="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-180x180.png" alt="<?php echo get_the_title(); ?>">
                <?php endif; ?>

                <div>
                    <?php the_content(); ?>
                </div>


            </article>

            <?php endwhile; ?>

            <nav>

            </nav>

            <?php the_post_navigation(); ?>
        
        <?php endif; ?>
        
    

        </main>
    
        <!-- sidebar -->
        <?php get_sidebar(); ?>

    </div>

<!-- footer -->
<?php get_footer('blog'); ?>