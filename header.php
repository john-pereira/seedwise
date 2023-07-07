<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>

<?php wp_body_open(); ?>
   <div id="page" class="site">
    <header>
    
        <nav id="navbar" class="">
            <div class="nav-wrapper">
                <!-- Navbar Logo -->
                <div class="logo">
                <!-- Logo Placeholder for Illustration -->
                <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
                    <?php 
                        if( has_custom_logo() ){
                            the_custom_logo(); 
                        }else{
                            ?>
                                <a class="logo-name" href="<?php echo esc_url( home_url( '/' )); ?>">
                                    <span >
                                        <?php bloginfo( 'name' ); ?>
                                    </span
                                ></a>
                            <?php
                        }

                    ?>
                </a>
                </div>

                <!-- Navbar Links -->
                <?php wp_nav_menu( array( 'theme_location' => 'seedwise_main_menu', 'menu_class' => 'navbar-nav' ) ); ?>
            </div>
        </nav>


        <!-- Menu Icon -->
        <div class="menuIcon">
            <span class="icon icon-bars"></span>
            <span class="icon icon-bars overlay"></span>
        </div>


        <div class="overlay-menu">
            <?php wp_nav_menu( array( 'theme_location' => 'seedwise_main_menu', 'menu_class' => 'navbar-nav' ) ); ?>
        </div>



    </header>
    