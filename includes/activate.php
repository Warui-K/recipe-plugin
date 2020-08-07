<?php

function r_activate_plugin()
{
    //Check if WP Version is compatible with this plugin
    //Minimum Version required is 5.0

    if(version_compare(get_bloginfo('version'), '5.0', '<')){
        wp_die(__("You must update WordPress to use this plugin.", 'recipe'));
    }

    global $wpdb;
    $createSQL      =   "
    CREATE TABLE `" . $wpdb->prefix . "recipe_ratings` (
        `ID` BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
        `recipe_id` BIGINT(20) UNSIGNED NOT NULL,
        `rating` FLOAT(3,2) UNSIGNED NOT NULL,
        `user_ip` VARCHAR(50) NOT NULL,
        PRIMARY KEY (`ID`)
    ) ENGINE=InnoDB " . $wpdb->get_charset_collate() . ";";

    require( ABSPATH . "/wp-admin/includes/upgrade.php" );
        //use dbDelta for creating new tables and updating existing tables
        dbDelta( $createSQL );
}