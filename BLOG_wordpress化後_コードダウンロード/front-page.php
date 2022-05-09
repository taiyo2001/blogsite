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

    <!-- mv -->
    <div class="blog-mv">
        <div class="blog-mv__copy-wrapper">
            <p class="blog-mv__copy">
                好きなK-POPの歌詞を訳しています<br>
                韓国語の学習を兼ねてサイトを更新してます<br>
                リクエストはお問い合わせからお願いします<br>
            </p>
        </div>
        <img src="<?php echo get_template_directory_uri(); ?>/img/韓国国旗.jpg" alt="" class="blog-mv__img">
    </div>

    <!-- breadcrumb -->
    <div class="breadcrumb"><?php output_breadcrumb(); ?></div>

    <div class="wrapper">

        <!-- main -->
        <main class="main">

            <article class="main__item">
                <h2 class="main__ttl">新着記事</h2>
                <ul class="main__new-list list-s">

                <?php
                $query = new WP_Query(array(
                'post_type' => "post",
                'order' => 'desc',
                'posts_per_page' => 9,
                ));
                ?>

                <?php if($query -> have_posts()): ?>
                        <?php while($query -> have_posts()): ?>
                            <?php $query -> the_post(); ?>

                            <!-- 記事が入ります -->
                            <li <?php post_class(); ?>>
                                
                                <a href="<?php echo get_the_permalink(); ?>">

                                    <div class="img-container">
                                        <?php
                                        $categories = get_the_category();
                                        foreach( $categories as $category ){
                                            $cat_id = $category->term_id;
                                            $cat_child = get_term_children( $cat_id, 'category' );
                                            if( !$cat_child ){
                                                echo '<span>' . $category->name . '</span>';
                                                break;
                                            }
                                        }
                                        ?>
                                        <?php if(has_post_thumbnail()): ?>
                                        <img src="<?php echo get_the_post_thumbnail_url('','thumbnail'); ?>" alt="<?php echo get_the_title(); ?>">
                                        <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="<?php echo get_the_title(); ?>">
                                        <?php endif; ?>
                                    </div>

                                    
                                    <div>
                                        <div>
                                            <time><img src="<?php echo get_template_directory_uri(); ?>/img/time.png" alt="投稿日"><?php echo get_the_time('Y.n.j') ?></time>
                                        </div>
                                        <h3><?php echo get_the_title(); ?></h3>
                                    </div>
                                </a>

                                <!-- '&nbsp;' -->
                            </li>

                        <?php endwhile; ?>

                    <?php else: ?>
                        <p>当てはまる情報がまだありません</p>
                    <?php endif; ?>
                <?php wp_reset_postdata(); ?>


                </ul>

                <!-- ページネーション -->
                <div class="page-nation">
                    <ul class="page-nation-list">
                        <li class="page-nation-item">

                        </li>
                    </ul>
                </div>

                <a href="<?php echo get_permalink(58); ?>" class="button">もっと見る</a>

                
            </article>

            <article class="main__item">
                <h2 class="main__ttl">人気記事</h2>
                <ul class="main__popular-list list-L">

                <?php
                    $args = array(
                    'post_type' => 'post',
                    'meta_key' => 'post_views_count',
                    'orderby' => 'meta_value_num',
                    'posts_per_page' => 5,
                    'order'=>'DESC',
                    );
                    $the_view_query = new WP_Query( $args );
                    if ($the_view_query->have_posts()):
                        while($the_view_query->have_posts()): $the_view_query->the_post();
                ?>
                    <!-- 記事の表示 -->
                    <li class="main__populr-item">
                        <a href="<?php echo get_the_permalink(); ?>">
                            <?php if(has_post_thumbnail()): ?>
                            <img src="<?php echo get_the_post_thumbnail_url('','thumbnail'); ?>" alt="<?php echo get_the_title(); ?>">
                            <?php else: ?>
                            <img src="<?php echo get_template_directory_uri(); ?>/img/no-image.png" alt="<?php echo get_the_title(); ?>">
                            <?php endif; ?>
                            <div>
                                <div>
                                    <div>
                                        <?php
                                        $categories = get_the_category();
                                        foreach( $categories as $category ){
                                            $cat_id = $category->term_id;
                                            $cat_child = get_term_children( $cat_id, 'category' );
                                            if( !$cat_child ){
                                                echo '<span>' . $category->name . '</span>';
                                                break;
                                            }
                                        }
                                        ?>
                                        <time><img src="<?php echo get_template_directory_uri(); ?>/img/time.png" alt="投稿日"><?php echo get_the_time('Y.n.j') ?></time>
                                    </div>
                                    <h3><?php echo get_the_title(); ?></h3>
                                    <p class="content"><?php echo get_the_excerpt(); ?></p>
                                </div>
                            </div>
                        </a>
                    </li>


                        <?php endwhile; ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); ?>

                </ul>
            </article>

        </main>
    
        <!-- sidebar -->
        <?php get_sidebar(); ?>

    </div>

<!-- footer -->
<?php get_footer('blog'); ?>