<?php
//Agregar scripts style,javascript
add_action( 'wp_enqueue_scripts', 'scriptsTemplate' );

function scriptsTemplate(){
    wp_enqueue_style( 'style',get_stylesheet_uri());
    wp_enqueue_style( 'template',get_template_directory_uri()."/css/template.css");
    wp_enqueue_style( 'bootstrap',get_template_directory_uri()."/css/bootstrap.min.css");

    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'bootstrap',get_template_directory_uri()."/js/bootstrap.min.js");
}

// iniciar elementos necesarios del tema
add_action( 'after_setup_theme','instalarTemplate' );

function instalarTemplate(){

    // Cargamos la gestion de la imagen destacada
    add_theme_support( 'post-thumbnails' );

    // creamos tamaños de las imagenes del sitio
    add_image_size( 'destacado',340,220,true );
    add_image_size( 'grande',700,400,false );

    register_nav_menus( array('main-menu'=>esc_html__( 'Menú principal', '' )));
}

// Permitir subida de archivos SVG
function permitir_svg($mimes) {
    $mimes['svg'] = 'image/svg+xml';
    return $mimes;
}
add_filter('upload_mimes', 'permitir_svg');



//registro de sidebar(area de Widgets)
add_action( 'widgets_init', 'iniciarWidget' );

function iniciarWidget(){
    register_sidebar( array(
        'name'=>esc_html__( 'Area de barra lateral derecha' ),
        'id'=>'barra_lateal_1'
        
        
        ) );
}

//Header

