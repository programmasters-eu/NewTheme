<?php
/**
 * Pagina Themes del Menu que muestra todos los Post del Custom Post Type 
 */ 
get_header(); ?>

<div class="container">
        <?php
            /**
             * $paged = es el paginado, con esto preparo la paginacion de mi CPT
             * esta variable dice, si la consulta tiene un paginado convierteme paginado a entero
             */
            $paged = ( get_query_var( 'paged' ) ) ? absint( get_query_var( 'paged' ) ) : 1;

            /**
             * $args, argumentos para el CPT
             */
            $args = array(
                'post_type' => 'themes',
                'posts_per_page' => 2,
                'orderby' => 'rand',
                'post_status' => 'publish',
                'paged' => $paged
            );
            
            $themes = new WP_Query( $args );

            //var_dump($themes);
        ?>

        <?php while ( $themes->have_posts() ) : $themes->the_post(); ?>

            <div class="row row-themes">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <img src="<?php echo get_the_post_thumbnail_url(); ?>" alt="" class="img-fluid">
                </div>
                    <?php
                        $image = ATR_DIR_URI . 'public/img/textura-1.png';
                        //var_dump($image);
                    ?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12" style="background-image: url('<?php echo $image; ?>')">
                    <a class="title" href="<?php the_permalink(); ?>">
                        <span><?php the_title('<h3>', '</h3>'); ?></span>
                    </a>
                    <span class="content-theme"><?php the_content(); ?></span>
                    <span><?php echo __('Categorías : ', 'atr-opt' ); the_category(', '); ?></span>
                    <div class="theme-buttons">   
                        <a class="theme" href="<?php echo esc_url(get_field('archivo')); ?>">
                            <button type="button" class="btn btn-info">Download Theme</button>
                        </a>
                        <a class="documentation" href="<?php echo esc_url(get_field('documentation')); ?>">
                            <button type="button" class="btn btn-info">Documentation</button>
                        </a>  
                    </div>
                    <?php //var_dump(get_field('archivo')); ?>
                </div>
            </div><!--row-->

        <?php endwhile; wp_reset_postdata(); ?>

        <?php
            /**
             * paginacion para custom post types
             */
            $big = 9999999;

            $args = array(
                'base' => str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
                'format' => '?paged=%#%',
                'current' => max( 1, get_query_var( 'paged' )),//toma el valor 1 de la consulta 'paged'
                'show_all'           => false,
                'end_size'           => 1,
                'mid_size'           => 2,
                'prev_next'          => true,
                'prev_text'          => __('« Previous', 'atr-opt'),
                'next_text'          => __('Next »', 'atr-opt'),
                'type'               => 'plain',
                'add_args'           => false,
                'add_fragment'       => '',
                'before_page_number' => '',
                'after_page_number'  => '',
                'total' => $themes->max_num_pages
            );
        ?>

            <div class="row paginate-links">
                <?php echo paginate_links($args); ?>
            </div>
            
</div><!--container-->
<?php get_footer(); ?>