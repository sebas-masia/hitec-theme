<?php
/**
 * The template for displaying search results pages
 *
 * @package HiTecTheme
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">

    <?php if (have_posts()) : ?>

        <header class="page-header">
            <h1 class="page-title">
                <?php
                /* translators: %s: search query. */
                printf(esc_html__('Search Results for: %s', 'hitec'), '<span>' . get_search_query() . '</span>');
                ?>
            </h1>
        </header><!-- .page-header -->

        <?php
        /* Start the Loop */
        while (have_posts()) :
            the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part('template-parts/content', 'search');

        endwhile;

        the_posts_navigation();

    else :

        get_template_part('template-parts/content', 'none');

    endif;
    ?>

    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_sidebar();
get_footer();

