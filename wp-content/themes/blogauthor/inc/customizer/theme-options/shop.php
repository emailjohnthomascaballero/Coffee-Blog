<?php
$wp_customize->add_section(
    'home_page_shop_option',
    array(
        'title'      => __( 'Shop  Section Options', 'blogauthor' ),
        'panel'      => 'theme_home_option_panel',
    )
);

/* Home Page Layout */
$wp_customize->add_setting(
    'blogauthor_options[enable_shop_section]',
    array(
        'default'           => $default_options['enable_shop_section'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_shop_section]',
    array(
        'label'   => __( 'Enable Shop Section', 'blogauthor' ),
        'section' => 'home_page_shop_option',
        'type'    => 'checkbox',
    )
);

$wp_customize->add_setting(
    'blogauthor_options[shop_post_title]',
    array(
        'default'           => $default_options['shop_post_title'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogauthor_options[shop_post_title]',
    array(
        'label'    => __( 'Shop Post Title', 'blogauthor' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);

$wp_customize->add_setting(
    'blogauthor_options[shop_post_description]',
    array(
        'default'           => $default_options['shop_post_description'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogauthor_options[shop_post_description]',
    array(
        'label'    => __( 'Shop Post Description', 'blogauthor' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'textarea',
    )
);

$wp_customize->add_setting(
    'blogauthor_options[shop_select_product_from]',
    array(
        'default'           => $default_options['shop_select_product_from'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[shop_select_product_from]',
    array(
        'label'       => __( 'Select Product From', 'blogauthor' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            'custom'            => __('Custom Select', 'blogauthor'),
            'recent-products'   => __('Recent Products', 'blogauthor'),
            'popular-products'  => __('Popular Products', 'blogauthor'),
            'sale-products'     => __('Sale Products', 'blogauthor'),
        )
    )
);


$wp_customize->add_setting(
    'blogauthor_options[select_product_category]',
    array(
        'default'           => $default_options['select_product_category'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[select_product_category]',
    array(
        'label'   => __( 'Select Product Category', 'blogauthor' ),
        'section' => 'home_page_shop_option',
        'type'        => 'select',
        'choices'     => blogauthor_woocommerce_product_cat(),
        'active_callback' => 'blogauthor_shop_select_product_from'
    )
);

$wp_customize->add_setting(
    'blogauthor_options[shop_number_of_column]',
    array(
        'default'           => $default_options['shop_number_of_column'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[shop_number_of_column]',
    array(
        'label'       => __( 'Select Number Of Column', 'blogauthor' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'blogauthor'),
            '3'  => __('3', 'blogauthor'),
            '4'  => __('4', 'blogauthor'),
        )
    )
);

$wp_customize->add_setting(
    'blogauthor_options[shop_number_of_product]',
    array(
        'default'           => $default_options['shop_number_of_product'],
        'sanitize_callback' => 'blogauthor_sanitize_select',
    )
);
$wp_customize->add_control(
    'blogauthor_options[shop_number_of_product]',
    array(
        'label'       => __( 'Select Number Of Product', 'blogauthor' ),
        'section'     => 'home_page_shop_option',
        'type'        => 'select',
        'choices' => array(
            '2'  => __('2', 'blogauthor'),
            '3'  => __('3', 'blogauthor'),
            '4'  => __('4', 'blogauthor'),
            '5'  => __('5', 'blogauthor'),
            '6'  => __('6', 'blogauthor'),
            '7'  => __('7', 'blogauthor'),
            '8'  => __('8', 'blogauthor'),
            '9'  => __('9', 'blogauthor'),
            '10'  => __('10', 'blogauthor'),
            '11'  => __('11', 'blogauthor'),
            '12'  => __('12', 'blogauthor'),
        )
    )
);

$wp_customize->add_setting(
    'blogauthor_options[shop_post_button_text]',
    array(
        'default'           => $default_options['shop_post_button_text'],
        'sanitize_callback' => 'sanitize_text_field',
    )
);
$wp_customize->add_control(
    'blogauthor_options[shop_post_button_text]',
    array(
        'label'    => __( 'Shop section Button Text', 'blogauthor' ),
        'section'  => 'home_page_shop_option',
        'type'     => 'text',
    )
);
$wp_customize->add_setting(
    'blogauthor_options[shop_post_button_url]',
    array(
        'default'           => '',
        'sanitize_callback' => 'esc_url_raw',
    )
);
$wp_customize->add_control(
    'blogauthor_options[shop_post_button_url]',
    array(
        'label'           => __( 'Button Link', 'blogauthor' ),
        'section'         => 'home_page_shop_option',
        'type'            => 'text',
        'description'     => __( 'Leave empty if you don\'t want the image to have a link', 'blogauthor' ),
    )
);