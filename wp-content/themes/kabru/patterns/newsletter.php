<?php

/**
 * Title: Newsletter
 * Slug: newsletter
 * Categories: kabru
 * Keywords: newsletter
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"100px","bottom":"100px"},"margin":{"top":"0px","bottom":"0px"}}},"backgroundColor":"tertiary","layout":{"type":"constrained"}} -->
<div class="wp-block-group has-tertiary-background-color has-background"
	style="margin-top:0px;margin-bottom:0px;padding-top:100px;padding-bottom:100px">
	<!-- wp:columns {"verticalAlignment":"center"} -->
	<div class="wp-block-columns are-vertically-aligned-center">
		<!-- wp:column {"verticalAlignment":"center","width":"40%"} -->
		<div class="wp-block-column is-vertically-aligned-center" style="flex-basis:40%">
			<!-- wp:heading {"textColor":"white","fontSize":"xx-large"} -->
			<h2 class="wp-block-heading has-white-color has-text-color has-xx-large-font-size">
                <?php esc_html_e('Subscribe and get updates regularly','kabru'); ?>
            </h2>
			<!-- /wp:heading -->
		</div>
		<!-- /wp:column -->

		<!-- wp:column {"verticalAlignment":"center","width":"60%","style":{"spacing":{"padding":{"left":"30px"}}}} -->
		<div class="wp-block-column is-vertically-aligned-center" style="padding-left:30px;flex-basis:60%">
			<!-- wp:paragraph {"style":{"typography":{"fontSize":"22px","lineHeight":"1.5"}},"textColor":"white"} -->
			<p class="has-white-color has-text-color" style="font-size:22px;line-height:1.5">
            <?php esc_html_e('Join us on this exciting journey of discovery as we delve into the realms of innovation and witness its transformative power in
				action. Immerse yourself in a world where groundbreaking ideas shape our future.','kabru'); ?>
            </p>
			<!-- /wp:paragraph -->
		</div>
		<!-- /wp:column -->
	</div>
	<!-- /wp:columns -->
</div>
<!-- /wp:group -->