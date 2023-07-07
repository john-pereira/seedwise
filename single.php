<?php get_header(); ?>
<div id="main">

    <header class="post-header single-header">
        <div class="container">
            <h1 class="post-title text-center single__header_title" ><?php the_title(); ?></h1>
            <p class="post-excerpt text-center single__header_text"><?php the_excerpt(); ?></p>
            <ul class="tag post-categoty tag-lg">
                <li>
                    <?php esc_html_e( 'Category: ', 'seedwise' ); ?> <?php the_category( ' ' ); ?>
                    
                </li>
            </ul>
            <ul class="tag post-tags tag-lg">
                <li><?php esc_html_e( 'Tags: ', 'seedwise' ); ?> <?php the_tags( '', ', ' ) ?></li>
            </ul>
        </div>
        
    </header>
    <div class="container">
        <?php while( have_posts() ):
                the_post();
        ?> 
        
        <div class="gallery">
            <div class="container">
                <div class="row">
    
                        <?php
                        $images = get_attached_media('image', $post->ID);
                        $counter = 0;
                        foreach ($images as $image) {
                            $image_url = wp_get_attachment_image_src($image->ID, 'full')[0];
                            $image_alt = get_post_meta($image->ID, '_wp_attachment_image_alt', true);

                            if ($counter % 2 == 0) {
                                echo '<div class="clearfix"></div>';
                            }
                            ?>
                            <div class="col-md-6 col-sm-12">
                                <div class="gallery__row">
                                    <a data-fslightbox href="<?php echo $image_url; ?>" class="gallery__link" data-lightbox="image-<?php echo $image->ID; ?>">
                                        <figure class="gallery__thumb">
                                            <img src="<?php echo $image_url; ?>" alt="<?php echo $image_alt; ?>" class="gallery__image">
                                            <figcaption class="gallery__caption"><?php echo esc_html(get_theme_mod('portrait_by_settings', 'Portrait by: Glauco Paganotti')); ?></figcaption>
                                        </figure>
                                    </a>
                                </div>
                            </div>
                            <?php
                            $counter++;
                        }
                        ?>

                </div>
            </div>
        </div>


        <?php 
            endwhile;
        ?>
    </div>
</div>

<?php get_footer(); ?>
