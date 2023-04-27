<?php

function directgarant_create_post_type()
{
    register_post_type(
        'jobs',
        array(
            'labels' => array(
                'name' => ('jobs')
            ),
            'hierarchical'          => true,
            'public'                => true,
            'has_archive'           => true,
            'publicly_queryable'    => true,
            'capability_type'       => 'post',
            'show_ui'               => true,
            'show_in_menu'          => true,
            'query_var'             => true,
            'show_in_rest'          => true,
            'rewrite'               => array('slug' => 'jobs'),
            'taxonomies'            => array('jobs_categories', 'jobs', 'jobs-categories'),
            'supports'              => array('title', 'thumbnail', 'editor'),
        )
    );
}

add_action('init', 'directgarant_create_post_type');


function directgarant_create_jobs_taxonomies()
{

    register_taxonomy(
        'jobs_categories',
        array(
            'jobs'
        ),
        array(
            'labels' => array(
                'name' => 'jobs Categories',
                'menu_name'  => 'jobs Categories',
                'singular_name' => 'jobs Categories',
                'add_new' => 'Add jobs Categories',
                'edit_item' => 'Update jobs Categories',
                'view_item' => 'View jobs Categories',
                'update_item' => 'Update jobs Categories',
                'add_new_item' => 'Add new jobs Categories'
            ),
            'hierarchical'       => true,
            'show_ui'               => true,
            'show_admin_column'     => true,
            'show_in_rest'          => true,
            'has_archive'           => true,
            'update_count_callback' => '_update_post_term_count',
            'query_var'             => true,
            'rewrite' => array('slug' => 'jobs-categories'),
        )
    );
}

add_action('init', 'directgarant_create_jobs_taxonomies', 0);