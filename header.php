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
                    <ul id="social-links">
                        <?php if ( of_get_option('twitter_url') ) : ?>
                            <li>
                                <a href="<?php echo of_get_option('twitter_url'); ?>" target="_blank">
                                    <i class="fa fa-twitter"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                        <?php if ( of_get_option('facebook_url') ) : ?>
                            <li>
                                <a href="<?php echo of_get_option('facebook_url'); ?>" target="_blank">
                                    <i class="fa fa-facebook"></i>
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
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
                                <img id="site-logo" src="<?php echo of_get_option('logo'); ?>" alt="<?php of_get_option('business_name') ? of_get_option('business_name') : bloginfo('name'); ?>" />
                            <?php else : ?>
                                <?php bloginfo('name'); ?>
                            <?php endif; ?>
                        </a>
                    </h1>
                </div>
                <div class="grid_8 text-right mobile-center">
                    <?php if ( function_exists('of_get_option') && of_get_option('tel') ) : ?>
                        <a id="site-tel" href="tel:<?php echo preg_replace("/[^0-9]/", "", of_get_option('tel')); ?>">
                            <i class="fa fa-phone"></i> <?php echo of_get_option('tel'); ?>
                        </a>
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
        <section id="hero" style="<?php echo function_exists('of_get_option') && of_get_option('hero_cover') ? 'background-image: url(' . of_get_option('hero_cover') . ');' : ''; ?>);">
            <div class="<?php wpbp_container_class(); ?>">
                <?php if ( is_front_page() ) : ?>
                    <div class="grid_7">
                        <?php if ( function_exists('of_get_option') && of_get_option('front_page_hero') ) : ?>
                            <?php echo apply_filters('the_content', of_get_option('front_page_hero')); ?>
                        <?php endif; ?>
                    </div>
                <?php else : ?>
                    <div class="grid_12">
                        <?php if ( function_exists('yoast_breadcrumb') ) : ?>
                            <?php yoast_breadcrumb('<div id="breadcrumbs">','</div>'); ?>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            </div>
        </section>
