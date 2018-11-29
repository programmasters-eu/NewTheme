<?php
/**
 * Pagina para publicacion unica del Blog
 */
 get_header(); ?>

<div class="container">
    <div class="row">
        <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
            <?php
                while ( have_posts() ) : the_post();       
            ?>      
                
                <?php
                    if ( has_post_thumbnail($post) ){ ?>

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
                                    $background = ATR_DIR_URI . 'public/img/textura-1.png';
                                    //var_dump($background);
                                ?>

                            <div class="row row-content-blog" style="background-image: url('<?php echo $background; ?>')">
                                <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                    <span class="content-blog"><?php the_content(); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <main class="comment-blog col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php comment_form($args); ?>
                                </main>
                            </div>
                            <div class="row">
                                <ul class="comment-list">
                                    <?php

                                        $args = [
                                            'post_id' => $post->ID,
                                            'status' => 'approve'
                                        ];

                                        $comments = get_comments( $args );

                                        wp_list_comments( array(
                                            'per_page' => 10,
                                            'reverse_top_level' => false
                                        ), $comments );
                                        
                                    ?>
                                </ul>
                            </div>

                <?php
                    }else { ?><!--video blog-->

                        <div class="row video-blog"><!--row-imagen-blog-->
                            <iframe class="embed-responsive-item" allowfullscreen src="<?php echo get_field('video'); ?>" frameborder="0"></iframe>
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
                                    $background = ATR_DIR_URI . 'public/img/textura-1.png';
                                    
                                ?>

                            <div class="row row-content-blog" style="background-image: url('<?php echo $background; ?>')">
                                <div class="col-xl-12 lg-12 md-12 col-sm-12 col-12">
                                    <span class="content-blog"><?php the_field('texto_video_blog'); ?></span>
                                </div>
                            </div>
                            <div class="row">
                                <main class="comment-blog col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                    <?php comment_form($args); ?>
                                </main>
                            </div>
                            <div class="row">
                                <ul class="comment-list">
                                    <?php

                                        $args = [
                                            'post_id' => $post->ID,
                                            'status' => 'approve'
                                        ];

                                        $comments = get_comments( $args );

                                        wp_list_comments( array(
                                            'per_page' => 10,
                                            'reverse_top_level' => false
                                        ), $comments );
                                        
                                    ?>
                                </ul>
                            </div>


                <?php } ?>

            <?php endwhile; ?>
        </div>

        <div class="blog col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12"><!--div-sidebar-->
            <aside class="row row-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div><!--/div-sidebar-->
        
    </div>
</div>

<?php get_footer(); ?>