<?php 
/*
Template Name: About Template


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
                <section id="about_timeline">
                    <h1><?php echo esc_html(get_theme_mod( 'about_timeline_title', "Glauco's Photographic Journey")); ?></h1>
                    <p class="leader"><?php echo esc_html(get_theme_mod('about_timeline_subtitle', "I'm a photographer with over 10 years of experience. I've worked on a variety of projects, from weddings to corporate events.")); ?></p>
                    <div class="demo-card-wrapper">
                        <div class="card">

                            <div class="card-body">
                                <!-- Timeline start -->
                                <div class="timeline">
                                    
                                    <?php 
                                        // Get all demo cards
                                        $args = array(
                                            'post_type' => 'demo_card'
                                        );
                                        $demo_cards = get_posts($args);

                                        // Initialize the counter variable
                                        $counter = 1;

                                        // Loop through the demo cards and display them
                                        foreach ($demo_cards as $demo_card) {
                                            // Get the value of the custom field "year"
                                            $year = get_post_meta($demo_card->ID, 'year', true);

                                            // Construct the class name with the counter
                                            // $class = 'demo-card--step';
                                            $class = 'demo-card--step' . $counter;

                                            // Display the demo card
                                            
                                            echo '<div class="timeline-row">
                                                    <div class="timeline-dot fb-bg"></div>
                                                    <div class="timeline-content">
                                                        <i class="fa fa-calendar"></i> ' . $year . '
                                                            
                                                                <h4>' . $demo_card->post_title . '</h4>
                                                                                                                   
                                                            <p class="about-text">' . $demo_card->post_content . '</p>
                                                            <figure>
                                                                <img src="' . wp_get_attachment_image_src(get_post_thumbnail_id($demo_card->ID), 'full')[0] . '" alt="Graphic">
                                                            </figure>
                                                            
                                                    </div>
                                                  </div>';
                                                
                                            // Increment the counter
                                            $counter++;
                                        }
                                    
                                    ?>       

                                </div>
                                <!-- Timeline end -->
                            </div>
                        </div>                            
                    </div>
                </section>
                
              
                


            </main>
        </div>
    </div>
   </div>
<?php get_footer(); ?>

