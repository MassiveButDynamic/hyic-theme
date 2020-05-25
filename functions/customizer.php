<?php
    add_action('customize_register', 'hyic_customizer_settings');
    function hyic_customizer_settings( $wp_customize ) {

        class WP_Customize_Homepage_Sections_Locations_Control extends WP_Customize_Control {
 
            public $type = 'homepage_sections_locations';
         
            public $sections=array();
            public function __construct( $manager, $id, $args = array() ) {

                $this->sections = $args['sections'];
                parent::__construct( $manager, $id, $args );
            }

            public function render_content() {
                ?>
                <label><span class="customize-control-title"><?php echo esc_html($this->label)?></span></label>
                <input id='home_sections_locations_hidden_input' type='hidden' value='test' <?php $this->link()?>>
                <ul id='homepage_sections_order' class='sortable'>
                    <?php foreach($this->sections as $section) {
                        echo "<li class='item' value='".$section['id']."'>".$section['label']."</li>";
                    } ?>
                </ul>
                <script>
                    jQuery('ul#homepage_sections_order.sortable').sortable();
                    jQuery('ul#homepage_sections_order.sortable').sortable().bind('sortupdate', function(e, ui) {
                        //ui.item contains the current dragged element.
                        //Triggered when the user stopped sorting and the DOM position has changed.
                        console.log(ui.item[0].innerHTML);
                        let orderOfSections = '';
                        for(let l of jQuery('#homepage_sections_order').children()) {
                            orderOfSections+=l.getAttribute('value')+',';
                        }
                        orderOfSections=orderOfSections.slice(0, -1);
                        jQuery('#home_sections_locations_hidden_input')[0].value = orderOfSections;
                        jQuery('#home_sections_locations_hidden_input').trigger('change');
                    });
                </script>
                <?php
            }
        }

        // HOMEPAGE-SECTIONS PANEL
        $wp_customize->add_panel('homepage_sections', array(
            'title' => 'Homepage Sections',
            'priority' => 42
        ));

        $wp_customize->add_section('wir', array(
            'title' => 'Wir',
            'priority'=>30,
            'panel'=>'homepage_sections'
        ));
    
        $wp_customize->add_setting('wir_homepage_heading', array(
            'default' => 'Wir',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control('wir_homepage_heading', array(
            'type'=>'text',
            'label'=>'Wir-Section Überschrift',
            'section'=>'wir'
        ));

        $wp_customize->add_setting('wir_homepage_text', array(
            'default' => 'Wir sind eine Gruppe aus Jugendlichen, die bei Hammerbrooklyn die junge Generation vertreten und Innovation aus einem anderen Blickwinkel schaffen wollen.',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control('wir_homepage_text', array(
            'type'=>'textarea',
            'label'=>'Wir-Section Text',
            'section'=>'wir'
        ));


        $wp_customize->add_section('order', array(
            'title' => 'Anordnung',
            'priority'=>10,
            'panel'=>'homepage_sections'
        ));
    
        $wp_customize->add_setting('homepage_sections_order', array(
            'default' => '',
            'transport' => 'refresh'
        ));
        $wp_customize->add_control(
            new WP_Customize_Homepage_Sections_Locations_Control(
              $wp_customize, // WP_Customize_Manager
              'homepage_sections_order', // Setting id
              array( // Args, including any custom ones.
                'label' => __( 'Reihenfolge' ),
                'section' => 'order',
                'sections'=>array(
                    array('id'=>'wir', 'label'=>'Wir'), 
                    array('id'=>'test', 'label'=>'Testlabel'),
                    array('id'=>'partner', 'label'=>'Partner')  
                )
              )
            )
        );

        
    }
?>