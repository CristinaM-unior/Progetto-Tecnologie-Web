<?php

// Load Stylesheets
function load_css()
{
        wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css', array(), false, 'all' );
        wp_enqueue_style('bootstrap');

        wp_register_style('main', get_template_directory_uri() . '/css/main.css', array('bootstrap'), false, 'all' );
        wp_enqueue_style('main');


}
add_action('wp_enqueue_scripts', 'load_css');


//Load Javascript
function load_js()
{
        wp_enqueue_script('jquery');

        wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.bundle.min.js', array('jquery'), false, true);
        wp_enqueue_script('bootstrap');
}
add_action('wp_enqueue_scripts', 'load_js');



//Theme Options
add_theme_support('menus');

function mytheme_enqueue_fonts() {
    wp_enqueue_style(
        'google-fonts',
        'https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap',
        false
    );
}
add_action('wp_enqueue_scripts', 'mytheme_enqueue_fonts');

add_theme_support('widgets');


// Menus
register_nav_menus(

    array(
        'top-menu' => 'Top Menu Location',
        'mobile-menu' => 'Mobile Menu Location',
        )

);

//Register sidebar
function my_sidebars()
{
        register_sidebar(

                array(
                        'name' => 'Page Sidebar',
                        'id' => 'page_sidebar',
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</div>',
                        'before_title' => '<h4 class="widget-title">',
                        'after_title' => '</h4>' 
                )

        );


        register_sidebar(

                array(
                        'name' => 'Blog Sidebar',
                        'id' => 'blog_sidebar',
                        'before_widget' => '<div id="%1$s" class="widget %2$s">',
                        'after_widget'  => '</div>',
                        'before_title' => '<h4 class="widget-title">',
                        'after_title' => '</h4>' 
                )

        );
}

add_action('widgets_init', 'my_sidebars');


// Calendario
function calendar_script() {
    wp_enqueue_script(
        'calendar-script',
        get_template_directory_uri() . '/js/calendar.js',array(), false, true);
}
add_action('wp_enqueue_scripts', 'calendar_script');


class Calendar_Widget extends WP_Widget {
    function __construct() {
        parent::__construct(
            'calendar_widget',
            'Calendario con icone',
            array()
        );
    }

    function widget($args, $instance) {
        echo $args['before_widget'];
        echo '<div id="calendar-header"></div>';
        echo '<div id="calendar" class="calendar-grid"></div>';
        echo '<div id="icon-picker" class="hidden"></div>';
        echo $args['after_widget'];
    }
}


// Registra il widget
function register_calendar_widget() {
    register_widget('Calendar_Widget');
}
add_action('widgets_init', 'register_calendar_widget');




//Questionario
function my_save_custom_form() {
    
    $risposte = $_POST['risposta'];

    $content = '';
    foreach ($risposte as $domanda => $valore) {
        $content .= ucfirst($domanda) . ': ' . sanitize_text_field($valore) . "\n";
    }

    wp_insert_post(array(
        'post_title'   => 'L\'emozione di oggi:',
        'post_content' => $content,
        'post_type'    => 'question_response',
        'post_status'  => 'publish'
    ));

    wp_safe_redirect('http://localhost:8000/archivio/');
    exit;
}
add_action('admin_post_nopriv_save_my_custom_form', 'my_save_custom_form');
add_action('admin_post_save_my_custom_form', 'my_save_custom_form');




add_filter('the_content', 'usp_remove_fieldnames_from_content', 20);
function usp_remove_fieldnames_from_content($content) {
    $pattern = '/\busp_custom_field_2\b\s*:?\s*/i';
    $content = preg_replace($pattern, '', $content);

    $content = preg_replace('/\busp_custom_field\b\s*:?\s*/i', '', $content);

    return $content;
}