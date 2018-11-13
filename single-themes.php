<?php
/**
 * Pagina para publicacion unica del Custom Post Type (themes)
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <?php
                while ( have_posts() ) : the_post();       
            ?>

                    <div class="row image-home-blog"><!--row-imagen-blog-->
                        <a href="#"><img src="<?php the_post_thumbnail_url(); ?>" alt="" class="img-fluid blog-image"></a>
                    </div><!--/row imagen-->

                    <div class="row description-blog">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <p>Author : <span><?php the_author(); ?></span></p>
                            <span class="category-blog">category : <?php the_category(', '); ?></span>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6">
                            <p><!-- otra forma es : echo the_time('F j, Y');-->
                            Publicado : <span><?php echo the_time( get_option('date_format') ); ?></span>
                            </p>
                        </div>
                    </div><!--/blog-description-->

                        <!-----------textura para el content del blog------------------>
                        <?php
                        //en cpanel->medios->textura-1 = id 52
                            $background = wp_get_attachment_url(52);
                            //var_dump($background);
                        ?>

                    <div class="row row-content-blog" style="background-image: url('<?php echo $background; ?>')">
                        <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                            <span class="content-blog"><?php the_content(); ?></span>
                        </div>
                    </div>
            <?php endwhile; ?>
            
        </div><!--/div para post-->

        <div class="blog col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"><!--div-sidebar-->
            <aside class="row row-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div><!--/div-sidebar-->
        
    </div>
</div>

<?php get_footer(); ?>