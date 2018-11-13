<?php
/**
 * Template Name: contactme
 */ 
get_header(); ?>

<div class="container contactme-page">
    <div class="row">
        <div class="background-form col-xl-8 col-lg-8 col-md-8 col-sm-12 col-12">
               
                <h3 class="contactme-title">Contact Me</h3>
                <p>you have a question ? do not hesitate to contact me, send me your message and answer as soon as possible</p>
            
            <form action="" method="post">
                
          
                        <label for="name">Name*</label>
                            <input type="text" name="name" id="name" required>
                        
                
                  
                        <label for="email">Email addres*</label>
                            <input type="email" name="email" id="email" required>
                        
              
                  
                        <label for="message">Message*</label>
                            <textarea name="message" id="message" cols="30" rows="5" required></textarea>
                        
               
                <input type="submit" name="enviar" id="enviar" value="Send Message">
                <!--Este input estara oculto y me servira para verificar que se carga correctamente el form-->
                <input type="hidden" name="oculto" value="1">
                
            </form>
            <?php
               
            ?>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-12">
            <!--Aqui si decido poner un sidebar-->
        </div>
    </div><!--/row-->
</div><!--/container-->

<?php get_footer(); ?>