<?php get_header(); ?>

    <?php
        $image = ATR_DIR_URI . 'public/img/error-404.jpg';
        //var_dump($image);
    ?>

    <div class="container">
       <div class="row page-404">
            <a href="<?php home_url('/'); ?>"><img src="<?php echo $image; ?>" alt=""></a>
       </div>
    </div>

<?php get_footer(); ?>