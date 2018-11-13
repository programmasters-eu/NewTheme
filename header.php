<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="<?php bloginfo('description'); ?>">

    <title><?php wp_title('') ?><?php if(wp_title('',false)) { echo " : "; } ?><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
    
<div class="container-fluid">
    <div class="row">

            <div class="logo col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
                
                <a href="<?php echo esc_url( home_url('/') ); ?>">
                    <?php
                        if ( function_exists( 'the_custom_logo' ) ) {
                            the_custom_logo();
                        }
                    ?>
                </a>
            </div><!--/logo-->

            <div class="menu col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
                <nav class="menu-principal navbar navbar-expand-md navbar-dark">
                    <a class="navbar-brand" href="">MENÚ</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle-navigation">
                        <span class="navbar-toggler-icon"></span> 
                    </button>
                    <?php                
                        wp_nav_menu( array(
                            'theme_location' => 'menu_principal',
                            'container_class' => 'collapse navbar-collapse',
                            'container_id' => 'navbarNav',
                            'menu_class' => 'navbar-nav'
                        ));
                    ?>
                </nav><!--/nav-->
            </div><!--/menu-->
    </div><!--/row-->
</div><!--/container-->    

<div class="container-fluid container-slide">
    <div class="row">
            <?php
                    if( is_front_page() ) {
                        while( have_posts() ) : the_post();
            ?>
                            <div class="imagen">
                                <img class="img-fluid" src="<?php the_post_thumbnail_url(); ?>" alt="wordpress">
                                    
                            </div>
                            <div class="texto-slide">
                                <?php //the_content(); ?>
                            </div>
            <?php 
                        endwhile;
                    } elseif( is_page() || is_archive() || is_search() ) {

                        $image = get_option('page_for_posts');
                        $url = get_post_thumbnail_id( $image );
                        $url = wp_get_attachment_image_src( $url, 'full' );
                        //var_dump( $url );
                        $url = $url[0];

            ?>
                                <div class="imagen">
                                    <img class="img-fluid" src="<?php echo $url; ?>" alt="wordpress">    
                                </div>   
            <?php
                    } elseif( is_home() ) {

                        /*para traer la imagen destacada de la pagina de posts debo utilizar la api options*/
                        $pagina_blog = get_option('page_for_posts');
                        $id_imagen = get_post_thumbnail_id($pagina_blog);
                        $destacada = wp_get_attachment_image_src($id_imagen, 'full');
                        //var_dump($destacada);
                        $destacada = $destacada[0];
            ?>
                                <div class="imagen">
                                    <img class="img-fluid" src="<?php echo $destacada; ?>" alt="wordpress">    
                                </div>       
            <?php

                    } elseif( is_single() ) {

                        /*imagen de fondo para el single.php*/
                        $imagen = ATR_DIR_URI . '/public/img/textura-top-header.jpg';
            ?>
            
                            <div class="col-xl-12 col-lg-12 col-md-12" style="background-image:url('<?php echo $imagen; ?>')">
                                <span class="single-title-blog"><?php the_title('<h3>', '</h3>'); ?></span>
                            </div>       
            
            <?php
                    } elseif( is_post_type_archive() ) {

                        $image = get_option('page_for_posts');
                        $url = get_post_thumbnail_id( $image );
                        $url = wp_get_attachment_image_src( $url, 'full' );
                        //var_dump( $url );
                        $url = $url[0];

            ?>
                            <div class="imagen">
                                <img src="<?php echo $url; ?>" alt="" class="img-fluid">
                            </div>

            <?php
                    } 
            ?>
    </div><!--/row-->
</div><!--/container-fluid-->