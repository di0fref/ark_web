<?php



//define("CPOTHEME_USE_CLIENTS", true);


/**
 * Enqueues child theme stylesheet, loading first the parent theme stylesheet.
 */
function affluent_child_custom_enqueue_child_theme_styles()
{
    wp_enqueue_style('parent-theme-css', get_template_directory_uri() . '/style.css');
    wp_dequeue_style('parent-theme-style');
    wp_enqueue_style('child-theme-style', get_stylesheet_uri());
}

add_action('wp_enqueue_scripts', 'affluent_child_custom_enqueue_child_theme_styles', 11);


add_theme_support('post-thumbnails');


//remove_filter("cpotheme_homepage_order", "cpotheme_theme_ordering");

//add_filter('cpotheme_homepage_order', 'custom_cpotheme_theme_ordering', 2000);
//
//function custom_cpotheme_theme_ordering($data){
//    return 'slider,tagline,features,testimonials,content';
//}

//Print footer copyright line
function cpotheme_footer_custom()
{
    echo '<div class="footer-content">';
    echo '&copy; ' . esc_attr(get_bloginfo('name')) . ' ' . date("Y");
    echo '</div>';
}


// Register and load the widget
function ark_load_widget()
{
    register_widget('wpb_widget');
    register_widget('ark_map_widget');

}

add_action('widgets_init', 'ark_load_widget');
add_image_size("sidebar", 60, 60, false);


class ark_map_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct('ark_map_widget', __('Ark Map Widget', 'ark_sales_widget_domain'),
            array('description' => __('Ark sales map', 'ark_sales_widget_domain'),));
    }

    public function widget($args, $instance)
    {
        echo "";
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'ark_sales_widget_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>
    <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

class wpb_widget extends WP_Widget
{
    function __construct()
    {
        parent::__construct('ark_sales_widget', __('Ark Sales Widget', 'ark_sales_widget_domain'),
            array('description' => __('Ark sales person contact information widget', 'ark_sales_widget_domain'),));
    }

    public function widget($args, $instance)
    {
        $user_id = 2223;
        $user = get_post($user_id);
        $user_fields = (object)get_fields($user_id);
        $thumb = get_the_post_thumbnail($user_id, "sidebar", array("class" => "circular-small"));

        ?>

        <section id="contact-person">

            <h2>Do you want to know more?</h2>
            <?php echo $thumb; ?>

            <div>

                <h3><?php echo $user->post_title ?></h3>

                <p class="phone">Phone: <?php echo $user_fields->phone ?><p>

                <p class="email"><a href="mailto:<?php echo $user_fields->email ?> ">Email</a></p>

            </div>


            <p><?php echo $user->post_content; ?></p>

            <h2>Be part of an exceptional customer experience</h2>

            <p>Sugar provides an easy-to-use CRM interface focused on features that matter and nothing more.</p>

            <p>
                <a class="" href="https://www.sugarcrm.com">
                    <span class="ctsc-button-content">
                        <span class="">Read more about SugarCRM</span>
                    </span>
                </a>
  <br>
                <a class="" href="http://arksystems.actonservice.com/acton/formfd/34390/0001:d-0002">
                    <span class="ctsc-button-content">
                        <span class="">Sugar eBook Change Maker</span>
                    </span>
                </a>
            </p>

<!--<p><a href="http://arksystems.actonservice.com/acton/attachment/34390/f-0001/0/-/-/-/-/SugarCRM_eBook_v05_Change_Maker.pdf">Sugar eBook Change Maker</a></p>-->


        </section>
        <?php
        echo $args['after_widget'];
    }

    public function form($instance)
    {
        if (isset($instance['title'])) {
            $title = $instance['title'];
        } else {
            $title = __('New title', 'ark_sales_widget_domain');
        }
        ?>
        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>" name="<?php echo $this->get_field_name('title'); ?>" type="text" value="<?php echo esc_attr($title); ?>"/>
        </p>
    <?php
    }

    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        return $instance;
    }
}

function employee_shortcode()
{
    $the_posts = get_posts(array('post_type' => 'cpo_team', "numberposts" => 50, "order" => ASC));

    $data = "<div id='employees'><ul>";

    foreach ($the_posts as $post) {

        $user_fields = (object)get_fields($post->ID);
        $thumb = get_the_post_thumbnail($post->ID, "thumbnail", array("class" => "circular"));

        $data .= '<li>
                    <span>
			    	    <figure>' . $thumb . '</figure>
				        <h4>' . $post->post_title . '</h4>
				        <p class="position"><strong>' . $user_fields->position . '</strong></p>
			        </span>
			        <ul>
				        <li><a href="mailto:' . $user_fields->email . '">' . $user_fields->email . '</a></li>
				        <li>' . $user_fields->phone . '</li>
			        </ul>
            </li>';
    }

    $data .= "</ul></div>";

    return $data;
}

add_shortcode('employees', 'employee_shortcode');
