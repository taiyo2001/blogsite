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

            <article>
                <h2 class="main__ttl"><?php echo get_the_title(); ?></h2>
                <?php
                // ページャ用に現在ページを取得
                $paged = get_query_var('paged') ? get_query_var('paged') : 1;
                $args = array(
                    'post_type' => 'post',
                    // 'numberposts' => 2,
                    'posts_per_page' => 15, // 最大表示件数を設定
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
                        </li>
                        <?php endforeach; ?>
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
                }
                ?>                
                
                <div class="pagenation">
                    <?php              // ページャを出力する
                        echo paginate_links(array(
                            'base' => $paginate_base,
                            'format' => $paginate_format,
                            'total' => $arc_query->max_num_pages, // トータルのページ数をセット
                            // 'mid_size' => 1,
                            'show_all' => true,
                            'current' => ($paged ? $paged : 1), // 現在のページ数をセット
                            'prev_text' => '<',
                            'next_text' => '>',
                            )
                        );
                    ?>
                </div>
                <?php wp_reset_postdata(); ?>
            </article>


        </main>
    
        <!-- sidebar -->
        <?php get_sidebar(); ?>

    </div>

<!-- footer -->
<?php get_footer('blog'); ?>