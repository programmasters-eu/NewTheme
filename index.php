<?php
/**
 * Pagina para el Blog, aqui salen todas las publicaciones
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12"><!--div para los post-->

            <?php  while( have_posts() ) : the_post(); ?>
                <?php 
                    if ( has_post_thumbnail($post) ) {?>

                        <div class="row image-home-blog"><!--row-imagen-blog-->
                            <a href="<?php the_permalink(); ?>"><img src="<?php the_post_thumbnail_url(); ?>" alt="" class="blog-image"></a>
                        </div><!--/row imagen-->

                        <div class="row description-blog">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <p>Author : <span><?php the_author(); ?></span></p>
                                <span class="category-blog">category : <?php the_category(', '); ?></span>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                <p><!-- otra forma es : echo the_time('F j, Y');-->
                                Publicado : <span><?php echo the_time( get_option('date_format') ); ?></span>
                                </p>
                            </div>
                        </div><!--/blog-description-->

                            <!-----------textura para el content del blog------------------>
                            <?php
                            //wp_get_attachment_url(52); no funciona
                                $background = ATR_DIR_URI . 'public/img/textura-1.png';
                                //var_dump($background);
                            ?>

                        <div class="row row-content-blog" style="background-image: url('<?php echo $background; ?>')">
                            <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                <span class="title-blog">
                                    <a href="<?php the_permalink(); ?>"><?php the_title('<h3>', '</h3>'); ?></a>
                                </span>
                            </div>
                            <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                <span class="content-blog"><?php the_excerpt(); ?></span>
                            </div>
                            <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                <a href="<?php the_permalink(); ?>">
                                    <button type="button" class="btn btn-info">Leer más</button>
                                </a>       
                            </div>
                        </div>
                <?php
                        }else { ?><!--Abrimos el else del if-->

                             <!--video blog-->
                            <div class="row video-blog">
                                <iframe class="embed-responsive-item" allowfullscreen src="<?php echo get_field('video'); ?>" frameborder="0"></iframe>
                            </div>

                            <div class="row description-blog">
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <p>Author : <span><?php the_author(); ?></span></p>
                                    <span class="category-blog">category : <?php the_category(', '); ?></span>
                                </div>
                                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                                    <p><!-- otra forma es : echo the_time('F j, Y');-->
                                    Publicado : <span><?php echo the_time( get_option('date_format') ); ?></span>
                                    </p>
                                </div>
                            </div><!--/blog-description-->

                            <!-----------textura para el content del blog------------------>
                            <?php
                            //wp_get_attachment_url(52); no funciona
                                $background = ATR_DIR_URI . 'public/img/textura-1.png';
                                
                            ?>

                        <div class="row row-content-blog" style="background-image: url('<?php echo $background; ?>')">
                            <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                <span class="title-blog">
                                    <a href="<?php the_permalink(); ?>"><?php the_title('<h3>', '</h3>'); ?></a>
                                </span>
                            </div>
                            <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                <span class="content-blog"><?php the_field('texto_video_blog'); ?></span>
                            </div>
                            <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                <a href="<?php the_permalink(); ?>">
                                    <button type="button" class="btn btn-info">Leer más</button>
                                </a>       
                            </div>
                        </div>
                            
                <?php   } ?><!--/Cerramos el else del if -->
                       
            <?php endwhile; ?>

            <div class="row paginate-links">
                <?php 

                    $args = array(
                        'prev_text'          => __('« Previous', 'atr-opt'),
                        'next_text'          => __('Next »', 'atr-opt'),
                        'type'               => 'plain',
                        'add_args'           => false,
                        'add_fragment'       => '',
                        'before_page_number' => '',
                        'after_page_number'  => '',
                    );
                
                    echo paginate_links($args); ?>
            </div>
        </div><!--/div para los post-->

        <div class="blog col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"><!--div-sidebar-->
            <aside class="row row-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div><!--/div-sidebar-->
    </div>

</div>


<?php get_footer(); ?>
