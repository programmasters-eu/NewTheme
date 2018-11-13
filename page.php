<?php

/**
 * desde aqui se visualzara la pagina message
 */
get_header(); ?>
<div class="container page-page">
    <?php
        while( have_posts()) : the_post(); ?>

            <?php  //the_title(); ?>
                <?php the_content(); ?>
            
    <?php
        endwhile; ?>
</div>

<?php get_footer(); ?>