<?php
/**
 * Displays Search
 *
 * @package Blogauthor
 */

?>

<div class="theme-search-panel">
    <div class="wrapper">
        <div id="theme-header-search" class="search-panel-wrapper">
            <?php
            get_search_form(
                array(
                    'aria_label' => __('Search for:', 'blogauthor'),
                )
            );
            ?>
            <button id="blogauthor-search-canvas-close" class="theme-button theme-button-transparent search-close">
                <span class="screen-reader-text">
                    <?php _e('Close search', 'blogauthor'); ?>
                </span>
                <?php blogauthor_theme_svg('close'); ?>
            </button><!-- .search-toggle -->

        </div>
    </div>
</div> <!-- theme-search-panel -->