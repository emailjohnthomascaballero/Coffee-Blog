<?php

/**
 * Title: Featured Item
 * Slug: feat-item
 * Categories: kabru
 * Keywords: feat-item
 */
?>

<!-- wp:group {"backgroundColor":"default","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-default-background-color has-background">
	<!-- wp:columns {"verticalAlignment":"center","style":{"spacing":{"padding":{"top":"3rem","right":"3rem","bottom":"3rem","left":"3rem"}},"border":{"radius":"20px"}},"backgroundColor":"light","className":"feat-item-card has-box-shadow pull-up-section"} -->
	<div class="wp-block-columns are-vertically-aligned-center feat-item-card has-box-shadow pull-up-section has-light-background-color has-background"
		style="border-radius:20px;padding-top:3rem;padding-right:3rem;padding-bottom:3rem;padding-left:3rem">
		<!-- wp:column {"verticalAlignment":"center","width":"33%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:33%">
			<!-- wp:image {"id":57,"sizeSlug":"full","linkDestination":"none","style":{"border":{"radius":"20px"}},"className":"is-style-default"} -->
			<figure class="wp-block-image size-full has-custom-border is-style-default"><img
					src="<?php echo esc_url( get_template_directory_uri() ) . '/assets/images/kabru.jpg'; ?>" alt=""
					class="wp-image-57" style="border-radius:20px" /></figure>
			<!-- /wp:image -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"75%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:75%">
			<!-- wp:heading {"level":5,"style":{"typography":{"fontStyle":"normal","fontWeight":"600","textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"tertiary","fontSize":"xsmall"} -->
			<h5 class="wp-block-heading has-tertiary-color has-text-color has-xsmall-font-size"
				style="font-style:normal;font-weight:600;letter-spacing:1px;text-transform:uppercase"><?php esc_html_e('Visionaries','kabru'); ?></h5>
			<!-- /wp:heading -->

			<!-- wp:heading {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"tertiary","fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-tertiary-color has-text-color has-xx-large-font-size"
				style="font-style:normal;font-weight:600"><?php esc_html_e('Unleash the Power of Tomorrow','kabru'); ?></h2>
			<!-- /wp:heading -->

			<!-- wp:paragraph {"style":{"color":{"text":"#8c8c8c"},"typography":{"fontStyle":"normal","fontWeight":"400"}},"fontSize":"small"} -->
			<p class="has-text-color has-small-font-size" style="color:#8c8c8c;font-style:normal;font-weight:400">
                <?php esc_html_e('We are a hub of creativity, pushing the boundaries of whats possible. Explore our cutting-edge solutions and
				witness the future unfold before your eyes. From revolutionary technologies to disruptive strategies, we
				are at the forefront of innovation in every industry.','kabru'); ?>
            </p>
			<!-- /wp:paragraph -->

			<!-- wp:buttons -->
			<div class="wp-block-buttons">
				<!-- wp:button {"backgroundColor":"tertiary","className":"is-style-rounded","fontSize":"small"} -->
				<div class="wp-block-button has-custom-font-size is-style-rounded has-small-font-size">
                    <a class="wp-block-button__link has-tertiary-background-color has-background wp-element-button">
                        <?php esc_html_e('Learn More','kabru'); ?>
                    </a>
                </div>
				<!-- /wp:button -->
			</div>
			<!-- /wp:buttons -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->