function custom_theme_customizer($wp_customize) {
    // Configuración para el logo
    $wp_customize->add_section('custom_logo_section', array(
        'title' => __('Logo', 'your-theme-textdomain'),
        'priority' => 30,
    ));
    $wp_customize->add_setting('custom_logo');
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'custom_logo', array(
        'label' => __('Upload Logo', 'your-theme-textdomain'),
        'section' => 'custom_logo_section',
        'settings' => 'custom_logo',
    )));

    // Configuración para enlaces de redes sociales
    $wp_customize->add_section('social_links_section', array(
        'title' => __('Social Media Links', 'your-theme-textdomain'),
        'priority' => 31,
    ));
    
    // Facebook
    $wp_customize->add_setting('facebook_link', array('default' => '#'));
    $wp_customize->add_control('facebook_link', array(
        'label' => __('Facebook URL', 'your-theme-textdomain'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));
    
    // Twitter
    $wp_customize->add_setting('twitter_link', array('default' => '#'));
    $wp_customize->add_control('twitter_link', array(
        'label' => __('Twitter URL', 'your-theme-textdomain'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));
    
    // Instagram
    $wp_customize->add_setting('instagram_link', array('default' => '#'));
    $wp_customize->add_control('instagram_link', array(
        'label' => __('Instagram URL', 'your-theme-textdomain'),
        'section' => 'social_links_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'custom_theme_customizer');

//slider

function custom_slider_customizer($wp_customize) {
    // Crear la sección del Slider
    $wp_customize->add_section('slider_section', array(
        'title' => __('Slider', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Añadir configuraciones para cada diapositiva (imagen, texto y botón)
    for ($i = 1; $i <= 3; $i++) {
        // Imagen de la diapositiva
        $wp_customize->add_setting("slider_image_$i");
        $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, "slider_image_$i", array(
            'label' => __("Slide $i Image", 'your-theme-textdomain'),
            'section' => 'slider_section',
            'settings' => "slider_image_$i",
        )));

        // Título de la diapositiva
        $wp_customize->add_setting("slider_title_$i", array('default' => ''));
        $wp_customize->add_control("slider_title_$i", array(
            'label' => __("Slide $i Title", 'your-theme-textdomain'),
            'section' => 'slider_section',
            'type' => 'text',
        ));

        // Texto de la diapositiva
        $wp_customize->add_setting("slider_text_$i", array('default' => ''));
        $wp_customize->add_control("slider_text_$i", array(
            'label' => __("Slide $i Text", 'your-theme-textdomain'),
            'section' => 'slider_section',
            'type' => 'textarea',
        ));

        // Texto del botón
        $wp_customize->add_setting("slider_button_text_$i", array('default' => ''));
        $wp_customize->add_control("slider_button_text_$i", array(
            'label' => __("Slide $i Button Text", 'your-theme-textdomain'),
            'section' => 'slider_section',
            'type' => 'text',
        ));

        // URL del botón
        $wp_customize->add_setting("slider_button_url_$i", array('default' => ''));
        $wp_customize->add_control("slider_button_url_$i", array(
            'label' => __("Slide $i Button URL", 'your-theme-textdomain'),
            'section' => 'slider_section',
            'type' => 'url',
        ));
    }
}
add_action('customize_register', 'custom_slider_customizer');


//introducion

function custom_intro_section($wp_customize) {
    // Sección de introducción
    $wp_customize->add_section('intro_section', array(
        'title' => __('Intro Section', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Título de introducción
    $wp_customize->add_setting('intro_title', array('default' => 'Introducción'));
    $wp_customize->add_control('intro_title', array(
        'label' => __('Title', 'your-theme-textdomain'),
        'section' => 'intro_section',
        'type' => 'text',
    ));

    // Subtítulo de introducción
    $wp_customize->add_setting('intro_subtitle', array('default' => 'Texto titular de un bloque destacado'));
    $wp_customize->add_control('intro_subtitle', array(
        'label' => __('Subtitle', 'your-theme-textdomain'),
        'section' => 'intro_section',
        'type' => 'text',
    ));

    // Texto de introducción
    $wp_customize->add_setting('intro_text', array('default' => 'Lorem ipsum dolor sit amet...'));
    $wp_customize->add_control('intro_text', array(
        'label' => __('Description', 'your-theme-textdomain'),
        'section' => 'intro_section',
        'type' => 'textarea',
    ));

    // Texto del botón
    $wp_customize->add_setting('intro_button_text', array('default' => 'Ver más'));
    $wp_customize->add_control('intro_button_text', array(
        'label' => __('Button Text', 'your-theme-textdomain'),
        'section' => 'intro_section',
        'type' => 'text',
    ));

    // URL del botón
    $wp_customize->add_setting('intro_button_url', array('default' => '#'));
    $wp_customize->add_control('intro_button_url', array(
        'label' => __('Button URL', 'your-theme-textdomain'),
        'section' => 'intro_section',
        'type' => 'url',
    ));
}
add_action('customize_register', 'custom_intro_section');


//newsletter 

function process_newsletter_form() {
    // Verificar el nonce
    if (!isset($_POST['newsletter_nonce_field']) || !wp_verify_nonce($_POST['newsletter_nonce_field'], 'newsletter_nonce')) {
        wp_redirect(add_query_arg('newsletter_error', 'nonce_failed', wp_get_referer()));
        exit;
    }

    // Verificar el email
    $email = sanitize_email($_POST['newsletter_email']);

    if (!is_email($email)) {
        wp_redirect(add_query_arg('newsletter_error', 'invalid_email', wp_get_referer()));
        exit;
    }

    // Insertar el email en la base de datos
    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter_subscribers';
    $wpdb->insert($table_name, array(
        'email' => $email,
        'date' => current_time('mysql')
    ));

    wp_redirect(add_query_arg('newsletter_success', 'true', wp_get_referer()));
    exit;
}
add_action('admin_post_nopriv_save_newsletter', 'process_newsletter_form');
add_action('admin_post_save_newsletter', 'process_newsletter_form');

// Crear tabla de suscriptores de newsletter
function create_newsletter_table() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter_subscribers';

    if ($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name) {
        $charset_collate = $wpdb->get_charset_collate();

        $sql = "CREATE TABLE $table_name (
            id mediumint(9) NOT NULL AUTO_INCREMENT,
            email varchar(100) NOT NULL,
            date datetime DEFAULT CURRENT_TIMESTAMP NOT NULL,
            PRIMARY KEY (id)
        ) $charset_collate;";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
    }
}
add_action('after_switch_theme', 'create_newsletter_table');

// Agregar página de suscriptores al admin
function add_newsletter_menu_page() {
    add_menu_page(
        'Newsletter Subscribers',
        'Newsletter Subscribers',
        'manage_options',
        'newsletter-subscribers',
        'display_newsletter_subscribers',
        'dashicons-email',
        20
    );
}
add_action('admin_menu', 'add_newsletter_menu_page');

function display_newsletter_subscribers() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter_subscribers';
    $subscribers = $wpdb->get_results("SELECT * FROM $table_name");

    echo '<div class="wrap"><h1>Newsletter Subscribers</h1>';
    echo '<a href="' . esc_url(admin_url('admin-post.php?action=export_newsletter_csv')) . '" class="button button-primary">Exportar Suscriptores</a>';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead><tr><th>ID</th><th>Email</th><th>Date</th></tr></thead>';
    echo '<tbody>';

    if ($subscribers) {
        foreach ($subscribers as $subscriber) {
            echo '<tr>';
            echo '<td>' . esc_html($subscriber->id) . '</td>';
            echo '<td>' . esc_html($subscriber->email) . '</td>';
            echo '<td>' . esc_html($subscriber->date) . '</td>';
            echo '</tr>';
        }
    } else {
        echo '<tr><td colspan="3">No subscribers found.</td></tr>';
    }

    echo '</tbody>';
    echo '</table></div>';
}
function export_newsletter_csv() {
    if (!current_user_can('manage_options')) {
        return;
    }

    global $wpdb;
    $table_name = $wpdb->prefix . 'newsletter_subscribers';
    $subscribers = $wpdb->get_results("SELECT * FROM $table_name");

    if (empty($subscribers)) {
        wp_redirect(admin_url('admin.php?page=newsletter-subscribers&no_subscribers=true'));
        exit;
    }

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment;filename=newsletter_subscribers.csv');

    $output = fopen('php://output', 'w');
    fputcsv($output, array('ID', 'Email', 'Date'));

    foreach ($subscribers as $subscriber) {
        fputcsv($output, array($subscriber->id, $subscriber->email, $subscriber->date));
    }

    fclose($output);
    exit;
}
add_action('admin_post_export_newsletter_csv', 'export_newsletter_csv');


//dosier

function custom_dossier_customizer($wp_customize) {
    // Sección de descarga de dossier
    $wp_customize->add_section('dossier_section', array(
        'title' => __('Dossier Download', 'your-theme-textdomain'),
        'priority' => 30,
    ));

    // Subir archivo PDF
    $wp_customize->add_setting('dossier_pdf', array(
        'default' => '',
        'sanitize_callback' => 'esc_url_raw',
    ));
    $wp_customize->add_control(new WP_Customize_Upload_Control($wp_customize, 'dossier_pdf', array(
        'label' => __('Upload Dossier PDF', 'your-theme-textdomain'),
        'section' => 'dossier_section',
        'settings' => 'dossier_pdf',
    )));

    // Texto de enlace
    $wp_customize->add_setting('dossier_text', array(
        'default' => 'Descarga nuestro dossier comercial haciendo clic aquí',
        'sanitize_callback' => 'sanitize_text_field',
    ));
    $wp_customize->add_control('dossier_text', array(
        'label' => __('Dossier Link Text', 'your-theme-textdomain'),
        'section' => 'dossier_section',
        'type' => 'text',
    ));
}
add_action('customize_register', 'custom_dossier_customizer');


?>

