<?php 

/**
 * Plugin Name: Recipe
 * Description : A simple WordPress plugin that allowsa user to create recipes and rate those recipes
 * Version: 1.0
 * Author: Warui Kamiri
 * Author URI: https://github.com/Warui-K
 * Credits:  Luis Ramirez Jr
 * Credits URI: https://www.udemy.com/user/luisramirezjr/
 * text domain: recipe
 */


 /**
  * WP loads its own files and constants before loading plugins so that they are available 
 */
 if(!function_exists('add_action')){
     echo "Hi there! I'm just a plugin not much I can do when called directly.";
     exit;

 }

 /**
  * Plugin activation
*/
 //Setup Section


 //Includes Section
 include('includes/activate.php');
 include('includes/init.php');
 include('process/save-post.php');




 //Hooks Section
 register_activation_hook(__FILE__, 'r_activate_plugin');
  add_action('init', 'recipe_init');
  add_action('save_post_recipe', 'r_save_post_admin', 10, 3);

  //Shortcodes