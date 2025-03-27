<?php
/**
 * The template for displaying the footer
 *
 * @package HiTecTheme
 */

?>

    <?php if (!is_page_template('page-hitec-landing.php')) : ?>
    </div><!-- #content -->

    <footer id="colophon" class="site-footer">
        <div class="site-info">
            <a href="<?php echo esc_url(__('https://wordpress.org/', 'hitec')); ?>">
                <?php
                /* translators: %s: CMS name, i.e. WordPress. */
                printf(esc_html__('Proudly powered by %s', 'hitec'), 'WordPress');
                ?>
            </a>
            <span class="sep"> | </span>
                <?php
                /* translators: 1: Theme name, 2: Theme author. */
                printf(esc_html__('Theme: %1$s by %2$s.', 'hitec'), 'Hi-Tec', '<a href="https://yourwebsite.com">Your Name</a>');
                ?>
        </div><!-- .site-info -->
    </footer><!-- #colophon -->
    <?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>

