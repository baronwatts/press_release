<?php 
/*
Plugin Name: Press Release
Description: Press Release Custom Post Type
Author: Baron
Version: 0.1
LicenseL GPLv3
*/


/*
1. Install Advanced Custom Fields 
2. Go to the Custom Fields and Name the Field Group (name it whatever you like)
3. Add a field label called Press Release
4. Add a field name called press_release
5. Add a field Type ( select file from the drop down list)
6. Field Instructions (Add Upload Your PDF)
7. Return Value will be File URL
8. Publish
   This will give you the ability to upload a pdf file with the press release custom post type.

9. In the single-press-release.php file between the if and the while statement add this: <?php echo get_field('press_release'); ?>
   This will display the Advanced Custom Field that you created.

10. www.nameofthewebsite.com/press-release 
	You can add this link to the navigation menu or anywhere on the site. This where all of your press releases will be displayed.

*/


/*******************************************************************************
 * Custom Post Type
 ******************************************************************************/
add_action('init', 'pr' );
function pr(){
	/*no capital letters, spaces or special characters in the CPT name*/
	register_post_type('press-release', array(
		'public' => true,
		'has_archive' => true,
		'menu_position' => 5,
		'menu_icon' => 'dashicons-admin-site',
		'supports' => array('title','editor','thumbnail','revisions'),
		'labels' => array(
			//These will show up in the admin panel
			'name' => 'Press Release',
			'singular_name' => 'Press Release',
			'add_new_item' => 'Add New Press Release',
			'not_found' => 'No Press Release Found',
		),
	));

}//end function




/*******************************************************************************
 * Flush the Custom Post Type / Taxonomies
 ******************************************************************************/
function pr_rewrite_flush(){
	pr(); //setup the custom post type and taxonomy first
	flush_rewrite_rules(); //then fix htaccess file
}

register_activation_hook(__FILE__, 'pr_rewrite_flush' ); //hook the function __FILE__ means 'this'




/*******************************************************************************
 * Create template based on post type
 ******************************************************************************/
add_filter( 'template_include', 'create_templates' );
function create_templates( $template ){

	/*This will give you the ability to use a different template for the press release custom post type*/
    if ( 'press-release' === get_post_type() ){
         return plugin_dir_path( __FILE__ ) . 'templates/single-press-release.php';
    }

    return $template;

}




/*******************************************************************************
 * Add your own custom style sheet
 ******************************************************************************/
/*function your_css(){
    $style_path = plugins_url('style.css', __FILE__); //get the path for the stylesheet
    wp_register_style( 'your_css', $style_path ); //tell WP that this stylesheet exists
    wp_enqueue_style( 'your_css' );  //put the stylesheet in line    
}
add_action( 'wp_enqueue_scripts', 'your_css' );
*/



/*******************************************************************************
 * Add your own custom javascript
 ******************************************************************************/
/*function your_js(){
    $script_path = plugins_url('script.js', __FILE__); //get the path for the script
    wp_register_script( 'your_js', $script_path );  //tell WP that this script exists
    wp_enqueue_script( 'your_js' ); //put the script in line   
}
add_action( 'wp_enqueue_scripts', 'your_js' );*/
