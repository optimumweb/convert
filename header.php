<?php get_template_part('head'); ?>
<?php wpbp_wrap_before(); ?>
    <div id="wrap" role="document">
        <?php wpbp_header_before(); ?>
        <header id="header" role="banner">
            <?php wpbp_header_inside_before(); ?>
            <div id="top-bar">
                <div class="<?php wpbp_container_class(); ?>">
                    <div class="grid_6 mobile-center">
                        <div id="site-description">
                            <?php bloginfo('name'); ?> - <?php bloginfo('description'); ?>
                        </div>
                    </div>
                    <div class="grid_6 text-right mobile-center">
                        <ul id="site-toolbar">
                            <?php if ( function_exists('of_get_option') && of_get_option('tel') ) : ?>
                                <li id="site-tel">
                                    <i class="fa fa-phone"></i> <?php echo of_get_option('tel'); ?>
                                </li>
                            <?php endif; ?>
                            <li>
                                <nav id="social-nav" role="navigation">
                                    <?php wp_nav_menu(array( 'theme_location' => 'social_navigation' )); ?>
                                </nav>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
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
