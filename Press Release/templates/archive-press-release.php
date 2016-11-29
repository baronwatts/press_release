<?php

	get_header();
	//include( plugin_dir_path( __FILE__ ) . '/header-press-release.php' );

	/*redirects to whatever page you want when viewing archives for this custom post type*/
	/*header("Location: whatever-file-you-want-to-display.php");*/

?>



	<div>
      <?php 
        if ( have_posts() ) {
          while ( have_posts() ) {
            the_post(); 
          } // end while
        } // end if
        ?>
    </div>







<?php get_footer();


