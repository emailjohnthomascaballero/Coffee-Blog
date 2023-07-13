<?php
/*Add Home Page Options Panel.*/
$wp_customize->add_panel(
    'theme_home_option_panel',
    array(
        'title' => __( 'Front Page Options', 'blogauthor' ),
        'description' => __( 'Contains all front page settings', 'blogauthor'),
        'priority' => 50
    )
);
/**/
$wp_customize->add_section(
    'home_page_banner_option',
    array(
        'title'      => __( 'Main Banner Options', 'blogauthor' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'blogauthor_options[enable_banner_section]',
    array(
        'default'           => $default_options['enable_banner_section'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_banner_section]',
    array(
        'label'   => __( 'Enable Banner Section', 'blogauthor' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogauthor_options[banner_section_slider_layout]',
    array(
        'default'           => $default_options['banner_section_slider_layout'],
        'sanitize_callback' => 'blogauthor_sanitize_radio',
    )
);
$wp_customize->add_control(
    new Blogauthor_Radio_Image_Control(
        $wp_customize,
        'blogauthor_options[banner_section_slider_layout]',
        array(
            'label' => __( 'Banner Slider Layout', 'blogauthor' ),
            'section' => 'home_page_banner_option',
            'choices' => blogauthor_get_slider_layouts()
        )
    )
);


$wp_customize->add_setting(
    'blogauthor_options[number_of_slider_post]',
    array(
        'default'           => $default_options['number_of_slider_post'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[number_of_slider_post]',
    array(
        'label'       => __( 'Post In Slider', 'blogauthor' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            '3' => __( '3', 'blogauthor' ),
            '4' => __( '4', 'blogauthor' ),
            '5' => __( '5', 'blogauthor' ),
            '6' => __( '6', 'blogauthor' ),
        ),
    )
);


$wp_customize->add_setting(
    'blogauthor_options[slider_post_content_alignment]',
    array(
        'default'           => $default_options['slider_post_content_alignment'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[slider_post_content_alignment]',
    array(
        'label'       => __( 'Slider Content Alignment', 'blogauthor' ),
        'section'     => 'home_page_banner_option',
        'type'        => 'select',
        'choices'     => array(
            'text-right' => __( 'Align Right', 'blogauthor' ),
            'text-center' => __( 'Align Center', 'blogauthor' ),
            'text-left' => __( 'Align Left', 'blogauthor' ),
        ),
    )
);

$wp_customize->add_setting(
    'blogauthor_options[banner_section_cat]',
    array(
        'default'           => $default_options['banner_section_cat'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[banner_section_cat]',
    array(
        'label'   => __( 'Choose Banner Category', 'blogauthor' ),
        'section' => 'home_page_banner_option',
            'type'        => 'select',
        'choices'     => blogauthor_post_category_list(),
    )
);

$wp_customize->add_setting(
    'blogauthor_options[enable_banner_post_description]',
    array(
        'default'           => $default_options['enable_banner_post_description'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_banner_post_description]',
    array(
        'label'   => __( 'Enable Post Description', 'blogauthor' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogauthor_options[enable_banner_cat_meta]',
    array(
        'default'           => $default_options['enable_banner_cat_meta'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_banner_cat_meta]',
    array(
        'label'   => __( 'Enable Category Meta', 'blogauthor' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogauthor_options[enable_banner_author_meta]',
    array(
        'default'           => $default_options['enable_banner_author_meta'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_banner_author_meta]',
    array(
        'label'   => __( 'Enable Author Meta', 'blogauthor' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogauthor_options[enable_banner_date_meta]',
    array(
        'default'           => $default_options['enable_banner_date_meta'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_banner_date_meta]',
    array(
        'label'   => __( 'Enable Date On Banner', 'blogauthor' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogauthor_options[enable_banner_overlay]',
    array(
        'default'           => $default_options['enable_banner_overlay'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_banner_overlay]',
    array(
        'label'   => __( 'Enable Banner Overlay', 'blogauthor' ),
        'section' => 'home_page_banner_option',
        'type'    => 'checkbox',
    )
);