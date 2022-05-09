<!-- header -->
<?php get_header('blog'); ?>

<!-- <?php
    // 記事のビュー数を更新(ログイン中・クローラーは除外)
    if (!is_user_logged_in() && !is_robots()) {
        setPostViews(get_the_ID());
    }

    // 最後に消す
    setPostViews(get_the_ID());

?> -->

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
                <?php $category = get_category(5); ?>
                <li class="sitemap-item-post"><a href="<?php echo get_category_link( $category->term_id ); ?>"><span>▶</span><?php echo $category->name; ?><span class="total-number">（全<span class="total-number2"><?php echo $category->count; ?></span>記事を見る）</span></a>

                <!-- 歌詞和訳の中に子カテゴリを表示 -->
                    <ul>
                        <?php
                        $categories = get_categories('parent=5&exclude=');
                        foreach($categories as $category) :
                        ?>
                        <li><a href="<?php echo get_category_link( $category->term_id ); ?>"><span>・</span><?php echo $category->cat_name; ?><span class="total-number">（全<span class="total-number2"><?php echo $category->count; ?></span>記事を見る）</span></a></li>
                        <?php endforeach; ?>
                    </ul>
                </li>

                <!-- 歌詞和訳以外の直下カテゴリを表示 -->
                <?php
                $categories = get_categories('parent=0&exclude=5');
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



            <article class="main__item">
                <h2 class="main__ttl">新着記事一覧</h2>
                <ul class="main__new-list list-s">

                <?php
                $query = new WP_Query(array(
                'post_type' => "post",
                'order' => 'desc',
                'posts_per_page' => 3,
                ));

                $args = array(
                    'post_type' => get_post_type(),
                    'numberposts' => 3,
                    'posts_per_page' => 3,
                    'paged' => $paged
                );
            
                // 自分で設定した値でqueryをnewする
                $arc_query = new WP_Query($args);
            
                // 取得
                $max_per_pages = $arc_query->max_num_pages;

                ?>

                <?php if($query -> have_posts()): ?>
                        <?php while($query -> have_posts()): ?>
                            <?php $query -> the_post(); ?>

                            <!-- 記事が入ります -->
                            <li <?php post_class(); ?>>
                                
                                <a href="<?php echo get_the_permalink(); ?>">

                                    <?php if(has_post_thumbnail()): ?>
                                    <img src="<?php echo get_the_post_thumbnail_url('','thumbnail'); ?>" alt="<?php echo get_the_title(); ?>">
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-180x180.png" alt="<?php echo get_the_title(); ?>">
                                    <?php endif; ?>

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

                <a href="<?php echo get_permalink(58); ?>" class="button">新着記事一覧へ</a>

                
            </article>

            <article>            



            <?php
                // ページャ用に現在ページを取得
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => get_post_type(),
                    'numberposts' => 2,
                    'posts_per_page' => 2, // 最大表示件数を設定
                    'paged' => $paged // 現在のページ数をセット
                );

                $arc_query = new WP_Query($args);

                $posts = get_posts( $args );

                if ( $posts ) : ?>

                    <ul class="list-s">
                    <?php 
                    foreach ( $posts as $post ) :
                        setup_postdata( $post );
                    ?>
                <!-- タイトル、リンクなどの表示処理 -->
                        <!-- 記事が入ります -->
                        <li <?php post_class(); ?>>
                                
                            <a href="<?php echo get_the_permalink(); ?>">

                                <?php if(has_post_thumbnail()): ?>
                                <img src="<?php echo get_the_post_thumbnail_url('','thumbnail'); ?>" alt="<?php echo get_the_title(); ?>">
                                <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/img/apple-touch-icon-180x180.png" alt="<?php echo get_the_title(); ?>">
                                <?php endif; ?>

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
                                </div>
                            </a>

                        </li>


            <?php
                    // ループ終了
                    endforeach; ?>
                    </ul>
                    <?php
                endif;

                // ページャ用設定
                global $wp_rewrite;
                $paginate_base = get_pagenum_link(1);
                if(strpos($paginate_base, '?') || ! $wp_rewrite->using_permalinks()){
                    $paginate_format = '';
                    $paginate_base = add_query_arg('paged','%#%');
                }
                else{
                    $paginate_format = (substr($paginate_base,-1,1) == '/' ? '' : '/') . user_trailingslashit('page/%#%/','paged');
                    $paginate_base .= '%_%';
                } ?>                
                
                <div class="pagenation">
                    <?php              // ページャを出力する
                        echo paginate_links(array(
                            'base' => $paginate_base,
                            'format' => $paginate_format,
                            'total' => $arc_query->max_num_pages, // トータルのページ数をセット
                            'mid_size' => 1,
                            'show_all' => true,
                            'current' => ($paged ? $paged : 1), // 現在のページ数をセット
                            'prev_text' => '«',
                            'next_text' => '»',
                            )
                        );
                    ?>
                </div>


            </article>




        </main>
    
        <!-- sidebar -->
        <?php get_sidebar(); ?>

    </div>

<!-- footer -->
<?php get_footer('blog'); ?>