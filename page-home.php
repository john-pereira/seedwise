<?php 
/*
Template Name: Home Template


*/
?>
<?php get_header(); ?>
    <section class="hero-section">
        <div class="container">
            <div class="row">
                <div class="hero__text col-lg-6 typewriter">
                    <h1 class="hero__title"><?php echo esc_html(get_theme_mod('photographer_title', 'I\'m Glauco, a photographer!')); ?></h1>
                    <p class="hero__paragraph">
                        <span>
                             <?php echo esc_html(get_theme_mod('photographer_description', 'As a photographer, I capture moments and memories through my lens. I am passionate about my craft. Through my work, I aim to tell stories and convey emotions, creating art that resonates with my audience.')); ?>
                        </span>
                    </p>
                    <button class="hero__button"><a href="<?php echo esc_html(get_theme_mod('photographer_readmore_link', 'http://glauco.local/about/')); ?>"><?php echo esc_html(get_theme_mod('photographer_readmore_text', 'Read More')); ?></a></button>        
                </div>
                <div class="hero-img col-lg-6">
                    <img src="<?php echo esc_html(get_theme_mod('photographer_image', 'https://via.placeholder.com/350x200')); ?>" alt="Card image cap">
                </div>
            </div>
        </div>
        <div class="header__social-icons">
            <ul>
                <li>
                    <a href="<?php echo esc_html(get_theme_mod('social_1_icon_link', 'https://facebook.com/')); ?>" target="_blank">
                        <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_1_icon', 'fab fa-facebook')); ?>" ></i>
                    </a>
                    <a href="<?php echo esc_html(get_theme_mod('social_2_icon_link', 'https://twitter.com/')); ?>" target="_blank">
                        <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_2_icon', 'fab fa-twitter')); ?>"></i>
                    </a>
                    <a href="<?php echo esc_html(get_theme_mod('social_3_icon_link', 'https://instagram.com/')); ?>" target="_blank">
                        <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_3_icon', 'fab fa-instagram')); ?>"></i>
                    </a>
                    <a href="<?php echo esc_html(get_theme_mod('social_4_icon_link', 'https://youtube.com/')); ?>" target="_blank">
                        <i class="servicesIcon <?php echo esc_html(get_theme_mod('social_4_icon', 'fab fa-youtube')); ?>"></i>
                    </a>
                    
                </li>
            </ul>
        </div>
    </section>
    <!-- Main Content -->
    <div id="content" class="site-content">
        <div id="primary" class="content-area">
            <main id="main" class="site-main">

                <h1 class="text-center section-title"><?php echo esc_html(get_theme_mod('myprojects_title', 'My Projects')); ?></h1>
                <?php
                    $args = array(
                        'post_type' => 'post',
                        'posts_per_page' => 3,
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
                                    <div class="post-content col-md-4">
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
                <!-- services section-->
                <section id="services">
                    <div class="container">
                        <h1 class="text-center section-title"><?php echo esc_html(get_theme_mod('services_title', 'Services')); ?></h1>
                        <div class="row">
                            <div class="col-lg-4 mt-4">
                                <div class="card servicesText">
                                <div class="card-body">
                                    <i class="servicesIcon <?php echo esc_html(get_theme_mod('service_1_icon', 'fas fa-camera')); ?>"></i>
                                    <h4 class="card-title mt-3"><?php echo esc_html(get_theme_mod('service_1_title', 'Photography')); ?></h4>
                                    <p class="card-text mt-3"><?php echo esc_html( get_theme_mod('service_1_description', "I specialize in capturing authentic moments, creating timeless images that tell your unique story.")); ?></p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-4">
                                <div class="card servicesText">
                                <div class="card-body">
                                    <i class="servicesIcon <?php echo esc_html(get_theme_mod('service_2_icon', 'fas fa-video')); ?>"></i>
                                    <h4 class="card-title mt-3"><?php echo esc_html(get_theme_mod('service_2_title', 'Videography')); ?></h4>
                                    <p class="card-text mt-3"><?php echo esc_html(get_theme_mod('service_2_description', "I craft cinematic videos, bringing your vision to life with attention to detail and a creative touch.")); ?></p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-4">
                                <div class="card servicesText">
                                <div class="card-body">
                                    <i class="servicesIcon <?php echo esc_html(get_theme_mod('service_3_icon', 'fas fa-film')); ?>"></i>
                                    <h4 class="card-title mt-3"><?php echo esc_html(get_theme_mod('service_3_title', 'Drone Footage')); ?></h4>
                                    <p class="card-text mt-3"><?php echo esc_html(get_theme_mod('service_3_description', "Elevate your visuals with breathtaking aerial perspectives, adding a dynamic and captivating element to your project.")); ?></p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-4">
                                <div class="card servicesText">
                                <div class="card-body">
                                    <i class="servicesIcon <?php echo esc_html(get_theme_mod('service_4_icon', 'fas fa-file-video')); ?>"></i>
                                    <h4 class="card-title mt-3"><?php echo esc_html(get_theme_mod('service_4_title', 'Video Editing')); ?></h4>
                                    <p class="card-text mt-3"><?php echo esc_html(get_theme_mod('service_4_description', "I skillfully edit and enhance footage, weaving together a seamless narrative that engages and captivates your audience.")); ?></p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-4">
                                <div class="card servicesText">
                                <div class="card-body">
                                    <i class="servicesIcon <?php echo esc_html(get_theme_mod('service_5_icon', 'fas fa-image')); ?>"></i>
                                    <h4 class="card-title mt-3"><?php echo esc_html(get_theme_mod('service_5_title', 'Photoshop')); ?></h4>
                                    <p class="card-text mt-3"><?php echo esc_html(get_theme_mod('service_5_description', " I offer professional-grade Photoshop services, ensuring your images are polished, enhanced, and visually stunning.")); ?></p>
                                </div>
                                </div>
                            </div>
                            <div class="col-lg-4 mt-4">
                                <div class="card servicesText">
                                <div class="card-body">
                                    <i class="servicesIcon <?php echo esc_html(get_theme_mod('service_6_icon', 'fas fa-file-image')); ?>"></i>
                                    <h4 class="card-title mt-3"><?php echo esc_html(get_theme_mod('service_6_title', 'Photo Editing')); ?></h4>
                                    <p class="card-text mt-3"><?php echo esc_html(get_theme_mod('service_6_description', "I bring out the best in your photos, enhancing colors, retouching imperfections, and delivering high-quality, impactful images.")); ?></p>
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <section id="contact" class="py-50">
                    <div class="container">
                        <div class="row"> 
                            <h2 class="section-title">
                                <?php echo esc_html(get_theme_mod('contact_title', 'Hire Me!')); ?>
                            </h2>
                            <div class="contact-details col-md-6 col-sm-12">
                                <ul class="contact__section_text">
                                    <li><?php echo esc_html(get_theme_mod('contact_description_li1', "I specialize in a variety of photography, including portraiture, landscape, and event photography.</br> ")); ?></li>
                                    <li><?php echo esc_html(get_theme_mod('contact_description_li2', "I'm also proficient in Photoshop and drone footage, and I can provide professional filming services.")); ?></li>
                                    <li><?php echo esc_html(get_theme_mod('contact_description_li3', "If you're looking for a photographer who can capture your memories in a beautiful and professional way, I encourage you to contact me.")); ?></li>
                                </ul>
                                <p ></p>

                                <h4 class="contact__section_email"><i class="<?php echo esc_html(get_theme_mod('contact_email_icon', 'fas fa-envelope')); ?>"></i> <?php echo esc_html(get_theme_mod('contact_email_text', 'contact@glaucopaganotti.com.au')); ?></h4>
                                <h4 class="contact__section_phone"><i class="<?php echo esc_html(get_theme_mod('contact_phone_icon', 'fas fa-phone')); ?>"></i> <?php echo esc_html(get_theme_mod('contact_phone_text', '432 567 890')); ?></h4>

                            </div>
                            <div class="col-md-6 col-sm-12">
                                <div class="contact-form">
                                    <?php if ( is_active_sidebar( 'contact-form-widget-area' ) ) : ?>
                                        <div id="contact-form-widget-area" class="widget-area" role="complementary">
                                            <?php dynamic_sidebar( 'contact-form-widget-area' ); ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                    </div>
                </section>

            </main>
        </div>
    </div>
   </div>
<?php get_footer(); ?>

