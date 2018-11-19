<?php
/**
 * Template Name: Home Page
 * 
 * Pagina statica de inicio home 
 */ 
get_header(); ?>

<div class="container">
    <div class="row">
            <?php
                if( is_page() && is_front_page() ) :
                    while ( have_posts () ) : the_post();
            ?>
            
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="header-top-icon text-center mx-auto">
                                <a href="">
                                    <span class="icon"><?php the_field('texto_1') ?></span>
                                </a>
                            </div>
                            <span class="description"><?php echo get_field('descripcion_1') ?></span>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="header-top-icon text-center mx-auto">
                                <a href="">
                                    <span class="icon"><?php the_field('texto_2'); ?></span>
                                </a>
                            </div>
                            <span class="description"><?php echo get_field('descripcion_2'); ?></span>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="header-top-icon text-center mx-auto">
                                <a href="">
                                    <span class="icon"><?php the_field('texto_3'); ?></span>
                                </a>
                            </div>
                            <span class="description"><?php echo get_field('descripcion_3'); ?></span>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                            <div class="header-top-icon text-center mx-auto">
                                <a href="">
                                    <span class="icon"><?php the_field('texto_4'); ?></span>
                                </a>
                            </div>
                            <span class="description"><?php echo get_field('descripcion_4'); ?></span>
                        </div>

            <?php
                    endwhile;
                endif;
            ?>
    </div><!--/row-->
</div><!--/container-->

<div class="container">
    <div class="row">
        <?php
            if( is_page() && is_front_page() ) :
                while( have_posts() ) : the_post();
        ?>

                    <div class="contenedor-banner col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"><!--Banner_1-->
                        <div class="banner" style="background: url('<?php echo get_field('imagen_textura_1'); ?>')">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <img src="<?php the_field('imagen_banner_1'); ?>" alt="" class="img-fluid">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <?php  echo get_field('texto_banner_1'); ?>
                                </div>
                            </div>
                        </div>
                    </div><!--/Banner_1-->
                    <div class="contenedor-banner col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12"><!--Banner_2-->
                        <div class="banner" style="background: url('<?php echo get_field('imagen_textura_2'); ?>')">
                            <div class="row">
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <img src="<?php echo get_field('imagen_banner_2'); ?>" alt="" class="img-fluid">
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                                    <?php  echo get_field('texto_banner_2'); ?>
                                </div>
                            </div>
                        </div>
                    </div><!--/Banner_2-->

        <?php
                endwhile;
            endif;
        ?>
    </div>
</div>

<div class="container">
    <div class="row">
        <?php
            //Aqui creare el WP_Query que mostrara las entradas de los post
            $args = array(
                'post_type'         => 'post',
                'posts_per_page'    => 3,
                'orderby'           => 'date',
                'order'             => 'DESC'
            );

            $entradas = new WP_Query($args);
        ?>

        <?php while ( $entradas->have_posts() ) : $entradas->the_post(); ?>
            <div class="section-post col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"><!--row-blog-->

                <?php
                    if ( has_post_thumbnail($post) ){ ?>

                            <!--Blog-->
                            <div class="row section-post-img">
                                <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
                            </div>
                            

                            <div class="row section-post-content">
                                <a href="<?php the_permalink(); ?>">
                                    <span class="text-center"><?php the_title('<h5>', '</h5>'); ?></span>
                                </a>
                                <span class="text-justify"><?php the_excerpt(); ?></span>
                            </div>
                            <!--/Blog-->

                <?php
                        }else{ ?>

                            <!--Video blog-->
                            <div class="row section-post-img embed-responsive embed-responsive-16by9">
                                <iframe class="embed-responsive-item" allowfullscreen src="<?php echo get_field('video'); ?>" frameborder="0"></iframe>
                            </div>
                            

                            <div class="row section-post-content">
                                <a href="<?php the_permalink(); ?>">
                                    <span class="text-center"><?php the_title('<h5>', '</h5>'); ?></span>
                                </a>
                                <?php $content = get_field( 'texto_video_blog' ); ?>
                                <span class="text-justify text-video-blog"><?php echo $content; ?></span>
                            </div><!--/Video blog-->

                <?php   
                    }?>

            </div><!--/row-blog-->

        <?php endwhile; wp_reset_postdata(); ?>
    </div><!--/row-->
</div><!--/container-->



<?php get_footer(); ?>