<?php

/**
 * Title: Header
 * Slug: header
 * Categories: kabru
 * Keywords: header
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"40px","bottom":"40px"}}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group" style="padding-top:40px;padding-bottom:40px"><!-- wp:columns -->
    <div class="wp-block-columns"><!-- wp:column {"width":"20%"} -->
        <div class="wp-block-column" style="flex-basis:20%"><!-- wp:site-title /--></div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"55%"} -->
        <div class="wp-block-column" style="flex-basis:55%">
            <!-- wp:navigation {"ref":17,"layout":{"type":"flex","justifyContent":"center"},"fontSize":"small"} /-->
        </div>
        <!-- /wp:column -->

        <!-- wp:column {"width":"25%"} -->
        <div class="wp-block-column" style="flex-basis:25%">
            <!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
            <div class="wp-block-buttons"><!-- wp:button {"className":"is-style-rectangle is-style-fill","fontSize":"small"} -->
                <div class="wp-block-button has-custom-font-size is-style-rectangle is-style-fill has-small-font-size"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Log In','kabru'); ?></a></div>
                <!-- /wp:button -->

                <!-- wp:button {"className":"is-style-outline","fontSize":"small"} -->
                <div class="wp-block-button has-custom-font-size is-style-outline has-small-font-size"><a class="wp-block-button__link wp-element-button"><?php esc_html_e('Sign Up','kabru'); ?></a></div>
                <!-- /wp:button -->
            </div>
            <!-- /wp:buttons -->
        </div>
        <!-- /wp:column -->
    </div>
    <!-- /wp:columns -->
</div>
<!-- /wp:group -->