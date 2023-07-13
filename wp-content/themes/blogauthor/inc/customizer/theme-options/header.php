<?php
$wp_customize->add_setting(
    'blogauthor_options[enable_header_bg_overlay]',
    array(
        'default'           => $default_options['enable_header_bg_overlay'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_header_bg_overlay]',
    array(
        'label'    => __( 'Enable Image Overlay', 'blogauthor' ),
        'section'  => 'header_image',
        'type'     => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogauthor_options[header_image_size]',
    array(
        'default'           => $default_options['header_image_size'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[header_image_size]',
    array(
        'label'       => __( 'Select Header Size', 'blogauthor' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'blogauthor' ),

        'section'     => 'header_image',
        'type'        => 'select',
        'choices'     => array(
            'none' => __( 'Default', 'blogauthor' ),
            'small' => __( 'Small', 'blogauthor' ),
            'medium' => __( 'Medium', 'blogauthor' ),
            'large' => __( 'Large', 'blogauthor' ),
        ),
    )
);
/*Header Options*/
$wp_customize->add_section(
    'header_options' ,
    array(
        'title' => __( 'Header Options', 'blogauthor' ),
        'panel' => 'blogauthor_option_panel',
    )
);

$wp_customize->add_setting(
    'blogauthor_section_seperator_header_1',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogauthor_Seperator_Control(
        $wp_customize,
        'blogauthor_section_seperator_header_1',
        array(
            'settings' => 'blogauthor_section_seperator_header_1',
            'section' => 'header_options',
        )
    )
);

/* Header Style */
$wp_customize->add_setting(
    'blogauthor_options[header_style]',
    array(
        'default'           => $default_options['header_style'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[header_style]',
    array(
        'label'       => __( 'Header Style', 'blogauthor' ),
        'description' => __( 'Some options related to header may not show in the front-end based on header style chosen.', 'blogauthor' ),

        'section'     => 'header_options',
        'type'        => 'select',
        'choices'     => array(
            'header_style_1' => __( 'Header Style 1', 'blogauthor' ),
            'header_style_2' => __( 'Header Style 2', 'blogauthor' ),
            'header_style_3' => __( 'Header Style 3', 'blogauthor' ),
            'header_style_4' => __( 'Header Style 4', 'blogauthor' ),
        ),
    )
);

$wp_customize->add_setting(
    'blogauthor_options[enable_sticky_widget_area]',
    array(
        'default'           => $default_options['enable_sticky_widget_area'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_sticky_widget_area]',
    array(
        'label'    => __( 'Enable Widgets on Fixed Header Panel', 'blogauthor' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogauthor_is_header_style_1'
    )
);


$wp_customize->add_setting(
    'blogauthor_options[enable_fix_navigation_area]',
    array(
        'default'           => $default_options['enable_fix_navigation_area'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_fix_navigation_area]',
    array(
        'label'    => __( 'Enable Sticky Fixed Header Panel', 'blogauthor' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogauthor_is_header_style_1'
    )
);

$wp_customize->add_setting(
    'blogauthor_section_seperator_header_2',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogauthor_Seperator_Control(
        $wp_customize,
        'blogauthor_section_seperator_header_2',
        array(
            'settings' => 'blogauthor_section_seperator_header_2',
            'section' => 'header_options',
        )
    )
);

/*Enable Sticky Menu*/
$wp_customize->add_setting(
    'blogauthor_options[enable_sticky_menu]',
    array(
        'default'           => $default_options['enable_sticky_menu'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_sticky_menu]',
    array(
        'label'    => __( 'Enable Sticky Menu', 'blogauthor' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
    )
);


$wp_customize->add_setting(
    'blogauthor_section_seperator_header_4',
    array(
        'default'           => '',
        'capability'        => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_text_field'
    )
);

$wp_customize->add_control(
    new Blogauthor_Seperator_Control(
        $wp_customize,
        'blogauthor_section_seperator_header_4',
        array(
            'settings' => 'blogauthor_section_seperator_header_4',
            'section' => 'header_options',
        )
    )
);



/*Enable Today's Date*/
$wp_customize->add_setting(
    'blogauthor_options[enable_header_time]',
    array(
        'default'           => $default_options['enable_header_time'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_header_time]',
    array(
        'label'    => __( 'Enable Current Time', 'blogauthor' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogauthor_is_top_bar_enabled'
    )
);

/*Enable Today's Date*/
$wp_customize->add_setting(
    'blogauthor_options[enable_header_date]',
    array(
        'default'           => $default_options['enable_header_date'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_header_date]',
    array(
        'label'    => __( 'Enable Today\'s Date', 'blogauthor' ),
        'section'  => 'header_options',
        'type'     => 'checkbox',
        'active_callback'  => 'blogauthor_is_top_bar_enabled'
    )
);

/*Todays Date Format*/
$wp_customize->add_setting(
    'blogauthor_options[todays_date_format]',
    array(
        'default'           => $default_options['todays_date_format'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogauthor_options[todays_date_format]',
    array(
        'label'    => __( 'Today\'s Date Format', 'blogauthor' ),
        'description' => sprintf( wp_kses( __( '<a href="%s" target="_blank">Date and Time Formatting Documentation</a>.', 'blogauthor' ), array(  'a' => array( 'href' => array(), 'target' => array() ) ) ), esc_url( 'https://wordpress.org/support/article/formatting-date-and-time' ) ),
        'section'  => 'header_options',
        'type'     => 'text',
        'active_callback'  =>  function( $control ) {
            return (
                blogauthor_is_top_bar_enabled( $control )
                &&
                blogauthor_is_todays_date_enabled( $control )
            );
        }
    )
);

if(class_exists( 'WooCommerce' )){
    
    /*Enable Mini Cart Icon on header*/
    $wp_customize->add_setting(
        'blogauthor_options[enable_mini_cart_header]',   
        array(
            'default'           => $default_options['enable_mini_cart_header'],
            'sanitize_callback' => 'blogauthor_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'blogauthor_options[enable_mini_cart_header]',
        array(
            'label'    => __( 'Enable Mini Cart Icon', 'blogauthor' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );

    /*Enable Myaccount Link*/
    $wp_customize->add_setting(
        'blogauthor_options[enable_woo_my_account]',   
        array(
            'default'           => $default_options['enable_woo_my_account'],
            'sanitize_callback' => 'blogauthor_sanitize_checkbox',
        )
    );
    $wp_customize->add_control(
        'blogauthor_options[enable_woo_my_account]',
        array(
            'label'    => __( 'Enable My Account Icon', 'blogauthor' ),
            'section'  => 'header_options',
            'type'     => 'checkbox',
        )
    );
}