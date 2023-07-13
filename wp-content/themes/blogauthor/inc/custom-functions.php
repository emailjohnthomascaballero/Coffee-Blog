<?php
/**
 * Custom Functions.
 *
 * @package Blogauthor
 */

if (!function_exists('blogauthor_fonts_url')) :

    //Google Fonts URL
    function blogauthor_fonts_url()
    {

        $font_families = array(
            'Inter:wght@300;400;500;600;700',
            'Noto+Serif:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',

        );

        $fonts_url = add_query_arg(array(
            'family' => implode('&family=', $font_families),
            'display' => 'swap',
        ), 'https://fonts.googleapis.com/css2');

        return esc_url_raw($fonts_url);
    }

endif;

if (!function_exists('blogauthor_get_option')) :
    /**
     * Get customizer value by key.
     *
     * @param string $key Option key.
     * @return mixed Option value.
     * @since 1.0.0
     *
     */
    function blogauthor_get_option($key)
    {
        $key_value = '';
        if (!$key) {
            return $key_value;
        }
        $default_values = blogauthor_get_default_customizer_values();
        $customizer_values = get_theme_mod('blogauthor_options');
        $customizer_values = wp_parse_args($customizer_values, $default_values);

        $key_value = (isset($customizer_values[$key])) ? $customizer_values[$key] : '';
        return $key_value;
    }
endif;


/**
 * Blogauthor SVG Icon helper functions
 *
 * @package Blogauthor
 * @since 1.0.0
 */
if (!function_exists('blogauthor_theme_svg')):
    /**
     * Output and Get Theme SVG.
     * Output and get the SVG markup for an icon in the Blogauthor_SVG_Icons class.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function blogauthor_theme_svg($svg_name, $return = false)
    {

        if ($return) {

            return blogauthor_get_theme_svg($svg_name); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in blogauthor_get_theme_svg();.

        } else {

            echo blogauthor_get_theme_svg($svg_name); //phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in blogauthor_get_theme_svg();.

        }
    }

endif;

if (!function_exists('blogauthor_get_theme_svg')):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function blogauthor_get_theme_svg($svg_name)
    {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            Blogauthor_SVG_Icons::get_svg($svg_name),
            array(
                'svg' => array(
                    'class' => true,
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'aria-hidden' => true,
                    'role' => true,
                    'focusable' => true,
                ),
                'path' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'd' => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'points' => true,
                    'transform' => true,
                    'focusable' => true,
                ),

                'line' => array(
                    'stroke' => true,
                    'x1' => true,
                    'x2' => true,
                    'y1' => true,
                    'y2' => true,
                ),
            )
        );
        if (!$svg) {
            return false;
        }
        return $svg;

    }

endif;

if (!function_exists('blogauthor_svg_escape')):

    /**
     * Get information about the SVG icon.
     *
     * @param string $svg_name The name of the icon.
     * @param string $group The group the icon belongs to.
     * @param string $color Color code.
     */
    function blogauthor_svg_escape($input)
    {

        // Make sure that only our allowed tags and attributes are included.
        $svg = wp_kses(
            $input,
            array(
                'svg' => array(
                    'class' => true,
                    'xmlns' => true,
                    'width' => true,
                    'height' => true,
                    'viewbox' => true,
                    'aria-hidden' => true,
                    'role' => true,
                    'focusable' => true,
                ),
                'path' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'd' => true,
                    'transform' => true,
                ),
                'polygon' => array(
                    'fill' => true,
                    'fill-rule' => true,
                    'points' => true,
                    'transform' => true,
                    'focusable' => true,
                ),
            )
        );

        if (!$svg) {
            return false;
        }

        return $svg;

    }

endif;

if (!function_exists('blogauthor_social_menu_icon')) :

    function blogauthor_social_menu_icon($item_output, $item, $depth, $args)
    {

        // Add Icon
        if (isset($args->theme_location) && 'social-menu' === $args->theme_location) {

            $svg = Blogauthor_SVG_Icons::get_theme_svg_name($item->url);

            if (empty($svg)) {
                $svg = blogauthor_theme_svg('link', $return = true);
            }

            $item_output = str_replace($args->link_after, '</span>' . $svg, $item_output);
        }

        return $item_output;
    }

endif;

add_filter('walker_nav_menu_start_el', 'blogauthor_social_menu_icon', 10, 4);


