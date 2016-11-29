<?php
/**
 * Template Name: Press Release
 */

    
    //include the header for this template
    //include( plugin_dir_path( __FILE__ ) . '/header-press-release.php' );
    get_header();
    

?>
    
    <div>
      <?php 
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post();
            the_content();
            ?>

            <div class="container" style="padding: 40px 10px; text-align:center;">
              <!-- this function output the press release link created with the advanced custom fields plugin -->
              <a href="<?php echo get_field('press_release'); ?>">
                <?php echo get_the_date(); ?>
                <h3><?php echo the_title(); ?></h3>
                <hr>
              </a>
            </div>
        
            
            <?
          } // end while
        } // end if
        ?>
    </div>
   


  
    <!-- Footer -->
     <!-- scripts you want to include -->
    <!-- <script src=""></script> -->
    <?php get_footer(); ?>


   
  </body>
</html>
