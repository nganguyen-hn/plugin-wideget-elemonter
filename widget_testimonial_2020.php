<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}
use Elementor\Widget_Base;
use Elementor\Controls_Manager;

class Fruit_testimonial extends Widget_Base {

    /**
     * Retrieve the widget name.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget name.
     */
    public function get_name() {
        return 'Testimonial-add-section';
    }

    /**
     * Retrieve the widget title.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget title.
     */
    public function get_title() {
        return __( 'Testimonial', 'fruit' );
    }

    /**
     * Retrieve the widget icon.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return string Widget icon.
     */
    public function get_icon() {
        return 'eicon-featured-image';
    }

    /**
     * Retrieve the list of categories the widget belongs to.
     *
     * Used to determine where to display the widget in the editor.
     *
     * Note that currently Elementor supports only one category.
     * When multiple categories passed, Elementor uses the first one.
     *
     * @since 1.0.0
     *
     * @access public
     *
     * @return array Widget categories.
     */
    public function get_categories() {
        return [ 'fruit-theme' ];
    }

    /**
     * Register the widget controls.
     *
     * Adds different input fields to allow the user to change and customize the widget settings.
     *
     * @since 1.0.0
     *
     * @access protected
     */
    protected function _register_controls(){

        $this->start_controls_section(
            'section_member_team',
            array(
                'label' => esc_html__( 'Item', 'fruit' )
            )
        );

        $this->add_control(
            'images',
            array(
                'label' => esc_html__('Choose Image', 'fruit'),
                'type' => Controls_Manager::MEDIA,
                'default' => array(
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ),
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Image_Size::get_type(),
            array(
                'name'      => 'full',
                'separator' => 'none',
                'default'   => 'full',
            )
        );

        $this->add_control(
            'name',
            array(
                'label' => esc_html__('Name Testimonial', 'fruit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Name Testimonial', 'fruit'),
                'placehoder' => esc_html__('Member name', 'fruit'),
                'label_block' => true,
            )
        );

        $this->add_control(
            'heading',
            array(
                'label'   => esc_html__( 'Heading', 'fruit' ),
                'type'    => Controls_Manager::SELECT,
                'default' => 'h4',
                'options' => array(
                    'h1' => esc_html__( 'H1', 'fruit' ),
                    'h2' => esc_html__( 'H2', 'fruit' ),
                    'h3' => esc_html__( 'H3', 'fruit' ),
                    'h4' => esc_html__( 'H4', 'fruit' ),
                    'h5' => esc_html__( 'H5', 'fruit' ),
                    'h6' => esc_html__( 'H6', 'fruit' ),
                ),
            )
        );

        $this->add_responsive_control(
            'align-name',
            array(
                'label' => esc_html__('Align', 'fruit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => array(
                    'left' => array(
                        'title' => esc_html__('Left', 'fruit'),
                        'icon' => 'eicon-text-align-left',
                    ),
                    'center' => array(
                        'title' => esc_html__('Center', 'fruit'),
                        'icon' => 'eicon-text-align-center',
                    ),
                    'justify' => array(
                        'title' => esc_html__('Justify', 'fruit'),
                        'icon' => 'eicon-text-align-justify',
                    ),
                    'right' => array(
                        'title' => esc_html__('Right', 'fruit'),
                        'icon' => 'eicon-text-align-right',
                    ),
                ),
                'default' => '',
                'selectors' => array(
                    '{{WRAPPER}} .box-name-testimonial' => 'text-align:{{VALUE}};'
                ),
            )
        );

        $this->add_control(
            'description',
            array(
                'label' => esc_html__('Description', 'fruit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Dev', 'fruit'),
                'label_block' => true,
            )
        );

        $this->add_responsive_control(
            'align-description',
            array(
                'label' => esc_html__('Align Description', 'fruit'),
                'type' => Controls_Manager::CHOOSE,
                'options' => array(
                    'left' => array(
                        'title' => esc_html__('Left', 'fruit'),
                        'icon' => 'eicon-text-align-left',
                    ),
                    'center' => array(
                        'title' => esc_html__('Center', 'fruit'),
                        'icon' => 'eicon-text-align-center',
                    ),
                    'justify' => array(
                        'title' => esc_html('Justify', 'fruit'),
                        'icon' => 'eicon-text-align-justify',
                    ),
                    'right' => array(
                        'title' => esc_html__('Right', 'fruit'),
                        'icon' => 'eicon-text-align-right',
                    ),
                ),
                'selectors' => array(
                    '{{WRAPPER}} .fruit-member-description' => 'text-align:{{VALUE}};'
                )
            )
        );

        $repeater = new \Elementor\Repeater();

        $repeater->add_control(
            'member_contact',
            array(
                'label' => esc_html__('Icon', 'fruit'),
                'type' => Controls_Manager::ICON,
                'default' => 'fa fa-star',
            )
        );

        $repeater->add_control(
            'link',
            array(
                'label' => esc_html__('link', 'fruit'),
                'type' => Controls_Manager::URL,
                'label_block' => true,
                'default' => array(
                    'is_external' => true,
                ),
                'placehoder' => esc_attr(' https://member-link.com '),

            )
        );

        $this->add_control(
            'contact_icon_list',
            array(
                'label'=> esc_html__('Social Icon', 'fruit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
                'title-fields' => '<i class="{{ member_contact }}"></i>',
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'transition-all',
            array(
                'label' => esc_html__('Transition all' , 'fruit'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'img-hover-transition',
            array(
                'label' => esc_html__('Transition Duration', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array ( 'px' ),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit img' => 'transition-duration:{{SIZE}}s',
                    '{{WRAPPER}} .widget-testimonial-fruit .name-testimonial' => 'transition-duration:{{SIZE}}s',
                    '{{WRAPPER}} .widget-testimonial-fruit .fruit-member-contact' => 'transition-duration:{{SIZE}}s',
                    '{{WRAPPER}} .widget-testimonial-fruit .fruit-member-description' => 'transition-duration:{{SIZE}}s',
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'transition-duration:{{SIZE}}s',
                ),
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'image-style',
            array(
                'label' => esc_html__('Images', 'fruit'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs('image-effect');

        $this->start_controls_tab(
            'images-nomal',
            array(
                'label' => esc_html__('Normal','fruit'),
            )
        );

        $this->add_control(
            'image-opacity',
            array(
                'label' => esc_html__('Opacity Image', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array( 'px' ),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit img' => 'opacity:{{SIZE}};'
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            array(
                'name' => 'css_filters',
                'selector' => '{{WRAPPER}} .widget-testimonial-fruit img',
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'images-hover',
            array(
                'label' => esc_html__('Hover', 'fruit'),
            )
        );

        $this->add_control(
            'images-opacity-hover',
            array(
                'label' => esc_html__('Hover', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units'=> array( 'px' ),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit:hover img' => 'opacity:{{SIZE}}',
                ),
            )
        );

        $this->add_group_control(
            Group_Control_Css_Filter::get_type(),
            array(
                'name' => 'css_filters_hover',
                'selector' => '{{WRAPPER}} .widget-testimonial-fruit:hover img',
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'name_style',
            array(
                'label' => esc_html__( 'Name Testimonial', 'fruit' ),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name' => 'name_typography',
                'selector' => '{{WRAPPER}} .name-testimonial',
            )
        );

        $this->add_control(
            'name-space',
            array(
                'label' => esc_html__('Space', 'fruit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array( '%' ),
                'default' => array(
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .box-name-testimonial' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->start_controls_tabs( 'name_effects' );

        $this->start_controls_tab(
            'normal',
            array(
                'label' => esc_html__( 'Normal', 'fruit' ),
            )
        );

        $this->add_control(
            'name_testi_color',
            array(
                'label'    => esc_html__( 'Color', 'fruit' ),
                'type'     => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .name-testimonial' => 'color: {{VALUE}}',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover',
            array(
                'label' => esc_html__( 'Hover', 'fruit'),
            )
        );

        $this->add_control(
            'name_testi_color_hover',
            array(
                'label' => esc_html__('Color', 'fruit'),
                'type' => Controls_Manager::COLOR,
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit:hover .name-testimonial' => 'color:{{VALUE}}',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'description_style',
            array(
                'label' => esc_html__('Description', 'fruit'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            array(
                'name' => 'description_typography',
                'seclectors' => '{{WPARPER}} .fruit-member-description',
            )
        );

        $this->add_control(
            'description-space',
            array(
                'label' => esc_html__('Space', 'fruit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array( '%' ),
                'default' => array(
                    'top' => 10,
                    'right' => 10,
                    'bottom' => 10,
                    'left' => 10,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .fruit-member-description' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ),
            )
        );

        $this->start_controls_tabs( 'description-effects');

        $this->start_controls_tab(
            'normal-dcs',
            array(
                'label' => esc_html__( 'Normal', 'fruit' ),
            )
        );

        $this->add_control(
            'description-color',
            array(
                'label' => esc_html__('Color', 'fruit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#666',
                'selectors' => array(
                    '{{WRAPPER}} .fruit-member-description' => 'color:{{VALUE}}',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'hover-dsc',
            array(
                'label' => esc_html__( 'Hover', 'fruit' ),
            )
        );

        $this->add_control(
            'description-color-hover',
            array(
                'label' => esc_html__( 'Description color' , 'fruit' ),
                'type' => Controls_Manager::COLOR,
                'default' => '#fff',
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit:hover .fruit-member-description' => 'color:{{VALUE}};',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'style_icon_contact',
            array(
                'label' => esc_html__('Icon Contact', 'fruit'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_control(
            'icontesti_color',
            array(
                'label' => esc_html__('Color', 'fruit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'color:{{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'border-color-icon',
            array(
                'label' => esc_html__('Border color icon', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array( 'px' ),
                'range' => array(
                    'min' => 0,
                    'max' => 10,
                ),
                'default' => array(
                    'unit' => 'px',
                    'size' => 0,
                ),
                'selectors' => array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'border:{{SIZE}}{{UNIT}} solid;',
                ),
            )
        );

        $this->add_control(
            'color-border-hover-item',
            array(
                'label' => esc_html__('Border Color Hover', 'fruit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ccc',
                'selectors'=> array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a:hover' => 'border-color:{{VALUE}}',
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a:hover' => 'color:{{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'border-radius-icon',
            array(
                'label' => esc_html__('Border Radius Icon', 'fruit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array( '%' ),
                'default' => array(
                    'top' => 50,
                    'right' => 50,
                    'bottom' => 50,
                    'left' => 50,
                    'unit' => '%',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'border-radius:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ),
            )
        );

        $this->add_responsive_control(
            'icon-size',
            array(
                'label' => esc_html__('Font size icon', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'range' => array(
                    'px' => array(
                        'min' => 5,
                        'max' => 200,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'font-size:{{SIZE}}{{UNIT}}',
                ),
            )
        );

        $this->add_responsive_control(
            'width-icon',
            array(
                'label' => esc_html__('Width icon', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units'=> 'px',
                'range' => array(
                    'px' => array(
                        'min' => 5,
                        'max' => 200,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'width:{{SIZE}}{{UNIT}}',
                ),
            )
        );

        $this->add_responsive_control(
            'height-icon',
            array(
                'label' => esc_html__('Height icon', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units'=> 'px',
                'range' => array(
                    'px' => array(
                        'min' => 5,
                        'max' => 200,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'height:{{SIZE}}{{UNIT}}',
                ),
            )
        );

        $this->add_responsive_control(
            'line-height-icon',
            array(
                'label' => esc_html__('Line Height icon', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units'=> 'px',
                'range' => array(
                    'px' => array(
                        'min' => 5,
                        'max' => 200,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .box-img-item .fruit-list-icon-contact li a' => 'line-height:{{SIZE}}{{UNIT}}',
                ),
            )
        );

        $this->add_control(
            'icon-space',
            array(
                'label' => esc_html__('Icon Space', 'fruit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array( '%'),
                'selectors' => array(
                    '{{WRAPPPER}} .box-img-item .fruit-list-icon-contact li a' => 'margin:{{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ),
            )
        );


        $this->start_controls_tabs( 'social-effects');

        $this->start_controls_tab(
            'social-nomal',
            array(
                'label' => esc_html__('Normal', 'fruit'),
            ),
        );

        $this->add_control(
            'setting-opacity-social',
            array(
                'label' => esc_html__('Opacity Social', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array( 'px' ),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max'=>1,
                        'step' => 0.01,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .fruit-list-icon-contact' => 'opacity:{{SIZE}};'
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'social-hover',
            array(
                'label' => esc_html__( 'Hover', 'fruit' ),
            ),
        );

        $this->add_control(
            'opacity-hover',
            array(
                'label'=> esc_html__('Opacity Hover', 'fruit'),
                'type' => Controls_Manager::SLIDER,
                'size_units' => array( 'px' ),
                'range' => array(
                    'px' => array(
                        'min' => 0,
                        'max' => 1,
                        'step' => 0.01,
                    )
                ),
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit:hover .fruit-list-icon-contact' => 'opacity:{{SIZE}};'
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

        $this->start_controls_section(
            'border-widget-testimonial',
            array(
                'label' => esc_html__('Border Box Widget', 'fruit'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->add_group_control(
            Group_Control_Border::get_type(),
            array(
                'name'        => 'border',
                'placeholder' => '1px',
                'default'     => '1px',
                'selector'    => '{{WRAPPER}} .widget-testimonial-fruit',
            )
        );

        $this->add_control(
            'color-border-hover',
            array(
                'label' => esc_html__('Border Color Hover', 'fruit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ccc',
                'selectors'=> array(
                    '{{WRAPPER}} .widget-testimonial-fruit:hover' => 'border-color:{{VALUE}}',
                ),
            )
        );

        $this->add_control(
            'border-radius-box-all',
            array(
                'label' => esc_html__('Border radius', 'fruit'),
                'type' => Controls_Manager::DIMENSIONS,
                'size_units' => array( '%' ),
                'default' => array(
                    'top' => 0,
                    'right' => 0,
                    'bottom' => 0,
                    'left' => 0,
                    'unit' => '%',
                ),
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}}',
                ),
            )
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'background-color-content',
            array(
                'label' => esc_html__('Background Color Content', 'fruit'),
                'tab' => Controls_Manager::TAB_STYLE,
            )
        );

        $this->start_controls_tabs( 'background-color-effects' );

        $this->start_controls_tab(
            'background-nomal',
            array(
                'label' => esc_html__( 'Normal', 'fruit' ),
            )
        );

        $this->add_control(
            'background-color-content-box',
            array(
                'label' => esc_html__('Background Color', 'fruit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#ccc',
                'selectors'=> array(
                    '{{WRAPPER}} .fruit-member-contact' => 'background-color:{{VALUE}}',
                ),
            )
        );

        $this->end_controls_tab();

        $this->start_controls_tab(
            'background-hover',
            array(
                'label' => esc_html__('Hover', 'fruit'),
            )
        );

        $this->add_control(
            'background-color-content-box-hover',
            array(
                'label' => esc_html__('Background Color', 'fruit'),
                'type' => Controls_Manager::COLOR,
                'default' => '#000',
                'selectors' => array(
                    '{{WRAPPER}} .widget-testimonial-fruit:hover .fruit-member-contact' => 'background-color:{{VALUE}}',
                ),
            )
        );

        $this->end_controls_tab();

        $this->end_controls_tabs();

        $this->end_controls_section();

    }
    /**
     * Render the widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     *
     * @access protected
     */

    protected function render(){
        $settings = $this->get_settings_for_display();

        ?>
        <div class="widget-testimonial-fruit">
            <div class="fruit_testimonial">
                <div class="box-img-item apar-member-avatar">
                    <div class="avatar text-center">
                        <img src="<?php echo $settings['images']['url'] ?> " alt="image-testimonial" class="image-testimonial">
                    </div>

                    <ul class="fruit-list-icon-contact list-inline list-unstyled mb-0">
                        <?php foreach ($settings['contact_icon_list'] as $key => $value) { ?>
                            <li class="list-inline-item m-0">
                                <a href="<?php echo esc_url($value['link']['url']) ?>" class="<?php echo esc_attr( $value['member_contact'] ); ?>"></a>
                            </li>
                         <?php } ?>
                    </ul>
                </div>

                <div class="fruit-member-contact">
                    <div class="fruit-member-name">
                        <div class="box-name-testimonial">
                           <?php echo '<' . esc_attr( $settings['heading'] ) . ' class= "name-testimonial">' . esc_html( $settings['name'] ) . '</' . esc_html( $settings['heading'] ) . '>'; ?>
                        </div>
                    </div>
                    <div class="fruit-member-description">
                        <?php echo esc_html($settings['description']); ?>
                    </div>
                </div>
            </div>
        </div>

    <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Fruit_testimonial() );