if (!function_exists('blogauthor_comment_form_custom_fields')) :
    /**
     * Custom comment form fields.
     *
     * @param array $fields
     *
     * @return array
     */
    function blogauthor_comment_form_custom_fields($fields)
    {

        $commenter = wp_get_current_commenter();
        $req = get_option('require_name_email');
        $aria_req = ($req ? ' aria-required="true"' : '');

        if (is_user_logged_in()) {
            $fields = array_merge($fields, array(
                'author' => '<p class="comment-form-author"><label for="author" class="show-on-ie8">' . __('Name', 'blogauthor') . '</label><input id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" type="text" placeholder="' . __('Name', 'blogauthor') . '..." size="30" ' . $aria_req . ' /></p>',
                'email' => '<p class="comment-form-email"><label for="email" class="show-on-ie8">' . __('Email', 'blogauthor') . '</label><input id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" type="text" placeholder="' . __('your@email.com', 'blogauthor') . '..." ' . $aria_req . ' /></p>',
            ));
        } else {
            $fields = array_merge($fields, array(
                'author' => '<p class="comment-form-author"><label for="author" class="show-on-ie8">' . __('Name', 'blogauthor') . '</label><input id="author" name="author" value="' . esc_attr($commenter['comment_author']) . '" type="text" placeholder="' . __('Name', 'blogauthor') . '..." size="30" ' . $aria_req . ' /></p><!--',
                'email' => '--><p class="comment-form-email"><label for="name" class="show-on-ie8">' . __('Email', 'blogauthor') . '</label><input id="email" name="email" value="' . esc_attr($commenter['comment_author_email']) . '" size="30" type="text" placeholder="' . __('your@email.com', 'blogauthor') . '..." ' . $aria_req . ' /></p><!--',
                'url' => '--><p class="comment-form-url"><label for="url" class="show-on-ie8">' . __('Url', 'blogauthor') . '</label><input id="url" name="url" value="' . esc_attr($commenter['comment_author_url']) . '" size="30" placeholder="' . __('Website', 'blogauthor') . '..." type="text"></p>',
            ));
        }

        return $fields;
    }
endif;
add_filter('comment_form_default_fields', 'blogauthor_comment_form_custom_fields');

if (!function_exists('blogauthor_get_slider_layouts')) :
    /**
     * Returns general layout options.
     *
     * @return array Options array.
     * @since 1.0.0
     *
     */
    function blogauthor_get_slider_layouts()
    {
        $options = apply_filters('banner_section_slider_layout', array(
            'site-banner-layout-slider' => array(
                'url' => get_template_directory_uri() . '/assets/images/slider-layout-1.png',
                'label' => esc_html__('Slider Layout 1', 'blogauthor'),
            ),
            'site-banner-layout-carousal' => array(
                'url' => get_template_directory_uri() . '/assets/images/slider-layout-2.png',
                'label' => esc_html__('Slider Layout 2', 'blogauthor'),
            ),
            
        ));
        return $options;
    }

endif;

if (!function_exists('blogauthor_get_general_layouts')) :
    /**
     * Returns general layout options.
     *
     * @return array Options array.
     * @since 1.0.0
     *
     */
    function blogauthor_get_general_layouts()
    {
        $options = apply_filters('blogauthor_general_layouts', array(
            'left-sidebar' => array(
                'url' => get_template_directory_uri() . '/assets/images/left_sidebar.png',
                'label' => esc_html__('Left Sidebar', 'blogauthor'),
            ),
            'right-sidebar' => array(
                'url' => get_template_directory_uri() . '/assets/images/right_sidebar.png',
                'label' => esc_html__('Right Sidebar', 'blogauthor'),
            ),
            'no-sidebar' => array(
                'url' => get_template_directory_uri() . '/assets/images/no_sidebar.png',
                'label' => esc_html__('No Sidebar', 'blogauthor'),
            ),
        ));
        return $options;
    }

endif;



