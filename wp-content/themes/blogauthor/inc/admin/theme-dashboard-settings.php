<?php
/**
 * Theme activation.
 * @package Blogauthor
 * Theme Dashboard [Free VS Pro]
 */
function blogauthor_free_vs_pro_html() {
	ob_start();
	?>
	<div class="theme-admin-title"><?php esc_html_e( 'Differences between Blogauthor and Blogauthor Pro', 'blogauthor' ); ?></div>
	<div class="theme-admin-description"><?php esc_html_e( 'Here are some of the differences between Blogauthor and Blogauthor Pro:', 'blogauthor' ); ?></div>

	<table class="freemium-comparison-table">
		<thead>
			<tr>
				<th><?php esc_html_e( 'Feature', 'blogauthor' ); ?></th>
				<th><?php esc_html_e( 'Blogauthor', 'blogauthor' ); ?></th>
				<th><?php esc_html_e( 'Blogauthor Pro', 'blogauthor' ); ?></th>
			</tr>
		</thead>
		<tbody>
            <tr>
                <td><?php esc_html_e( 'Responsive Design', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Multiple Blog Layouts', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Live editing in Customizer', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'One Click Demo Import', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>

            <tr>
                <td><?php esc_html_e( 'Access to all Google Fonts', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Access to Color Options', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
			<tr>
				<td><?php esc_html_e( 'Preloader Option', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge">2</span></td>
				<td><span class="theme-dashboard-badge">5</span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Multiple Header Options', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge">3 Layouts</span></td>
				<td><span class="theme-dashboard-badge">5 Layouts</span></td>
			</tr>
            <tr>
                <td><?php esc_html_e( 'Logo and Title Customization', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Header Image', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Custom Widgets', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Frontpage Banner', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge">2 Layouts</span></td>
                <td><span class="theme-dashboard-badge">3 Layouts</span></td>
            </tr>
			<tr>
				<td><?php esc_html_e( 'Hide Theme Credit Link', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Extra Widget Area', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Instagram Module', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Twitter Module', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Table of Contents', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Share Buttons', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Maintenance mode', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
			<tr>
				<td><?php esc_html_e( 'Hooks system', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
				<td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
			</tr>
            <tr>
                <td><?php esc_html_e( 'Translations Ready', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'SEO Optimized', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'RTL Compatibility', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'WooCommerce Compatibility', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Breadcrumbs Module', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-tertiary"><i class="dashicons dashicons-no-alt"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Gutenberg Compatibility', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Footer Widgets Section', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
            <tr>
                <td><?php esc_html_e( 'Display Related Posts', 'blogauthor' ); ?></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
                <td><span class="theme-dashboard-badge theme-badge-primary"><i class="dashicons dashicons-saved"></i></span></td>
            </tr>
			<tr>
				<td><?php esc_html_e( 'Support', 'blogauthor' ); ?></td>
				<td><span class="theme-dashboard-badge">Normal Support</span></td>
				<td><span class="theme-dashboard-badge">Dedicated Priority Support</span></td>
			</tr>
		</tbody>
	</table>

	<div class="theme-admin-separator"></div>

	<h4>
		<a href="https://www.themeinwp.com/theme/blogauthor-pro/#compare-all-features" target="_blank">
			<?php esc_html_e( 'How Blogauthor and Blogauthor Pro are different from each other - here\'s the complete list.', 'blogauthor' ); ?>
		</a>
	</h4>

	<div class="theme-admin-separator"></div>

    <div class="theme-admin-button-wrap">
		<a href="https://www.themeinwp.com/theme/blogauthor-pro/" class="button theme-admin-button admin-button-primary">
			<?php esc_html_e( 'Get Blogauthor Pro Today', 'blogauthor' ); ?>
		</a>
    </div>
	<?php
	return ob_get_clean();
}

/**
 * Theme Dashboard Settings
 *
 * @param array $settings The settings.
 */
function blogauthor_dashboard_settings( $settings ) {

	// Starter.

	// Hero.
	$settings['hero_title']       = esc_html__( 'Welcome to Blogauthor', 'blogauthor' );
	$settings['hero_themes_desc'] = esc_html__( 'Your installation of Blogauthor is complete and ready for use. We\'ve prepared a unique onboarding process through our Getting started page. It helps you get started and configure your upcoming website with ease. Let\'s make it shine!', 'blogauthor' );
	$settings['hero_desc']        = esc_html__( 'Blogauthor is now installed and ready to go. To help you with the next step, we\'ve gathered together on this page all the resources you might need. We hope you enjoy using Blogauthor.', 'blogauthor' );
	$settings['hero_image']       = get_template_directory_uri() . '/inc/admin/dashboard/images/welcome-banner.png';

	// Tabs.
	$settings['tabs'] = array(
		array(
			'name'    => esc_html__( 'Theme Features', 'blogauthor' ),
			'type'    => 'features',
			'visible' => array( 'free', 'pro' ),
			'data' => array(
                array(
                    'name' => esc_html__('Add Background Image', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=background_image'),
                ),
                array(
                    'name' => esc_html__('Add Widgets', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[panel]=widgets'),
                ),
                array(
                    'name' => esc_html__('Change Site Title or Logo', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=title_tagline'),
                ),
                array(
                    'name' => esc_html__('Topbar Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=topbar_options'),
                ),
                array(
                    'name' => esc_html__('Header Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=header_options'),
                ),
                array(
                    'name' => esc_html__('Progressbar Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=progressbar_options'),
                ),
                array(
                    'name' => esc_html__('Color Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=colors'),
                ),
                array(
                    'name' => esc_html__('Archive Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=archive_options'),
                ),
                array(
                    'name' => esc_html__('Single Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=single_options'),
                ),
                array(
                    'name' => esc_html__('Pagination Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=pagination_options'),
                ),
                array(
                    'name' => esc_html__('Footer Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=footer_options'),
                ),
                array(
                    'name' => esc_html__('Read Time Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=read_time_options'),
                ),
                array(
                    'name' => esc_html__('Dark/Light Mode Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=dark_mode_options'),
                ),
                array(
                    'name' => esc_html__('Preloader Options', 'blogauthor'),
                    'type' => 'free',
                    'customize_uri' => admin_url('/customize.php?autofocus[section]=preloader_options'),
                ),
            ),
		),
		array(
			'name'    => esc_html__( 'Free vs PRO', 'blogauthor' ),
			'type'    => 'html',
			'visible' => array( 'free' ),
			'data'    => blogauthor_free_vs_pro_html(),
		),
		array(
			'name'    => esc_html__( 'Performance optimization tools', 'blogauthor' ),
			'type'    => 'performance',
			'visible' => array( 'free', 'pro' ),
		),
	);
	
	$settings['tabs'][0]['data'] = array_merge( $settings['tabs'][0]['data'], array(
		array(
			'name'          => esc_html__( 'Typography Option', 'blogauthor' ),
			'type'          => 'pro',
			'customize_uri' => '/wp-admin/customize.php?autofocus[section]=typography_options',
		),
        array(
            'name'          => esc_html__( 'Remove Footer credits', 'blogauthor' ),
            'type'          => 'pro',
            'customize_uri' => admin_url( '/customize.php?autofocus[section]=footer_options' ),
        ),
		array(
			'name'          => esc_html__( 'Extra Widget Area', 'blogauthor' ),
			'type'          => 'pro',
            'customize_uri' => admin_url('/customize.php?autofocus[panel]=widgets'),
		),
		array(
			'name'          => esc_html__( 'Google Maps', 'blogauthor' ),
			'type'          => 'pro',
			'customize_uri' => '/wp-admin/customize.php?autofocus[section]=blogauthor_pro_maps',
		),
        array(
            'name'          => esc_html__( 'Instagram Module', 'blogauthor' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_connect',
            'text'			=> __( 'Display the Instagram feed in your website', 'blogauthor' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/social-integrations/instagram-integration/">' . __( 'Documentation article', 'blogauthor' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Twitter Module', 'blogauthor' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_connect&tab=twitter',
            'text'			=> __( 'Display the Twitter feed in your website', 'blogauthor' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/social-integrations/twitter-integration/">' . __( 'Documentation article', 'blogauthor' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Table of Contents', 'blogauthor' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_table_of_contents',
            'text'			=> __( 'Display table of contents automatically on single post based on the headings tags.', 'blogauthor' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/content-presentation/table-of-contents/">' . __( 'Documentation article', 'blogauthor' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Share Buttons', 'blogauthor' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_share_buttons',
            'text'			=> __( 'Allow visitors to share your content via email and social media.', 'blogauthor' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/social-integrations/share-buttons/">' . __( 'Documentation article', 'blogauthor' ) . '</a></div>',
        ),
        array(
            'name'          => esc_html__( 'Maintenance mode', 'blogauthor' ),
            'type'          => 'pro',
            'customize_uri' => '/wp-admin/options-general.php?page=premiumkits_coming_soon',
            'text'			=> __( 'Display a user-friendly coming soon notice to visitors ', 'blogauthor' ) . '<div><a target="_blank" href="https://docs.themeinwp.com/docs/premiumkits/utilities/coming-soon/">' . __( 'Documentation article', 'blogauthor' ) . '</a></div>',
        ),
	) );

	// Documentation.
	$settings['documentation_link'] = 'https://docs.themeinwp.com/docs/blogauthor/';

	// Promo.
	$settings['promo_title']  = esc_html__( 'Upgrade to Pro', 'blogauthor' );
	$settings['promo_desc']   = esc_html__( 'Take Blogauthor to a whole other level by upgrading to the Pro version.', 'blogauthor' );
	$settings['promo_button'] = esc_html__( 'Discover Blogauthor Pro', 'blogauthor' );
	$settings['promo_link']   = 'https://themeinwp.com/theme/blogauthor-pro';

	// Review.
	$settings['review_link']       = 'https://wordpress.org/support/theme/blogauthor/reviews/';
	$settings['suggest_idea_link'] = 'https://www.themeinwp.com/contact-us/';

	// Support.
	$settings['support_link']     = 'https://wordpress.org/support/theme/blogauthor/';
	$settings['support_pro_link'] = 'https://www.themeinwp.com/support/';

	// Community.
	$settings['community_link'] = 'https://www.facebook.com/themeinwp/';

	$theme = wp_get_theme();
	// Changelog.
	$settings['changelog_version'] = $theme->version;
	$settings['changelog_link']    = 'https://themeinwp.com/changelog/blogauthor/';

	return $settings;
}
add_filter( 'thd_register_settings', 'blogauthor_dashboard_settings' );