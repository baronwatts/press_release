# press_release
Press release custom post type plugin (Dev)

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
