<!-- Footer -->
<script>
  // JavaScript code to get the current year
  var currentYear = new Date().getFullYear();
  document.getElementById('currentYear').textContent = currentYear;
</script>
<footer class="site-footer">
    <div class="zigzag"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer_about-text">
                    <?php echo esc_html(get_theme_mod('footer_text_description', "I love capturing the beauty of the world around me, and I'm always looking for new ways to challenge myself and create something special. If you're looking for a photographer who can capture your memories in a way that's both beautiful and meaningful, I'd love to chat.")); ?>
                </div>
            </div>
            <div class="col-md-4">
                <div class="footer__menu-wrapper">
                    <?php wp_nav_menu( array( 'theme_location' => 'seedwise_footer_menu', 'menu_class' => 'footer-nav' ) ); ?>
                </div>

            </div>
            <div class="col-md-4">
                <div class="footer__social-icons">
                    <ul>
                        <li>
                            <a href="<?php echo esc_html(get_theme_mod('social_1_icon_link', 'https://facebook.com/')); ?>" target="_blank">
                                <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_1_icon', 'fab fa-facebook')); ?>" ></i>
                            </a>
                            <a href="<?php echo esc_html(get_theme_mod('social_2_icon_link', 'https://twitter.com/')); ?>" target="_blank">
                                <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_2_icon', 'fab fa-twitter')); ?>"></i>
                            </a>
                            <a href="<?php echo esc_html(get_theme_mod('social_3_icon_link', 'https://instagram.com/')); ?>" target="_blank">
                                <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_3_icon', 'fab fa-instagram')); ?>"></i>
                            </a>
                            <a href="<?php echo esc_html(get_theme_mod('social_4_icon_link', 'https://youtube.com/')); ?>" target="_blank">
                                <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_3_icon', 'fab fa-youtube')); ?>"></i>

                            </a>
                            
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright">
        <p class="copyright-text">
            <?php echo dynamic_copyright_year(); ?> - <?php echo esc_html(get_theme_mod( 'copyright_text', 'Footer Copyright')); ?>
        </p>
    </div>
</footer>
    <?php wp_footer(); ?>
</body>
</html>