

<footer>
   <div class="container-fluid">
       <div class="row">
           <section class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
               <?php
                    if ( function_exists( 'the_custom_logo' ) ){
                        the_custom_logo();
                    }
                ?>
           </section>
           <section class="social-section col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
               <?php
                    wp_nav_menu( array(
                        'theme_location'        => 'menu_sociales',
                        'container_class'       => 'footer-menu',
                        'container_id'          => 'footer-menu',
                        'menu_class'            => 'social-menu',
                        'menu_id'               => 'social-menu',
                        'link_before'           => '<span class="social-menu-link">',
                        'link_after'            => '</span>'
                    ) ); 
               ?>
           </section>
       </div>
   </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>