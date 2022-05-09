<?php

  function custom_theme_setup(){
    // head内にフィードリンクを出力
    add_theme_support('authomatic-feed-links');

    // タイトルタグを動的に出力
    add_theme_support('title-tag');

    // ブロックエディター用のCSSを有効化
    add_theme_support('wp-block-styles');

    //埋め込みコンテンツをレスポンシブ対応に
    add_theme_support('responsive-embeds');

    //アイキャッチの設定
    add_theme_support('post-thumbnails');

    	//カスタムメニュー有効化、メニューの位置を設定
    register_nav_menus(
      array(
        'globalnav' => 'グローバルナビゲーション',
      )
    );

  }
  add_action('after_setup_theme', 'custom_theme_setup');

  //PHP5.3以上はこのコード　画質の改善
	add_filter( 'jpeg_quality', function( $arg ){ return 100; } );

	//PHP5.2以下はこのコード
	// add_filter('jpeg_quality', create_function('$arg','return 100;'));


  function output_breadcrumb(){
    $home = '<a href="'.get_bloginfo('url').'"><img src="'.get_template_directory_uri().'/img/TOP.png" alt="TOP">TOP</a>';
    echo $home;
  
    // トップページの場合
    if ( is_front_page() ) {
  
    // カテゴリーページの場合
    } else if ( is_category() ) {
    $cat = get_queried_object();
    $cat_id = $cat->parent;
    $cat_list = array();
    while($cat_id != 0) {
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<span>▶</span><a href="'.$cat_link.'">'.$cat->name.'</a>' );
      $cat_id = $cat->parent;
    }
    foreach ($cat_list as $value) {
      echo $value;
    }
    the_archive_title('<span>▶</span><span>', '</span>');
  
    // アーカイブページの場合
    } else if ( is_archive() ) {
    the_archive_title('<span>▶</span><span>', '</span>');
  
    // 投稿ページの場合
    } else if ( is_single() ) {
    $cat = get_the_category();
    if( isset( $cat[0]->cat_ID ) ) $cat_id = $cat[0]->cat_ID;
    $cat_list = array();
    while( $cat_id != 0 ) {
      $cat = get_category( $cat_id );
      $cat_link = get_category_link( $cat_id );
      array_unshift( $cat_list, '<span>▶</span><a href="'.$cat_link.'">'.$cat->name.'</a>' );
      $cat_id = $cat->parent;
    }
    foreach($cat_list as $value) {
      echo $value;
    }
    the_title('<span>▶</span><span>', '</span>');
  
    // 固定ページの場合
    } else if ( is_page() ) {
    the_title('<span>▶</span><span>', '</span>');
  
    // 検索結果の場合
    } else if ( is_search() ) {
    echo '<span>▶</span><span>「'.get_search_query().'」の検索結果</span>';
  
    // 404ページの場合
    } else if ( is_404() ) {
    echo '<span>▶</span><span>ページが見つかりません</span>';
    }
  }

  function myportfolio_css(){
    //css
    wp_enqueue_style(
      'reset-style',
      esc_url(get_theme_file_uri('css/reset-style.css')),
      array(),
      '1.0',
      'all'
    );

    wp_enqueue_style(
      'base-style',
      get_stylesheet_uri(),
      array('reset-style'),
      '1.0',
      'all'
    );

    if(is_page('home') || is_page('contact-conform') || is_page('contact-thanks')){

      wp_enqueue_style(
        'slick-style',
        esc_url(get_theme_file_uri('css/slick.css')),
        array('base-style'),
        '1.0',
        'all'
      );

      wp_enqueue_style(
        'portfolio-style',
        esc_url(get_theme_file_uri('css/style-portfolio.css')),
        array('slick-style'),
        '1.0',
        'all'
      );
    }
  }

  add_action('wp_enqueue_scripts', 'myportfolio_css');


  function myportfolio_scripts(){
    //font
    wp_enqueue_style(
      'font-awesome',
      'https://use.fontawesome.com/releases/v5.6.1/css/all.css',
      array(),
      '1.0',
    );

    wp_enqueue_style(
      'pacifico-font',
      'https://fonts.googleapis.com/css2?family=Pacifico&display=swap',
      array('font-awesome'),
      '1.0',
    );

    //js

    wp_deregister_script('jquery');

    wp_enqueue_script(
      'gsap',          //ハンドル名
      'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/gsap.min.js',  //ファイルパス
      array(),               //依存関係
      '3.9.1',                 //バージョン指定
      false                  //メディアタイプ
    );

    wp_enqueue_script(
      'scroll-trigger',          //ハンドル名
      'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.9.1/ScrollTrigger.min.js',  //ファイルパス
      array('gsap'),               //依存関係
      '3.9.1',                 //バージョン指定
      false                  //メディアタイプ
    );

    wp_enqueue_script(
      'jquery-3.6.0',          //ハンドル名
      esc_url(get_theme_file_uri('js/jquery-3.6.0.min.js')),  //ファイルパス
      array('scroll-trigger'),               //依存関係
      '3.6.0',                 //バージョン指定
      false                  //メディアタイプ
    );

    if(is_page('home') || is_page('contact-conform') || is_page('contact-thanks')){

      wp_enqueue_script(
        'js-vivus',          //ハンドル名
        esc_url(get_theme_file_uri('js/vivus_copy.js')), 
        array('main-blog-script'),
        '1.0',
        false
      );

      wp_enqueue_script(
        'slick-min',          //ハンドル名
        esc_url(get_theme_file_uri('js/slick.min.js')),  //ファイルパス
        array('js-vivus'),               //依存関係
        '1.0',                 //バージョン指定
        false                  //メディアタイプ
      );

      wp_enqueue_script(
        'main-script',          //ハンドル名 未
        esc_url(get_theme_file_uri('js/main.js')),
        array('slick-min'),
        '1.0',
        false,
        true 
      );

    }

    wp_enqueue_script(
      'main-blog-script',          //ハンドル名 未
      esc_url(get_theme_file_uri('js/main-blog.js')),
      array('jquery-3.6.0'),
      '1.0',
      false,
      true 
    );

  }
  add_action('wp_enqueue_scripts', 'myportfolio_scripts');
  

  //サイトマップのためのショートコード
  function site_map() {
    ob_start();
    get_template_part('sitemap');
    return ob_get_clean();
    }
    add_shortcode('site-map', 'site_map');

  
  //説明文の文字数や最後の文字を決める
  function new_excerpt_more($more) {
    return '...';
  }
  add_filter('excerpt_more', 'new_excerpt_more');


  // 記事のPVを取得
  function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=='') {
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
      return "0 View";
    }
    return $count.' Views';
  }

  // 記事のPVをカウントする
  function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if ($count=='') {
      $count = 0;
      delete_post_meta($postID, $count_key);
      add_post_meta($postID, $count_key, '0');
    } else {
      $count++;
      update_post_meta($postID, $count_key, $count);
    }

    // デバッグ start
    // echo '';
    // echo 'console.log("postID: ' . $postID .'");';
    // echo 'console.log("カウント: ' . $count .'");';
    // echo '';
    // デバッグ end
  }
  remove_action( 'wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);


  // ウィジェットエリアの登録
  function custom_widget_register() {
    register_sidebar( array(
      'name'          => 'フッターカテゴリーサイトマップエリア',
      'id'            => 'footer-sitemap-category-widget',
      'description'   => 'フッターにカテゴリーのサイトマップを表示します。',
      'before_widget' => '<div class="blog-footer__sitemap-left">',
      'after_widget'  => '</div>',
      // 'before_title'  => '<h2 class="c-widget__title">',
      // 'before_title'  => '<h3 class="sidebar__ttl">',
      // 'after_title'   => '</h2>',
      // 'after_title'   => '</h3>',
    ) );

    register_sidebar( array(
      'name'          => 'フッター固定ページサイトマップエリア',
      'id'            => 'footer-sitemap-fixed-widget',
      'description'   => 'フッターに固定ページのサイトマップを表示します。',
      'before_widget' => '<div class="blog-footer__sitemap-right">',
      'after_widget'  => '</div>',
    ) );

  }
  add_action( 'widgets_init', 'custom_widget_register' );

  // is_mobileを有効にする
  function is_mobile() {
    $useragents = array(
        'iPhone',          // iPhone
        'iPod',            // iPod touch
        '^(?=.*Android)(?=.*Mobile)', // 1.5+ Android
        'dream',           // Pre 1.5 Android
        'CUPCAKE',         // 1.5+ Android
        'blackberry9500',  // Storm
        'blackberry9530',  // Storm
        'blackberry9520',  // Storm v2
        'blackberry9550',  // Storm v2
        'blackberry9800',  // Torch
        'webOS',           // Palm Pre Experimental
        'incognito',       // Other iPhone browser
        'webmate'          // Other iPhone browser
    );
    $pattern = '/'.implode('|', $useragents).'/i';
    return preg_match($pattern, $_SERVER['HTTP_USER_AGENT']);
  }

    // 投稿のアーカイブページを作成する
  function post_has_archive($args, $post_type)
  {
      if ('post' == $post_type) {
          $args['rewrite'] = true; // リライトを有効にする
          $args['has_archive'] = 'article-list'; // 任意のスラッグ名
      }
      return $args;
  }
  add_filter('register_post_type_args', 'post_has_archive', 10, 2);

?>