<!-- header -->
<?php get_header('contact'); ?>

    <!-- conform -->
    <div class="conform">
        <h1 class="conform__ttl">Contact</h1>
        <form action="" method="post" class="conform__form">
            <h2 class="conform__form-ttl">Contact 内容確認</h2>
            <p class="conform__form-txt">
                お問い合わせ内容はこちらでよろしいでしょうか<br>
                よろしければ　Send Message ボタンを押してください
            </p>
            
            <div class="conform__content">
                
                <?php the_content(); ?>

            </div>
        </form>
    </div>

<!-- footer -->
<?php get_footer('contact'); ?>