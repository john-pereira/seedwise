<?php
/**
 * The template for displaying 404 pages (Not Found)
 */

get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <section class="error-404 not-found page-404">
            <header class="page-header">
                <h1 class="page-title text-center title-404"><?php esc_html_e( '404', 'seedwise' ); ?></h1>
                <h1 class="page-title text-center"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'seedwise' ); ?></h1>
            </header><!-- .page-header -->

            <div class="page-content text-center">
                <p><?php esc_html_e( 'It looks like nothing was found at this location. Maybe try a search?', 'seedwise' ); ?></p>
                <div class="container-search">
                    <?php get_search_form(); ?>
                </div>
            </div><!-- .page-content -->
        </section><!-- .error-404 -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();