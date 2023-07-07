<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php wp_head(); ?>
</head>
<body  <?php body_class(); ?>>
   <div id="page" class="site">
    <header>
       
        <section class="menu-area">
                        
                <a href="#" class="toggleBox">
                    <span class="icon"></span>
                </a>
                <div class="nav-items">
                    
                    <?php wp_nav_menu( array( 'theme_location' => 'seedwise_main_menu' ) ); ?>
                   
                </div>    
        </section>
        <section class="hero">
                hero
        </section>
    </header>