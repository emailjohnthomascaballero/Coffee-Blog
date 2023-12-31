<?php
/**
 * Displays About Section
 *
 * @package Blogauthor
 */
$enable_about_section = blogauthor_get_option('enable_about_section');
$about_post_title = blogauthor_get_option('about_post_title');
$select_about_page = get_theme_mod('select_about_page');
$upload_about_image = blogauthor_get_option('upload_about_image');
$facebook_url = blogauthor_get_option('facebook_url');
$twiter_url = blogauthor_get_option('twiter_url');
$instagram_url = blogauthor_get_option('instagram_url');
$about_page_query = new WP_Query(array('posts_per_page' => 1,
        'post_type' => 'page',
        'page_id' => $select_about_page,)
);
if ($enable_about_section) {
    ?>
    <section class="site-section site-about-section">
        <div class="wrapper">
            <div class="column-row">
                <?php if ($about_page_query->have_posts()):
                    while ($about_page_query->have_posts()): $about_page_query->the_post();
                        $featured_image = wp_get_attachment_image_src(get_post_thumbnail_id(), 'large');
                        $featured_image = isset($featured_image[0]) ? $featured_image[0] : '';
                        ?>
                        <?php if (!empty($featured_image)) { ?>
                            <div class="column column-5 column-sm-12">
                                <img src="<?php echo esc_url($featured_image); ?>">
                            </div>
                        <?php } ?>
                        <div class="column column-7 column-sm-12">
                            <header class="section-header site-section-header">
                                <?php if (!empty($about_post_title)) { ?>
                                    <div class="site-section-subtitle"><?php echo esc_html($about_post_title); ?></div>
                                <?php } ?>
                                <?php the_title('<h2 class="site-section-title">', '</h2>'); ?>
                            </header>

                            <div class="site-section-content">
                                <?php
                                if (has_excerpt()) {
                                    the_excerpt();
                                } else {
                                    echo '<p>';
                                    echo esc_html(wp_trim_words(get_the_content(), 80, '...'));
                                    echo '</p>';
                                } ?>
                            </div>
                            <ul class="about-section-profile">
                                <?php if (!empty($facebook_url)) { ?>
                                    <li>
                                        <a href="<?php echo esc_html($facebook_url); ?>" target="_blank">
                                            <?php blogauthor_theme_svg('facebook'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (!empty($twiter_url)) { ?>
                                    <li>
                                        <a href="<?php echo esc_html($twiter_url); ?>" target="_blank">
                                            <?php blogauthor_theme_svg('twitter'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                                <?php if (!empty($instagram_url)) { ?>
                                    <li>
                                        <a href="<?php echo esc_html($instagram_url); ?>" target="_blank">
                                            <?php blogauthor_theme_svg('instagram'); ?>
                                        </a>
                                    </li>
                                <?php } ?>
                            </ul>

                            <?php if (!empty($upload_about_image)) { ?>
                                <div class="site-section-signature">
                                    <img src="<?php echo $upload_about_image; ?>">
                                </div>
                            <?php } ?>
                        </div>
                    <?php
                    endwhile;
                    wp_reset_postdata();
                endif; ?>
            </div>
        </div>
    </section>
<?php }