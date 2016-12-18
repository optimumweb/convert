<?php get_template_part('head'); ?>
<?php wpbp_wrap_before(); ?>
    <div id="wrap" role="document">
        <section id="top-bar">
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
        </section>
        <?php wpbp_header_before(); ?>
        <header id="header" role="banner">
            <?php wpbp_header_inside_before(); ?>
            <div class="<?php wpbp_container_class(); ?>">
                <div class="grid_4 mobile-center">
                    <h1 id="site-title">
                        <a href="<?php echo home_url(); ?>/">
                            <?php if ( function_exists('of_get_option') && of_get_option('logo') ) : ?>
                                <img id="site-logo" src="<?php echo of_get_option('logo'); ?>" alt="<?php bloginfo('name'); ?>" />
                            <?php else : ?>
                                <?php bloginfo('name'); ?>
                            <?php endif; ?>
                        </a>
                    </h1>
                </div>
                <div class="grid_8 text-right mobile-center">
                    <?php if ( function_exists('of_get_option') && of_get_option('tel') ) : ?>
                        <div id="site-tel">
                            <i class="fa fa-phone"></i> <?php echo of_get_option('tel'); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php wpbp_header_inside_after(); ?>
        </header>
        <nav id="main-nav" role="navigation">
            <div class="<?php wpbp_container_class(); ?>">
                <div class="grid_12">
                    <?php wp_nav_menu(array( 'theme_location' => 'primary_navigation' )); ?>
                </div>
            </div>
        </nav>
        <?php wpbp_header_after(); ?>
        <?php if ( is_front_page() ) : ?>
            <section id="hero" style="<?php echo function_exists('of_get_option') && of_get_option('hero_cover') ? 'background-image: url(' . of_get_option('hero_cover') . ');' : ''; ?>);">
                <?php dynamic_sidebar("Hero"); ?>
            </section>
        <?php endif; ?>
