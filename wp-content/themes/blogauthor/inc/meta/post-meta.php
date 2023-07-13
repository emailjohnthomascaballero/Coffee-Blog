<?php
/**
* Sidebar Metabox.
*
* @package Blogauthor
*/
if( !function_exists( 'blogauthor_sanitize_sidebar_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogauthor_sanitize_sidebar_option_meta( $input ){

        $metabox_options = array( 'global-sidebar','left-sidebar','right-sidebar','no-sidebar' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }
    }

endif;

if( !function_exists('blogauthor_sanitize_meta_pagination') ):

    /** Sanitize Enable Disable Checkbox **/
    function blogauthor_sanitize_meta_pagination( $input ) {

        $valid_keys = array('global-layout','no-navigation','norma-navigation','ajax-next-post-load');
        if ( in_array( $input , $valid_keys ) ) {
            return $input;
        }
        return '';

    }

endif;

if( !function_exists( 'blogauthor_sanitize_post_layout_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogauthor_sanitize_post_layout_option_meta( $input ){

        $metabox_options = array( 'global-layout','layout-1','layout-2' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;


if( !function_exists( 'blogauthor_sanitize_header_overlay_option_meta' ) ) :

    // Sidebar Option Sanitize.
    function blogauthor_sanitize_header_overlay_option_meta( $input ){

        $metabox_options = array( 'global-layout','enable-overlay' );
        if( in_array( $input,$metabox_options ) ){

            return $input;

        }else{

            return '';

        }

    }

endif;

add_action( 'add_meta_boxes', 'blogauthor_metabox' );

if( ! function_exists( 'blogauthor_metabox' ) ):


    function  blogauthor_metabox() {
        
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'blogauthor' ),
            'blogauthor_post_metafield_callback',
            'post', 
            'normal', 
            'high'
        );
        add_meta_box(
            'theme-custom-metabox',
            esc_html__( 'Layout Settings', 'blogauthor' ),
            'blogauthor_post_metafield_callback',
            'page',
            'normal', 
            'high'
        ); 
    }

endif;

$blogauthor_page_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'blogauthor' ),
    'layout-2' => esc_html__( 'Banner Layout', 'blogauthor' ),
);

$blogauthor_post_sidebar_fields = array(
    'global-sidebar' => array(
                    'id'        => 'post-global-sidebar',
                    'value' => 'global-sidebar',
                    'label' => esc_html__( 'Global sidebar', 'blogauthor' ),
                ),
    'right-sidebar' => array(
                    'id'        => 'post-left-sidebar',
                    'value' => 'right-sidebar',
                    'label' => esc_html__( 'Right sidebar', 'blogauthor' ),
                ),
    'left-sidebar' => array(
                    'id'        => 'post-right-sidebar',
                    'value'     => 'left-sidebar',
                    'label'     => esc_html__( 'Left sidebar', 'blogauthor' ),
                ),
    'no-sidebar' => array(
                    'id'        => 'post-no-sidebar',
                    'value'     => 'no-sidebar',
                    'label'     => esc_html__( 'No sidebar', 'blogauthor' ),
                ),
);

$blogauthor_post_layout_options = array(
    'layout-1' => esc_html__( 'Simple Layout', 'blogauthor' ),
    'layout-2' => esc_html__( 'Banner Layout', 'blogauthor' ),
);

$blogauthor_header_overlay_options = array(
    'global-layout' => esc_html__( 'Global Layout', 'blogauthor' ),
    'enable-overlay' => esc_html__( 'Enable Header Overlay', 'blogauthor' ),
);


