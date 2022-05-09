    <!-- footer -->
    <footer class="blog-footer" id="footer">
        <p class="blog-footer__logo"><a href="<?php echo esc_url( home_url('/') ); ?>" class="blog-footer__logo-link logo-link"><span>K-POP</span>で<span>ハングル習得</span>レッスン<img src="<?php echo get_template_directory_uri(); ?>/img/ハート.png" alt=""></a></p>
        <div class="blog-footer__wrapper">
            <?php dynamic_sidebar('footer-sitemap-category-widget'); ?>
            <?php dynamic_sidebar('footer-sitemap-fixed-widget'); ?>
        </div>

        <small class="blog-footer__copy-right"><span style="font-family: sans-serif;">&copy;</span>  2022 K-POPでハングル習得レッスン All rights reserved.</small>
    </footer>

<?php wp_footer(); ?>
</body>
</html>