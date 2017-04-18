        <?php wpbp_footer_before(); ?>
        <footer id="footer" role="contentinfo">
            <?php wpbp_footer_inside_before(); ?>
            <div id="footer-widgets">
                <div class="<?php wpbp_container_class(); ?>">
                    <?php dynamic_sidebar("Footer"); ?>
                </div>
            </div>
            <div id="bottom-bar">
                <div class="<?php wpbp_container_class(); ?>">
                    <div class="grid_8 mobile-center">
                        <?php if ( has_nav_menu('secondary_navigation') ) : ?>
                            <nav id="footer-nav">
                                <?php wp_nav_menu(array( 'theme_location' => 'secondary_navigation' )); ?>
                                <div class="clear"></div>
                            </nav>
                        <?php endif; ?>
                    </div>
                    <div class="grid_4 text-right mobile-center">
                        <div id="copy">
                            <?php if ( of_get_option('business_name') ) : ?>
                                &copy; <?php echo date('Y'); ?> <?php echo of_get_option('business_name'); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <?php wpbp_footer_inside_after(); ?>
        </footer>
        <?php wpbp_footer_after(); ?>
    </div>

<?php wp_footer(); ?>
<?php wpbp_footer(); ?>

</body>
</html>
<?php wpbp_after_html(); ?>