/**
 * Callback function for post option.
*/
if( ! function_exists( 'blogauthor_post_metafield_callback' ) ):
    
    function blogauthor_post_metafield_callback() {
        global $post, $blogauthor_post_sidebar_fields, $blogauthor_post_layout_options,  $blogauthor_page_layout_options, $blogauthor_header_overlay_options;
        $post_type = get_post_type($post->ID);
        wp_nonce_field( basename( __FILE__ ), 'blogauthor_post_meta_nonce' ); ?>
        
        <div class="metabox-main-block">

            <div class="metabox-navbar">
                <ul>

                    <li>
                        <a id="metabox-navbar-appearance"  class="metabox-navbar-active" href="javascript:void(0)">

                            <?php esc_html_e('Appearance Settings', 'blogauthor'); ?>

                        </a>
                    </li>

                    <?php if ($post_type != 'page') { ?>
                        <li>
                            <a id="metabox-navbar-general" href="javascript:void(0)">

                                <?php esc_html_e('General Settings', 'blogauthor'); ?>

                            </a>
                        </li>
                    <?php } ?>


                    <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ): ?>
                        <li>
                            <a id="twp-tab-booster" href="javascript:void(0)">

                                <?php esc_html_e('Booster Extension Settings', 'blogauthor'); ?>

                            </a>
                        </li>
                    <?php endif; ?>

                </ul>
            </div>

            <div class="twp-tab-content">

                <div id="metabox-navbar-general-content" class="metabox-content-wrap">

                    <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php esc_html_e('Sidebar Layout','blogauthor'); ?></h3>

                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <?php
                            $blogauthor_post_sidebar = esc_html( get_post_meta( $post->ID, 'blogauthor_post_sidebar_option', true ) ); 
                            if( $blogauthor_post_sidebar == '' ){ $blogauthor_post_sidebar = 'global-sidebar'; }

                            foreach ( $blogauthor_post_sidebar_fields as $blogauthor_post_sidebar_field) { ?>

                                <label class="description">

                                    <input type="radio" name="blogauthor_post_sidebar_option" value="<?php echo esc_attr( $blogauthor_post_sidebar_field['value'] ); ?>" <?php if( $blogauthor_post_sidebar_field['value'] == $blogauthor_post_sidebar ){ echo "checked='checked'";} if( empty( $blogauthor_post_sidebar ) && $blogauthor_post_sidebar_field['value']=='right-sidebar' ){ echo "checked='checked'"; } ?>/>&nbsp;<?php echo esc_html( $blogauthor_post_sidebar_field['label'] ); ?>

                                </label>

                            <?php } ?>

                        </div>

                    </div>

                </div>


                <div id="metabox-navbar-appearance-content" class="metabox-content-wrap metabox-content-wrap-active">

                    <?php if( $post_type == 'page' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Banner Layout','blogauthor'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogauthor_page_layout = esc_html( get_post_meta( $post->ID, 'blogauthor_page_layout', true ) ); 
                                if( $blogauthor_page_layout == '' ){ $blogauthor_page_layout = 'layout-1'; }

                                foreach ( $blogauthor_page_layout_options as $key => $blogauthor_page_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogauthor_page_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogauthor_page_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogauthor_page_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','blogauthor'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                <?php
                                $blogauthor_ed_header_overlay = esc_attr( get_post_meta( $post->ID, 'blogauthor_ed_header_overlay', true ) ); ?>

                                <input type="checkbox" id="blogauthor-header-overlay" name="blogauthor_ed_header_overlay" value="1" <?php if( $blogauthor_ed_header_overlay ){ echo "checked='checked'";} ?>/>

                                <label for="blogauthor-header-overlay"><?php esc_html_e( 'Enable Header Overlay','blogauthor' ); ?></label>

                            </div>

                        </div>

                    <?php endif; ?>

                    <?php if( $post_type == 'post' ): ?>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Title Layout','blogauthor'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogauthor_post_layout = esc_html( get_post_meta( $post->ID, 'blogauthor_post_layout', true ) ); 

                                foreach ( $blogauthor_post_layout_options as $key => $blogauthor_post_layout_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogauthor_post_layout" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogauthor_post_layout ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogauthor_post_layout_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Header Overlay','blogauthor'); ?></h3>

                            <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                                <?php
                                $blogauthor_header_overlay = esc_html( get_post_meta( $post->ID, 'blogauthor_header_overlay', true ) ); 
                                if( $blogauthor_header_overlay == '' ){ $blogauthor_header_overlay = 'global-layout'; }

                                foreach ( $blogauthor_header_overlay_options as $key => $blogauthor_header_overlay_option) { ?>

                                    <label class="description">
                                        <input type="radio" name="blogauthor_header_overlay" value="<?php echo esc_attr( $key ); ?>" <?php if( $key == $blogauthor_header_overlay ){ echo "checked='checked'";} ?>/>&nbsp;<?php echo esc_html( $blogauthor_header_overlay_option ); ?>
                                    </label>

                                <?php } ?>

                            </div>

                        </div>

                    <?php endif; ?>
<!-- 
                     <div class="metabox-opt-panel">

                        <h3 class="meta-opt-title"><?php //esc_html_e('Navigation Setting','blogauthor'); ?></h3>

                        <?php //$twp_disable_ajax_load_next_post = esc_attr( get_post_meta($post->ID, 'twp_disable_ajax_load_next_post', true) ); ?>
                        <div class="metabox-opt-wrap metabox-opt-wrap-alt">

                            <label><b><?php //esc_html_e( 'Navigation Type','blogauthor' ); ?></b></label>

                            <select name="twp_disable_ajax_load_next_post">

                                <option <?php //if( $twp_disable_ajax_load_next_post == '' || $twp_disable_ajax_load_next_post == 'global-layout' ){ echo 'selected'; } ?> value="global-layout"><?php //esc_html_e('Global Layout','blogauthor'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'no-navigation' ){ echo 'selected'; } ?> value="no-navigation"><?php //esc_html_e('Disable Navigation','blogauthor'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'norma-navigation' ){ echo 'selected'; } ?> value="norma-navigation"><?php //esc_html_e('Next Previous Navigation','blogauthor'); ?></option>
                                <option <?php //if( $twp_disable_ajax_load_next_post == 'ajax-next-post-load' ){ echo 'selected'; } ?> value="ajax-next-post-load"><?php //esc_html_e('Ajax Load Next 3 Posts Contents','blogauthor'); ?></option>

                            </select>

                        </div>
                    </div> -->

                </div>

                <?php if( $post_type == 'post' && class_exists('Booster_Extension_Class') ):

                    
                    $blogauthor_ed_post_views = esc_html( get_post_meta( $post->ID, 'blogauthor_ed_post_views', true ) );
                    $blogauthor_ed_post_read_time = esc_html( get_post_meta( $post->ID, 'blogauthor_ed_post_read_time', true ) );
                    $blogauthor_ed_post_like_dislike = esc_html( get_post_meta( $post->ID, 'blogauthor_ed_post_like_dislike', true ) );
                    $blogauthor_ed_post_author_box = esc_html( get_post_meta( $post->ID, 'blogauthor_ed_post_author_box', true ) );
                    $blogauthor_ed_post_social_share = esc_html( get_post_meta( $post->ID, 'blogauthor_ed_post_social_share', true ) );
                    $blogauthor_ed_post_reaction = esc_html( get_post_meta( $post->ID, 'blogauthor_ed_post_reaction', true ) );
                    $blogauthor_ed_post_rating = esc_html( get_post_meta( $post->ID, 'blogauthor_ed_post_rating', true ) );
                    ?>

                    <div id="twp-tab-booster-content" class="metabox-content-wrap">

                        <div class="metabox-opt-panel">

                            <h3 class="meta-opt-title"><?php esc_html_e('Booster Extension Plugin Content','blogauthor'); ?></h3>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogauthor-ed-post-views" name="blogauthor_ed_post_views" value="1" <?php if( $blogauthor_ed_post_views ){ echo "checked='checked'";} ?>/>
                                    <label for="blogauthor-ed-post-views"><?php esc_html_e( 'Disable Post Views','blogauthor' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogauthor-ed-post-read-time" name="blogauthor_ed_post_read_time" value="1" <?php if( $blogauthor_ed_post_read_time ){ echo "checked='checked'";} ?>/>
                                    <label for="blogauthor-ed-post-read-time"><?php esc_html_e( 'Disable Post Read Time','blogauthor' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogauthor-ed-post-like-dislike" name="blogauthor_ed_post_like_dislike" value="1" <?php if( $blogauthor_ed_post_like_dislike ){ echo "checked='checked'";} ?>/>
                                    <label for="blogauthor-ed-post-like-dislike"><?php esc_html_e( 'Disable Post Like Dislike','blogauthor' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogauthor-ed-post-author-box" name="blogauthor_ed_post_author_box" value="1" <?php if( $blogauthor_ed_post_author_box ){ echo "checked='checked'";} ?>/>
                                    <label for="blogauthor-ed-post-author-box"><?php esc_html_e( 'Disable Post Author Box','blogauthor' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogauthor-ed-post-social-share" name="blogauthor_ed_post_social_share" value="1" <?php if( $blogauthor_ed_post_social_share ){ echo "checked='checked'";} ?>/>
                                    <label for="blogauthor-ed-post-social-share"><?php esc_html_e( 'Disable Post Social Share','blogauthor' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogauthor-ed-post-reaction" name="blogauthor_ed_post_reaction" value="1" <?php if( $blogauthor_ed_post_reaction ){ echo "checked='checked'";} ?>/>
                                    <label for="blogauthor-ed-post-reaction"><?php esc_html_e( 'Disable Post Reaction','blogauthor' ); ?></label>

                            </div>

                            <div class="metabox-opt-wrap theme-checkbox-wrap">

                                    <input type="checkbox" id="blogauthor-ed-post-rating" name="blogauthor_ed_post_rating" value="1" <?php if( $blogauthor_ed_post_rating ){ echo "checked='checked'";} ?>/>
                                    <label for="blogauthor-ed-post-rating"><?php esc_html_e( 'Disable Post Rating','blogauthor' ); ?></label>

                            </div>

                        </div>

                    </div>

                <?php endif; ?>
                
            </div>

        </div>  
            
    <?php }
endif;

// Save metabox value.
add_action( 'save_post', 'blogauthor_save_post_meta' );

if( ! function_exists( 'blogauthor_save_post_meta' ) ):

    function blogauthor_save_post_meta( $post_id ) {

        global $post, $blogauthor_post_sidebar_fields, $blogauthor_post_layout_options, $blogauthor_header_overlay_options,  $blogauthor_page_layout_options;

        if ( !isset( $_POST[ 'blogauthor_post_meta_nonce' ] ) || !wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['blogauthor_post_meta_nonce'] ) ), basename( __FILE__ ) ) ){

            return;

        }

        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ){

            return;

        }
            
        if ( isset( $_POST['post_type'] ) && 'page' == $_POST['post_type'] ) {  

            if ( !current_user_can( 'edit_page', $post_id ) ){  

                return $post_id;

            }

        }elseif( !current_user_can( 'edit_post', $post_id ) ) {

            return $post_id;

        }


        foreach ( $blogauthor_post_sidebar_fields as $blogauthor_post_sidebar_field ) {  
            

                $old = esc_html( get_post_meta( $post_id, 'blogauthor_post_sidebar_option', true ) ); 
                $new = isset( $_POST['blogauthor_post_sidebar_option'] ) ? blogauthor_sanitize_sidebar_option_meta( wp_unslash( $_POST['blogauthor_post_sidebar_option'] ) ) : '';

                if ( $new && $new != $old ){

                    update_post_meta ( $post_id, 'blogauthor_post_sidebar_option', $new );

                }elseif( '' == $new && $old ) {

                    delete_post_meta( $post_id,'blogauthor_post_sidebar_option', $old );

                }

            
        }

        $twp_disable_ajax_load_next_post_old = esc_html( get_post_meta( $post_id, 'twp_disable_ajax_load_next_post', true ) ); 
        $twp_disable_ajax_load_next_post_new = isset( $_POST['twp_disable_ajax_load_next_post'] ) ? blogauthor_sanitize_meta_pagination( wp_unslash( $_POST['twp_disable_ajax_load_next_post'] ) ) : '';

        if( $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_new != $twp_disable_ajax_load_next_post_old ){

            update_post_meta ( $post_id, 'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_new );

        }elseif( '' == $twp_disable_ajax_load_next_post_new && $twp_disable_ajax_load_next_post_old ) {

            delete_post_meta( $post_id,'twp_disable_ajax_load_next_post', $twp_disable_ajax_load_next_post_old );

        }


        foreach ( $blogauthor_post_layout_options as $blogauthor_post_layout_option ) {  
            
            $blogauthor_post_layout_old = esc_html( get_post_meta( $post_id, 'blogauthor_post_layout', true ) ); 
            $blogauthor_post_layout_new = isset( $_POST['blogauthor_post_layout'] ) ? blogauthor_sanitize_post_layout_option_meta( wp_unslash( $_POST['blogauthor_post_layout'] ) ) : '';

            if ( $blogauthor_post_layout_new && $blogauthor_post_layout_new != $blogauthor_post_layout_old ){

                update_post_meta ( $post_id, 'blogauthor_post_layout', $blogauthor_post_layout_new );

            }elseif( '' == $blogauthor_post_layout_new && $blogauthor_post_layout_old ) {

                delete_post_meta( $post_id,'blogauthor_post_layout', $blogauthor_post_layout_old );

            }
            
        }



        foreach ( $blogauthor_header_overlay_options as $blogauthor_header_overlay_option ) {  
            
            $blogauthor_header_overlay_old = esc_html( get_post_meta( $post_id, 'blogauthor_header_overlay', true ) ); 
            $blogauthor_header_overlay_new = isset( $_POST['blogauthor_header_overlay'] ) ? blogauthor_sanitize_header_overlay_option_meta( wp_unslash( $_POST['blogauthor_header_overlay'] ) ) : '';

            if ( $blogauthor_header_overlay_new && $blogauthor_header_overlay_new != $blogauthor_header_overlay_old ){

                update_post_meta ( $post_id, 'blogauthor_header_overlay', $blogauthor_header_overlay_new );

            }elseif( '' == $blogauthor_header_overlay_new && $blogauthor_header_overlay_old ) {

                delete_post_meta( $post_id,'blogauthor_header_overlay', $blogauthor_header_overlay_old );

            }
            
        }


        $blogauthor_ed_post_views_old = esc_html( get_post_meta( $post_id, 'blogauthor_ed_post_views', true ) ); 
        $blogauthor_ed_post_views_new = isset( $_POST['blogauthor_ed_post_views'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_post_views'] ) ) : '';

        if ( $blogauthor_ed_post_views_new && $blogauthor_ed_post_views_new != $blogauthor_ed_post_views_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_post_views', $blogauthor_ed_post_views_new );

        }elseif( '' == $blogauthor_ed_post_views_new && $blogauthor_ed_post_views_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_post_views', $blogauthor_ed_post_views_old );

        }



        $blogauthor_ed_post_read_time_old = esc_html( get_post_meta( $post_id, 'blogauthor_ed_post_read_time', true ) ); 
        $blogauthor_ed_post_read_time_new = isset( $_POST['blogauthor_ed_post_read_time'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_post_read_time'] ) ) : '';

        if ( $blogauthor_ed_post_read_time_new && $blogauthor_ed_post_read_time_new != $blogauthor_ed_post_read_time_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_post_read_time', $blogauthor_ed_post_read_time_new );

        }elseif( '' == $blogauthor_ed_post_read_time_new && $blogauthor_ed_post_read_time_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_post_read_time', $blogauthor_ed_post_read_time_old );

        }



        $blogauthor_ed_post_like_dislike_old = esc_html( get_post_meta( $post_id, 'blogauthor_ed_post_like_dislike', true ) ); 
        $blogauthor_ed_post_like_dislike_new = isset( $_POST['blogauthor_ed_post_like_dislike'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_post_like_dislike'] ) ) : '';

        if ( $blogauthor_ed_post_like_dislike_new && $blogauthor_ed_post_like_dislike_new != $blogauthor_ed_post_like_dislike_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_post_like_dislike', $blogauthor_ed_post_like_dislike_new );

        }elseif( '' == $blogauthor_ed_post_like_dislike_new && $blogauthor_ed_post_like_dislike_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_post_like_dislike', $blogauthor_ed_post_like_dislike_old );

        }



        $blogauthor_ed_post_author_box_old = esc_html( get_post_meta( $post_id, 'blogauthor_ed_post_author_box', true ) ); 
        $blogauthor_ed_post_author_box_new = isset( $_POST['blogauthor_ed_post_author_box'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_post_author_box'] ) ) : '';

        if ( $blogauthor_ed_post_author_box_new && $blogauthor_ed_post_author_box_new != $blogauthor_ed_post_author_box_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_post_author_box', $blogauthor_ed_post_author_box_new );

        }elseif( '' == $blogauthor_ed_post_author_box_new && $blogauthor_ed_post_author_box_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_post_author_box', $blogauthor_ed_post_author_box_old );

        }



        $blogauthor_ed_post_social_share_old = esc_html( get_post_meta( $post_id, 'blogauthor_ed_post_social_share', true ) ); 
        $blogauthor_ed_post_social_share_new = isset( $_POST['blogauthor_ed_post_social_share'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_post_social_share'] ) ) : '';

        if ( $blogauthor_ed_post_social_share_new && $blogauthor_ed_post_social_share_new != $blogauthor_ed_post_social_share_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_post_social_share', $blogauthor_ed_post_social_share_new );

        }elseif( '' == $blogauthor_ed_post_social_share_new && $blogauthor_ed_post_social_share_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_post_social_share', $blogauthor_ed_post_social_share_old );

        }



        $blogauthor_ed_post_reaction_old = esc_html( get_post_meta( $post_id, 'blogauthor_ed_post_reaction', true ) ); 
        $blogauthor_ed_post_reaction_new = isset( $_POST['blogauthor_ed_post_reaction'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_post_reaction'] ) ) : '';

        if ( $blogauthor_ed_post_reaction_new && $blogauthor_ed_post_reaction_new != $blogauthor_ed_post_reaction_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_post_reaction', $blogauthor_ed_post_reaction_new );

        }elseif( '' == $blogauthor_ed_post_reaction_new && $blogauthor_ed_post_reaction_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_post_reaction', $blogauthor_ed_post_reaction_old );

        }



        $blogauthor_ed_post_rating_old = esc_html( get_post_meta( $post_id, 'blogauthor_ed_post_rating', true ) ); 
        $blogauthor_ed_post_rating_new = isset( $_POST['blogauthor_ed_post_rating'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_post_rating'] ) ) : '';

        if ( $blogauthor_ed_post_rating_new && $blogauthor_ed_post_rating_new != $blogauthor_ed_post_rating_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_post_rating', $blogauthor_ed_post_rating_new );

        }elseif( '' == $blogauthor_ed_post_rating_new && $blogauthor_ed_post_rating_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_post_rating', $blogauthor_ed_post_rating_old );

        }

        foreach ( $blogauthor_page_layout_options as $blogauthor_post_layout_option ) {  
        
            $blogauthor_page_layout_old = sanitize_text_field( get_post_meta( $post_id, 'blogauthor_page_layout', true ) ); 
            $blogauthor_page_layout_new = isset( $_POST['blogauthor_page_layout'] ) ? blogauthor_sanitize_post_layout_option_meta( wp_unslash( $_POST['blogauthor_page_layout'] ) ) : '';

            if ( $blogauthor_page_layout_new && $blogauthor_page_layout_new != $blogauthor_page_layout_old ){

                update_post_meta ( $post_id, 'blogauthor_page_layout', $blogauthor_page_layout_new );

            }elseif( '' == $blogauthor_page_layout_new && $blogauthor_page_layout_old ) {

                delete_post_meta( $post_id,'blogauthor_page_layout', $blogauthor_page_layout_old );

            }
            
        }

        $blogauthor_ed_header_overlay_old = absint( get_post_meta( $post_id, 'blogauthor_ed_header_overlay', true ) ); 
        $blogauthor_ed_header_overlay_new = isset( $_POST['blogauthor_ed_header_overlay'] ) ? absint( wp_unslash( $_POST['blogauthor_ed_header_overlay'] ) ) : '';

        if ( $blogauthor_ed_header_overlay_new && $blogauthor_ed_header_overlay_new != $blogauthor_ed_header_overlay_old ){

            update_post_meta ( $post_id, 'blogauthor_ed_header_overlay', $blogauthor_ed_header_overlay_new );

        }elseif( '' == $blogauthor_ed_header_overlay_new && $blogauthor_ed_header_overlay_old ) {

            delete_post_meta( $post_id,'blogauthor_ed_header_overlay', $blogauthor_ed_header_overlay_old );

        }

    }

endif;   