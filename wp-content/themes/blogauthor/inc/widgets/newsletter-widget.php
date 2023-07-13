<?php

if (!defined('ABSPATH')) {
    exit;
}

class Blogauthor_Mailchimp_Form extends Blogauthor_Widget_Base
{

    /**
     * Constructor.
     */
    public function __construct()
    {
        $this->widget_cssclass = 'widget_blogauthor_mailchimp_form';
        $this->widget_description = __("Displays MailChimp form if you have any", 'blogauthor');
        $this->widget_id = 'blogauthor_mailchimp_form';
        $this->widget_name = __('Blogauthor: MailChimp Form', 'blogauthor');
        $this->settings = array(
            'title' => array(
                'label' => esc_html__('Widget Title', 'blogauthor'),
                'type' => 'text',
                'class' => 'widefat',
            ),
            'desc' => array(
                'type' => 'textarea',
                'label' => __('Description', 'blogauthor'),
                'rows' => 10,
            ),
            'form_shortcode' => array(
                'type' => 'text',
                'label' => __('MailChimp Form Shortcode', 'blogauthor'),
            ),
            'style' => array(
                'type' => 'select',
                'label' => __('Style', 'blogauthor'),
                'options' => array(
                    'style_1' => __('Style 1', 'blogauthor'),
                    'style_2' => __('Style 2', 'blogauthor'),
                    'style_3' => __('Style 3', 'blogauthor'),
                ),
                'std' => 'style_1',
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
            'bg_image'  => array(
                'type'  => 'image',
                'label' => __( 'Background Image', 'blogauthor' ),
                'desc' => __( 'Don\'t upload any image if you do not want to show the background image.', 'blogauthor' ),
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
        if (!empty($instance['form_shortcode'])) {

            ob_start();

            $class = '';

            $image_enabled = false;

            if($instance['bg_image'] && 0 != $instance['bg_image']){
                $image_enabled = true;
                $class = 'blogauthor-cover-block ';

                if($instance['enable_fixed_bg']){
                    $class .= 'blogauthor-bg-image blogauthor-bg-attachment-fixed ';
                }
            }

            $class .= $instance['style'];
            $style_text = 'color:'.$instance['text_color_option'].';';  
            $style_text .= 'text-align:'.$instance['text_align'].';';  
            $style_text .= 'min-height:'.$instance['height'].'px;';
            echo $args['before_widget'];

            do_action( 'blogauthor_before_mailchimp');

            ?>
            <div class="blogauthor-mailchimp-widget <?php echo esc_attr($class);?>" style="<?php echo esc_attr($style_text);?>">

                <?php
                if($image_enabled){
                    $style = 'background-color:'.$instance['bg_overlay_color'].';';  
                    $style .= 'opacity:'.($instance['overlay_opacity']/100).';';
                    ?>
                    <span aria-hidden="true" class="blogauthor-block-overlay" style="<?php echo esc_attr($style);?>"></span>
                    <?php echo wp_get_attachment_image($instance['bg_image'],'full');?>
                    <?php
                }
                ?>
                <div class="blogauthor-mailchimp-inner-wrapper blogauthor-block-inner-wrapper">
                   <div class="mailchimp-content-group_1">
                        <?php if ($instance['title']) : ?>
                            <h2 class="entry-title entry-title-large">
                                <?php echo esc_html($instance['title']); ?>
                            </h2>
                        <?php endif; ?>

                        <div class="entry-summary">
                            <?php
                            if ($instance['desc']) {
                                echo wpautop(wp_kses_post($instance['desc']));
                            }
                            ?>
                        </div>
                   </div>
                    <div class="mailchimp-content-group_2">
                        <footer class="entry-footer">
                        <?php echo do_shortcode($instance['form_shortcode']); ?>
                        </footer>
                    </div>
                </div>

            </div>

            <?php

            do_action( 'blogauthor_after_mailchimp');

            echo $args['after_widget'];

            echo ob_get_clean();
        }
    }
}