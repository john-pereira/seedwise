<?php get_header(); ?>
    
    <section class="hero-section">
            <div class="container">
                <div class="header-imgs">
                    <?php
                        // Create a new WP_Query object
                        $query = new WP_Query(array(
                        'post_type' => 'post',
                        'posts_per_page' => 5,
                        ));

                        // Loop through the posts
                        while ($query->have_posts()) {
                        $query->the_post();

                        // Get the featured image URL
                        $featured_image_url = wp_get_attachment_image_src(get_post_thumbnail_id(), 'thumbnail');

                        // Display the featured image URL
                        echo '<img src="' . $featured_image_url[0] . '" />';
                        }

                        // Reset the WP_Query object
                        wp_reset_query();
                    ?>
                </div>                
            </div>
    </section>
    <!-- Main Content -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">
                <h1 class="page-title text-center my-5" >
                    <?php echo get_the_title( get_option('page_for_posts', true) ); ?>
                </h1>

                
                <?php
                    $args = array(
                        'post_type' => 'post',
                        // 'posts_per_page' => 3,
                        // 'category__in' => array(4, 6, 8),
                        'category__not_in' => array(1)
                    );
                    $postlist = new WP_Query($args);

                    if ($postlist->have_posts()) :
                        while ($postlist->have_posts()) :
                            $postlist->the_post();
                            $images = get_posts(array(
                                'post_parent' => get_the_ID(),
                                'post_type' => 'attachment',
                                'numberposts' => 5,
                                'post_mime_type' => 'image'
                            ));
                    ?>
                    <section class="articles">
                        <article>
                            <div class="card">
                                <div class="row">
                                    <div class="post-content col-md-4 <?php post_class(); ?>">
                                        <h2 class="post__title">
                                            <a href="<?php the_permalink(); ?>">
                                                <?php the_title(); ?>
                                            </a> 
                                        </h2>
                                        <div class="post-date">
                                            <i class="fas fa-calendar-alt me-3"></i><?php echo get_the_date(); ?>
                                        </div>
                                        <div class="post__excerpt mt-3">
                                            <?php the_excerpt(); ?>
                                        </div>
                                        <a href="' . get_permalink() . '" class="read-more">
                                            Read more <span class="sr-only"></span>
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" viewBox="0 0 20 20" fill="currentColor">
                                                <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                                            </svg>
                                        </a>
                                    </div>
                                    <div class="col-md-8">
                                        <figure class="post-img">
                                            <!-- Display only the feature IMG -->
                                            <!-- <a href="<?php the_permalink(); ?>">
                                                <?php the_post_thumbnail( array( 500, 200 ) ); ?>
                                            </a>  -->

                                            <!-- Display four images from the post -->
                                            <?php
                                            if (!empty($images)) {
                                                $count = 0;
                                                foreach ($images as $image) {
                                                    $thumbnail = wp_get_attachment_image_src($image->ID, 'thumbnail');
                                                    if ($thumbnail) {
                                                        $count++;
                                                        if ($count <= 3) {
                                                            echo '<a href="' . get_permalink() . '"><img src="' . $thumbnail[0] . '" alt="Image ' . $count . '"></a>';
                                                        }
                                                    }
                                                }
                                            }
                                            ?>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </article>
                        <?php wp_link_pages(); ?>
                    </section>
                    <?php
                        endwhile;
                        wp_reset_postdata();
                    else: ?>
                        <p>Nothing yet to be displayed!</p>
                    <?php endif; ?>
                                    
                
        
            </main>
        </div>
    </div>
   </div>
<?php get_footer(); ?>
