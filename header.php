<?php
/**
 * The header for our theme
 *
 * @package HiTecTheme
 */

?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<header class="hitec-custom-header">
    <div class="hitec-header-container">
        <div class="hitec-logo">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hitec-logo.png" alt="Hi-Tec Logo">
            </a>
        </div>
        
        <nav class="hitec-main-nav">
            <ul>
                <li><a href="/hombres">Hombres</a></li>
                <li><a href="/mujeres">Mujeres</a></li>
                <li><a href="/ninos">Niños</a></li>
                <li><a href="/nuestra-tecnologia">Nuestra Tecnología</a></li>
                <li><a href="/nosotros">Nosotros</a></li>
            </ul>
        </nav>
        
        <div class="hitec-header-icons">
            <a href="/mi-cuenta" class="hitec-icon account"><i class="fas fa-user"></i></a>
            <button class="hitec-icon search"><i class="fas fa-search"></i></button>
        </div>
    </div>
</header>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'hitec'); ?></a>

    <?php if (!is_page_template('page-hitec-landing.php')) : ?>
    <header id="masthead" class="site-header">
        <div class="site-branding">
            <?php
            the_custom_logo();
            if (is_front_page() && is_home()) :
                ?>
                <h1 class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></h1>
                <?php
            else :
                ?>
                <p class="site-title"><a href="<?php echo esc_url(home_url('/')); ?>" rel="home"><?php bloginfo('name'); ?></a></p>
                <?php
            endif;
            $hitec_description = get_bloginfo('description', 'display');
            if ($hitec_description || is_customize_preview()) :
                ?>
                <p class="site-description"><?php echo $hitec_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
            <?php endif; ?>
        </div><!-- .site-branding -->

        <nav id="site-navigation" class="main-navigation">
            <button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e('Menu', 'hitec'); ?></button>
            <?php
            wp_nav_menu(
                array(
                    'theme_location' => 'primary',
                    'menu_id'        => 'primary-menu',
                )
            );
            ?>
        </nav><!-- #site-navigation -->
    </header><!-- #masthead -->
    <?php endif; ?>

    <?php if (!is_page_template('page-hitec-landing.php')) : ?>
    <div id="content" class="site-content">
    <?php endif; ?>

