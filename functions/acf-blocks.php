<?php

function DirectGarant_block_categories($categories, $post)
{
    $categories[] = [
        'slug' => 'DirectGarant',
        'title' => __('DirectGarant', 'DirectGarant')
    ];

    return array_reverse($categories);
}
add_filter('block_categories', 'DirectGarant_block_categories', 1, 2);

add_action('acf/init', 'my_acf_init_block_types');
function my_acf_init_block_types()
{


    if (function_exists('acf_register_block_type')) {

        acf_register_block_type(array(
            'name'              => 'headerbanner',
            'title'             => __('Header Banner'),
            'description'       => __('Header Banner.'),
            'render_template'   => 'acf-blocks/header-banner.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('headerbanner'),
        ));

        acf_register_block_type(array(
            'name'              => 'textimageblock',
            'title'             => __('Text Image Block'),
            'description'       => __('Text Image Block.'),
            'render_template'   => 'acf-blocks/textimage-block.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('textimageblock'),
        ));

        acf_register_block_type(array(
            'name'              => 'servicesblock',
            'title'             => __('Services Block'),
            'description'       => __('Services Block.'),
            'render_template'   => 'acf-blocks/services-block.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('servicesblock'),
        ));

        acf_register_block_type(array(
            'name'              => 'whatwedoblock',
            'title'             => __('What we do Block'),
            'description'       => __('What we do Block.'),
            'render_template'   => 'acf-blocks/whatwedo-block.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('whatwedoblock'),
        ));

        acf_register_block_type(array(
            'name'              => 'contactblock',
            'title'             => __('Contact Block'),
            'description'       => __('Contact Block.'),
            'render_template'   => 'acf-blocks/contact-block.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('contactblock'),
        ));

        acf_register_block_type(array(
            'name'              => 'contactformblock',
            'title'             => __('Contact Form Block'),
            'description'       => __('Contact Form Block.'),
            'render_template'   => 'acf-blocks/contactform-block.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('contactformblock'),
        ));

        acf_register_block_type(array(
            'name'              => 'latestjobsblock',
            'title'             => __('Latest Jobs Block'),
            'description'       => __('Latest Jobs Block.'),
            'render_template'   => 'acf-blocks/latestjobs-block.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('latestjobsblock'),
        ));

        acf_register_block_type(array(
            'name'              => 'boxbuttonblock',
            'title'             => __('Box Button Block'),
            'description'       => __('Box Button Block.'),
            'render_template'   => 'acf-blocks/boxbutton-block.php',
            'category'          => 'DirectGarant',
            'icon'              => 'email',
            'keywords'          => array('boxbuttonblock'),
        ));
    }
}

if (function_exists('acf_add_options_page')) {

    acf_add_options_page(array(
        'page_title'     => 'Theme Settings',
        'menu_title'    => 'Theme Settings',
        'menu_slug'     => 'theme-settings',
        'capability'    => 'edit_posts',
        'redirect'        => false
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Header',
        'menu_title'    => 'Header',
        'parent_slug'    => 'theme-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title'     => 'Theme Footer',
        'menu_title'    => 'Footer',
        'parent_slug'    => 'theme-settings',
    ));
}
