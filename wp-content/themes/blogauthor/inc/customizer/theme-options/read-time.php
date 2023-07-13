<?php
$widgets_link = admin_url( 'widgets.php' );

/*Add footer theme option*/
$wp_customize->add_section(
    'read_time_options' ,
    array(
        'title' => __( 'Read Time Options', 'blogauthor' ),
        'panel' => 'blogauthor_option_panel',
    )
);
$wp_customize->add_setting(
    'blogauthor_options[enable_read_time_option]',
    array(
        'default'           => $default_options['enable_read_time_option'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox',
    )
);
$wp_customize->add_control(
    'blogauthor_options[enable_read_time_option]',
    array(
        'label'       => __( 'Enable Read Time Option', 'blogauthor' ),
        'section'     => 'read_time_options',
        'type'        => 'checkbox',
    )
);

/*Display read time in*/
$wp_customize->add_setting(
    'blogauthor_options[display_read_time_in]',
    array(
        'default'           => $default_options['display_read_time_in'],
        'sanitize_callback' => 'blogauthor_sanitize_checkbox_multiple',
    )
);
$wp_customize->add_control(
    new Blogauthor_Checkbox_Multiple(
        $wp_customize,
        'blogauthor_options[display_read_time_in]',
        array(
            'label' => __( 'Display Read Time', 'blogauthor' ),
            'section' => 'read_time_options',
            'choices' => array(
                'home-page' => __('Homepage', 'blogauthor'),
                'single-page' => __('Single Page', 'blogauthor'),
                'archive-page' => __('Archive Page', 'blogauthor'),
            )
        )
    )
);


$wp_customize->add_setting(
    'blogauthor_options[words_per_minute]',
    array(
        'default' => $default_options['words_per_minute'],
        'sanitize_callback' => 'absint',
    )
);
$wp_customize->add_control(
    'blogauthor_options[words_per_minute]',
    array(
        'label' => __('Words Per Minute', 'blogauthor'),
        'description' => __('Number of Words per minut', 'blogauthor'),
        'section' => 'read_time_options',
        'type' => 'number',
        'input_attrs' => array('min' => 1, 'max' => 300, 'style' => 'width: 150px;'),
    )
);
