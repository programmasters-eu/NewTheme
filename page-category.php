<?php
/**
 * Template Name: categories
 */ 
get_header(); ?>

<div class="container category-page">
    <div class="row">
        <?php
            $categories = get_categories();

        ?>
        <?php foreach ( $categories as $category ) : ?>

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12">
                <img class="category-page-image img-fluid" src="<?php echo z_taxonomy_image_url($category->term_id); ?>" />
                <a href="<?php echo get_category_link( $category->cat_ID ); ?>"> 
                    <h5><?php echo $category->name; ?></h5>
                </a>
                <span><p><?php echo $category->description; ?></p></span> 
            </div>
            <?php endforeach; ?>
    </div>

        
</div>


<?php get_footer(); ?>