if( !function_exists( 'blogauthor_post_category_list' ) ) :

    // Post Category List.
    function blogauthor_post_category_list( $select_cat = true ){

        $post_cat_lists = get_categories(
            array(
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        if( $select_cat ){

            $post_cat_cat_array[''] = esc_html__( '-- Select Category --','blogauthor' );

        }

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;

if( !function_exists( 'blogauthor_woocommerce_product_cat' ) ) :

    // Post Category List.
    function blogauthor_woocommerce_product_cat(){

        $post_cat_lists = get_categories(
            array(
                'taxonomy'     => 'product_cat',
                'orderby'      => 'name',
                'show_count'   => 0,
                'pad_counts'   => 0,
                'hide_empty' => '0',
                'exclude' => '1',
            )
        );

        $post_cat_cat_array = array();
        $post_cat_cat_array[''] = esc_html__( '--Select Category--','blogauthor' );

        foreach ( $post_cat_lists as $post_cat_list ) {

            $post_cat_cat_array[$post_cat_list->slug] = $post_cat_list->name;

        }

        return $post_cat_cat_array;
    }

endif;


if (!function_exists('blogauthor_get_archive_layouts')) :
    /**
     * Returns archive layout options.
     *
     * @return array Options array.
     * @since 1.0.0
     *
     */
    function blogauthor_get_archive_layouts()
    {
        $options = apply_filters('blogauthor_archive_layouts', array(
            'archive_style_1' => array(
                'url' => get_template_directory_uri() . '/assets/images/archive-style-1.png',
                'label' => esc_html__('Archive Layout Full', 'blogauthor'),
            ),
            'archive_style_2' => array(
                'url' => get_template_directory_uri() . '/assets/images/archive-style-2.png',
                'label' => esc_html__('Archive Layout Half', 'blogauthor'),
            ),
            'archive_style_3' => array(
                'url' => get_template_directory_uri() . '/assets/images/archive-style-3.png',
                'label' => esc_html__('Archive Layout Mixed', 'blogauthor'),
            ),
            'archive_style_4' => array(
                'url' => get_template_directory_uri() . '/assets/images/archive-style-4.png',
                'label' => esc_html__('Archive Layout Tiles', 'blogauthor'),
            ),
        ));
        return $options;
    }

endif;
if (!function_exists('blogauthor_get_page_layout')) :
    /**
     * Get Page Layout based on the post meta or customizer value
     *
     * @return string Page Layout.
     * @since 1.0.0
     *
     */
    function blogauthor_get_page_layout()
    {

        global $post;

        $page_layout = '';

        // For homepage regardless of static page or latest posts
        if (is_front_page()) {
            return blogauthor_get_option('front_page_layout');
        }

        // For Posts page chosen on reading settings
        if (is_home()) {
            $page_layout = blogauthor_get_option('global_sidebar_layout');
            return $page_layout;
        }

        // Fetch from customizer if everything else fails
        if (empty($page_layout)) {
            $page_layout = blogauthor_get_option('global_sidebar_layout');
        }

        if( is_single() || is_page() ){
            $blogauthor_post_sidebar = esc_attr( get_post_meta( $post->ID, 'blogauthor_post_sidebar_option', true ) );
            if( $blogauthor_post_sidebar == 'global-sidebar' || empty( $blogauthor_post_sidebar ) ){

                $page_layout = blogauthor_get_option('global_sidebar_layout');
            }else{
                $page_layout = $blogauthor_post_sidebar;
            }

        }

        return $page_layout;
    }
endif;

if ( ! function_exists( 'blogauthor_get_footer_layouts' ) ) :
    /**
     * Returns footer layout options.
     *
     * @since 1.0.0
     *
     * @return array Options array.
     */
    function blogauthor_get_footer_layouts() {
        $options = apply_filters( 'blogauthor_footer_layouts', array(
            'footer_layout_1'  => array(
                'url'   => get_template_directory_uri().'/assets/images/widget-column-4.png',
                'label' => esc_html__( 'Four Columns', 'blogauthor' ),
            ),
            'footer_layout_2' => array(
                'url'   => get_template_directory_uri().'/assets/images/widget-column-3.png',
                'label' => esc_html__( 'Three Columns', 'blogauthor' ),
            ),
            'footer_layout_3' => array(
                'url'   => get_template_directory_uri().'/assets/images/widget-column-2.png',
                'label' => esc_html__( 'Two Columns', 'blogauthor' ),
            )
        ) );
        return $options;
    }
endif;

if (!function_exists('blogauthor_print_first_instance_of_block')):

    /** Print the first instance of a block in the content, and then break away.
     * @param string $block_name The full block type name, or a partial match.
     *                                Example: `core/image`, `core-embed/*`.
     * @param string|null $content The content to search in. Use null for get_the_content().
     * @param int $instances How many instances of the block will be printed (max). Default  1.
     * @return bool Returns true if a block was located & printed, otherwise false.
     */
    function blogauthor_print_first_instance_of_block($block_name, $content = null, $instances = 1)
    {
        $instances_count = 0;
        $blocks_content = '';

        if (!$content) {
            $content = get_the_content();
        }

        // Parse blocks in the content.
        $blocks = parse_blocks($content);

        // Loop blocks.
        foreach ($blocks as $block) {

            // Sanity check.
            if (!isset($block['blockName'])) {
                continue;
            }

            // Check if this the block matches the $block_name.
            $is_matching_block = false;

            // If the block ends with *, try to match the first portion.
            if ('*' === $block_name[-1]) {
                $is_matching_block = 0 === strpos($block['blockName'], rtrim($block_name, '*'));
            } else {
                $is_matching_block = $block_name === $block['blockName'];
            }

            if ($is_matching_block) {
                // Increment count.
                $instances_count++;

                // Add the block HTML.
                $blocks_content .= render_block($block);

                // Break the loop if the $instances count was reached.
                if ($instances_count >= $instances) {
                    break;
                }
            }
        }

        if ($blocks_content) {
            /** This filter is documented in wp-includes/post-template.php */
            echo apply_filters('the_content', $blocks_content); // phpcs:ignore WordPress.Security.EscapeOutput
            return true;
        }

        return false;
    }
endif;

if ( ! function_exists( 'blogauthor_excerpt_length' ) ) {

    function blogauthor_excerpt_length( $excerpt_length ) {
        if ( is_admin() && !wp_doing_ajax()) {
            return $excerpt_length;
        }
        $custom_length = absint(blogauthor_get_option( 'excerpt_length' ));
        if ( absint( $custom_length ) > 0 ) {
            $excerpt_length = absint( $custom_length );
        }
        return $excerpt_length;
    }
    
}
add_filter( 'excerpt_length', 'blogauthor_excerpt_length', 999 );

if( ! function_exists( 'blogauthor_estimated_read_time' ) ) :
    /**
    * Estimated reading time in minutes
    * 
    * @param $content
    * @param $with_gutenberg
    * 
    * @return int estimated time in minutes
    */

    function blogauthor_estimated_read_time ( $content = '', $with_gutenberg = false ) {
        // In case if content is build with gutenberg parse blocks
        if ( $with_gutenberg ) {
            $blocks = parse_blocks( $content );
            $contentHtml = '';

            foreach ( $blocks as $block ) {
                $contentHtml .= render_block( $block );
            }

            $content = $contentHtml;
        }
                
        // Remove HTML tags from string
        $content = wp_strip_all_tags( $content );
                
        // When content is empty return 0
        if ( !$content ) {
            return 0;
        }
               
        // Count words containing string
        $words_count = str_word_count( $content );
        $words_per_minute = blogauthor_get_option( 'words_per_minute'); 
        // Calculate time for read all words and round
        $minutes = ceil( $words_count / $words_per_minute );
                
        return $minutes;
    }
endif;


function blogauthor_gravatar_alt($blogauthor_gravatar) {
    if (have_comments()) {
        $alt = get_comment_author();
    }
    else {
        $alt = get_the_author_meta('display_name');
    }
    $blogauthor_gravatar = str_replace('alt=\'\'', 'alt=\'Avatar for ' . $alt . '\'', $blogauthor_gravatar);
    return $blogauthor_gravatar;
}
add_filter('get_avatar', 'blogauthor_gravatar_alt');

if (!function_exists('blogauthor_excerpt_more') && !is_admin()):
    /**
     * Implement read more in excerpt.
     *
     * @since 1.0.0
     *
     * @param string $more The string shown within the more link.
     * @return string The excerpt.
     */
    function blogauthor_excerpt_more($more) {
        $excerpt_read_more = blogauthor_get_option('excerpt_read_more');

        $flag_apply_excerpt_read_more = apply_filters('blogauthor_filter_excerpt_read_more', true);
        if (true !== $flag_apply_excerpt_read_more) {
            return $more;
        }
        $enable_excerpt_read_more = blogauthor_get_option('enable_excerpt_read_more');
        if ($enable_excerpt_read_more != 1) {
            return '';
        }
        $output         = $more;
        $read_more_text = esc_html($excerpt_read_more);
        if (!empty($read_more_text)) {
            $output = ' <a href="'.esc_url(get_permalink()).'" class="read-more-link">'.esc_html($read_more_text).'</a>';

            $output = apply_filters('blogauthor_filter_read_more_link', $output);
        }
        return $output;

    }
    add_filter('excerpt_more', 'blogauthor_excerpt_more');
endif;


if ( ! function_exists( 'blogauthor_force_dark_mode' ) ) {

    function blogauthor_force_dark_mode() {
        if (blogauthor_get_option( 'enable_always_dark_mode' ) == true) {
            echo "data-theme='dark'";
        }

    }
    
}