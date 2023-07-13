<?php
/**
 * Search Template for search form
 *
 * @package Blogauthor
 * @since 1.0.0
 */
?>
<form role="search" method="get" class="search-form-default" action="<?php echo esc_url( home_url( '/' ) ); ?>">
    <label>
        <input type="search" class="search-field-default" placeholder="<?php esc_attr_e('Search','blogauthor'); ?>" value="<?php echo esc_attr( get_search_query() ) ?>" name="s">
        <?php blogauthor_theme_svg('search' ); ?>
    </label>
</form>