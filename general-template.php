<?php 
/*
Template Name: General Template


*/
?>
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
                    <?php echo get_the_title(); ?>
                </h1>

                
                
        
            </main>
        </div>
    </div>
   </div>
<?php get_footer(); ?>

