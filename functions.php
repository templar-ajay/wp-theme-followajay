<?php

function followajay_theme_support(){
    // add dynamic title tag
    add_theme_support( 'title-tag' );
    add_theme_support('custom-logo');
}

add_action( 'after_setup_theme', "followajay_theme_support" );


function followajay_menus(){

    $locations = array(
        "primary_menu" => "Desktop Primary Left Sidebar",
        "footer_menu" => "Footer Menu Items"
    );

    register_nav_menus( $locations );

}

add_action("init","followajay_menus");

function followajay_register_styles(){
    $version=wp_get_theme()->get("Version");
    wp_enqueue_style( "followajay-style", get_template_directory_uri()."/style.css" , array("followajay-bootstrap"), $version, "all" );
    wp_enqueue_style( "followajay-bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" , array(), "4.4.1", "all" );
    wp_enqueue_style( "followajay-fontawesome", "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css" , array(), "5.13.0", "all" );
}

add_action( 'wp_enqueue_scripts', 'followajay_register_styles');

function followajay_register_scripts(){
    $version=wp_get_theme()->get("Version");
    wp_enqueue_script( "followajay-jquery", "https://code.jquery.com/jquery-3.4.1.slim.min.js", array(), "3.4.1", true );
    wp_enqueue_script( "followajay-popper", "https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js", array(), "1.16.0", true );
    wp_enqueue_script( "followajay-bootstrap", "https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js", array(), "4.4.1", true );
    wp_enqueue_script( "followajay-main", get_template_directory_uri()."/assets/js/main.js", array("followajay-jquery", "followajay-popper", "followajay-bootstrap"), $version, true );
}

add_action( 'wp_enqueue_scripts', 'followajay_register_scripts');

?>