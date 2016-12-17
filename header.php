<?php get_template_part('head'); ?>
<?php wpbp_wrap_before(); ?>
    <div id="wrap" role="document">
        <?php wpbp_header_before(); ?>
        <header id="header" role="banner">
            <?php wpbp_header_inside_before(); ?>
            <div id="top-bar">
                <div class="<?php wpbp_container_class(); ?>">
                    <div class="grid_8 mobile-center">
                        <div id="site-description">
                            <?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
                        </div>
                    </div>
                    <div class="grid_4 text-right mobile-center">
                        <nav id="social-nav" role="navigation">
                            <?php wp_nav_menu(array( 'theme_location' => 'social_navigation' )); ?>
                        </nav>
                    </div>
                </div>
            </div>
            <div class="<?php wpbp_container_class(); ?>">
                <div class="grid_4 mobile-center">
                    <h1 id="site-title"><a href="<?php echo home_url(); ?>/"><?php bloginfo('name'); ?></a></h1>
                </div>
                <div class="grid_8 text-right mobile-center">
                    <nav id="main-nav" role="navigation">
                        <?php wp_nav_menu(array( 'theme_location' => 'primary_navigation' )); ?>
                    </nav>
                </div>
            </div>
            <?php wpbp_header_inside_after(); ?>
        </header>
        <?php wpbp_header_after(); ?>
        <?php if ( is_front_page() ) : ?>
            <section id="hero">
                <?php dynamic_sidebar("Hero"); ?>
            </section>
        <?php endif; ?>
