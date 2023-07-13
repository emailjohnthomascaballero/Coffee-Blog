<?php

if (!defined('ABSPATH')) {
    exit;
}

class Blogauthor_Call_To_Action extends Blogauthor_Widget_Base
{
    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_blogauthor_call_to_action';
        $this->widget_description = __("Adds Call to action section", 'blogauthor');
        $this->widget_id = 'blogauthor_call_to_action';
        $this->widget_name = __('Blogauthor: Call To Action', 'blogauthor');

        $this->settings = array(
            'title' => array(
                'type' => 'text',
                'label' => __('CTA Title', 'blogauthor'),
            ),
            'title_text' => array(
                'type' => 'text',
                'label' => __('CTA Subtitle', 'blogauthor'),
            ),
            'desc'  => array(
                'type'  => 'textarea',
                'label' => __( 'CTA Description', 'blogauthor' ),
                'rows' => 10,
            ),
            'bg_image'  => array(
                'type'  => 'image',
                'label' => __( 'Background Image', 'blogauthor' ),
            ),
            'btn_text'  => array(
                'type'  => 'text',
                'label' => __( 'Button Text', 'blogauthor' ),
            ),
            'btn_link'  => array(
                'type'  => 'url',
                'label' => __( 'Link to url', 'blogauthor' ),
                'desc' => __( 'Enter a proper url with http: OR https:', 'blogauthor' ),
            ),
            'link_target'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Open Link in new Tab', 'blogauthor' ),
                'std' => true,
            ),
            'msg' => array(
                'type' => 'message',
                'label' => __('Additonal Settings', 'blogauthor'),
            ),
            'height'  => array(
                'type' => 'number',
                'step' => 20,
                'min' => 300,
                'max' => 700,
                'std' => 400,
                'label' => __('Height: Between 300px and 700px (Default 400px)', 'blogauthor'),
            ),
            'text_color_option' => array(
                'type' => 'color',
                'label' => __( 'Text Color', 'blogauthor' ),
                'std' => '#ffffff',
            ),
            'text_align' => array(
                'type' => 'select',
                'label' => __('Text Alignment', 'blogauthor'),
                'options' => array(
                    'left' => __('Left Align', 'blogauthor'),
                    'center' => __('Center Align', 'blogauthor'),
                    'right' => __('Right Align', 'blogauthor'),
                ),
                'std' => 'left',
            ),
            'enable_fixed_bg'  => array(
                'type'  => 'checkbox',
                'label' => __( 'Enable Fixed Background Image', 'blogauthor' ),
                'std' => true,
            ),
            'bg_overlay_color' => array(
                'type' => 'color',
                'label' => __( 'Overlay Background Color', 'blogauthor' ),
                'std' => '#000000',
            ),
            'overlay_opacity'  => array(
                'type' => 'number',
                'step' => 10,
                'min' => 0,
                'max' => 100,
                'std' => 50,
                'label' => __('Overlay Opacity (Default 50%)', 'blogauthor'),
            ),
        );

        parent::__construct();
    }

    /**
     * Output widget.
     *
     * @see WP_Widget
     *
     * @param array $args
     * @param array $instance
     */
    public function widget($args, $instance)
    {
        ob_start();
        echo $args['before_widget'];

        do_action( 'blogauthor_before_cta');

        ?>

        <?php if( $instance['bg_image'] && 0!= $instance['bg_image']) :?>

            <?php
            $style_text = 'color:'.$instance['text_color_option'].';';
            $style_text .= 'min-height:'.$instance['height'].'px;';

            $style_text .= 'text-align:'.$instance['text_align'].';';

            $style = 'background-color:'.$instance['bg_overlay_color'].';';
            $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
            ?>

            <div class="blogauthor-cta-widget blogauthor-cover-block <?php echo ($instance['enable_fixed_bg']) ? 'blogauthor-bg-image blogauthor-bg-attachment-fixed' : '';?>" style="<?php echo esc_attr($style_text);?>">

                <span aria-hidden="true" class="blogauthor-block-overlay" style="<?php echo esc_attr($style);?>"></span>

                <?php echo wp_get_attachment_image($instance['bg_image'],'full');?>

                <div class="blogauthor-cta-inner-wrapper blogauthor-block-inner-wrapper">
                    <?php if ($instance['title']) : ?>
                        <h2 class="entry-title entry-title-large">
                            <?php echo esc_html($instance['title']); ?>
                        </h2>
                    <?php endif;?>

                    <?php if ($instance['title_text']) : ?>
                        <h3 class="entry-title entry-title-big">
                            <?php echo esc_html($instance['title_text']); ?>
                        </h3>
                    <?php endif;?>

                    <?php if ($instance['desc']) : ?>
                        <div class="entry-summary">
                            <?php echo wpautop(wp_kses_post($instance['desc'])); ?>
                        </div>
                    <?php endif;?>

                    <?php if ($instance['btn_text']) : ?>
                        <footer class="entry-footer">
                            <a href="<?php echo ($instance['btn_link']) ? esc_url($instance['btn_link']): '';?>" target="<?php echo ($instance['link_target']) ? "_blank": '_self';?>" class="theme-button">
                                <?php echo esc_html(($instance['btn_text']));?>
                            </a>
                        </footer>
                    <?php endif; ?>

                </div>

            </div>
            
        <?php endif;?>

        <?php

        do_action( 'blogauthor_after_cta');

        echo $args['after_widget'];

        echo ob_get_clean();
    }

}