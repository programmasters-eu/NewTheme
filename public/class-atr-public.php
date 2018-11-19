<?php

/**
 * La funcionalidad específica de administración del theme.
 *
 * @link       https://newtheme.eu
 * @since      1.0.0
 *
 * @package    theme_name
 * @subpackage theme_name/admin
 */

/**
 * Define el nombre del theme, la versión y dos métodos para
 * Encolar la hoja de estilos específica de administración y JavaScript.
 * 
 * @since      1.0.0
 * @package    ATR THEME
 * @subpackage ATR THEME/admin
 * @author     Jhon J.R <info@newtheme.eu>
 * 
 * @property string $theme_name
 * @property string $version
 */
class ATR_Public {
    
    /**
	 * El identificador único de éste theme
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $theme_name  El nombre o identificador único de éste theme
	 */
    private $theme_name;
    
    /**
	 * Versión actual del theme
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version  La versión actual del theme
	 */
    private $version;
    
    /**
	 * Objeto ATR_Normalize
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $normalize Instancia del objeto ATR_Normalize
	 */
    private $normalize;
    
    /**
	 * Objeto ATR_Helpers
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      object    $helpers Instancia del objeto ATR_Helpers
	 */
    private $helpers;
    
    /**
     * @param string $theme_name nombre o identificador único de éste theme.
     * @param string $version La versión actual del theme.
     */
    public function __construct( $theme_name, $version ) {
        
        $this->theme_name = $theme_name;
        $this->version = $version;
        $this->normalize = new ATR_Normalize;
        
    }
    
    /**
	 * Registra los archivos de hojas de estilos del área de administración
	 *
	 * @since    1.0.0
     * @access   public
	 */
    public function enqueue_styles() {
        
        /**
         * Una instancia de esta clase debe pasar a la función run()
         * definido en ATR_Cargador como todos los ganchos se definen
         * en esa clase particular.
         *
         * El ATR_Cargador creará la relación
         * entre los ganchos definidos y las funciones definidas en este
         * clase.
		 */
        
        wp_enqueue_style( $this->theme_name, ATR_DIR_URI . 'public/css/atr-public.css', array(), $this->version, 'all' );
        wp_enqueue_style( 'normalize', ATR_DIR_URI . 'public/css/normalize.css', array(), '8.0.0', 'all' );


        /**
         * Fuentes de google "google fonts"
         * https://fonts.google.com/?query=roboto&selection.family=Roboto:300
         */
        wp_enqueue_style( 'Roboto-light', 'https://fonts.googleapis.com/css?family=Roboto:100,300,700' );

        
        /**
         * Encolamiento de arcchivos .css que forman parte de la libbreria 
         * de bootstrap del directorio helpers
         */
        wp_enqueue_style( 'bootstrap', ATR_DIR_URI . 'helpers/bootstrap_4.0.0/css/bootstrap.min.css', array(), '4.0.0', 'all');
        wp_enqueue_style( 'bootstrap-grid', ATR_DIR_URI . 'helpers/bootstrap_4.0.0/css/bootstrap-grid.min.css', array(), '4.0.0', 'all');
        wp_enqueue_style( 'bootstrap-reboot', ATR_DIR_URI . 'helpers/bootstrap_4.0.0/css/bootstrap-reboot.min.css', array(), '4.0.0', 'all');

        /**
         *aqui encolaremos la libreria de fontawesome los .css
         *https://fontawesome.com
         */
        wp_enqueue_style( 'fontawesome', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/css/fontawesome.min.css', array(), '5.3.1', 'all');
        wp_enqueue_style( 'brands', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/css/brands.min.css', array(), '5.3.1', 'all');
        wp_enqueue_style( 'regular', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/css/regular.min.css', array(), '5.3.1', 'all');
        wp_enqueue_style( 'solid', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/css/solid.min.css', array(), '5.3.1', 'all');

        
    }
    
    /**
	 * Registra los archivos Javascript del área de administración
	 *
	 * @since    1.0.0
     * @access   public
	 */
    public function enqueue_scripts() {

        /**
         * Cargando la libreria de jquery de wordpress
         */
        wp_enqueue_script('jquery');
        
        /**
         * Una instancia de esta clase debe pasar a la función run()
         * definido en ATR_Cargador como todos los ganchos se definen
         * en esa clase particular.
         *
         * El ATR_Cargador creará la relación
         * entre los ganchos definidos y las funciones definidas en este
         * clase.
		 */        
        
        wp_enqueue_script( $this->theme_name, ATR_DIR_URI . 'public/js/atr-public.js', array( 'jquery' ), $this->version, true );

        /**
         * Encolamiento de archivos de JavaScript de 
         * Bootstrap que se encuentran en el directorio helpers
         */
        wp_enqueue_script( 'bootstrap-js', ATR_DIR_URI . 'helpers/bootstrap_4.0.0/js/bootstrap.min.js', array(), '4.0.0', true );
        wp_enqueue_script( 'bootstrap-bundle-js', ATR_DIR_URI . 'helpers/bootstrap_4.0.0/js/bootstrap.bundle.min.js', array(), '4.0.0', true);

        /**
         * Encolando los archivos JavaScript para fontawesome los .js
         */
        wp_enqueue_script( 'fontawesome-js', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/js/fontawesome.min.js', array(), '5.3.1', true );
        wp_enqueue_script( 'brands-js', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/js/brands.min.js', array(), '5.3.1', true );
        wp_enqueue_script( 'regular-js', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/js/regular.min.js', array(), '5.3.1', true );
        wp_enqueue_script( 'solid-js', ATR_DIR_URI . 'helpers/fontawesome_5.3.1/js/solid.min.js', array(), '5.3.1', true );
        
    }

    public function atr_register_sidebars() {
        /**
         * sidebar para el blog, aqui mostrare las ultimas entradas
         */
       register_sidebar(array(
           'name' => __('Sidebar Blog', 'atr-opt'),
           'id' => __('sidebar_blog', 'atr-opt'),
           'description' => __('sidebar para el blog', 'atr-opt'),
           'before_widget' => '<div class="%1$s" class="widget-blog">',
           'after_widget' => '</div>',
           'before_title' => '<h3 class="widget-blog">',
           'after_title' => '</h3>'
       ));
       
   }

    /**
     * Añade los menus al gancho de inicio en el c-panel del theme
     * @since 1.0.0
     * @access public
     */
    public function atr_add_menus(){

        /**
         * El ATR_Cargador creara la relación entre los ganchos definidos
         * y las funciones definidas en esta clase
         */
        register_nav_menus([
            'menu_principal' => __('Menu Principal', 'atr-opt'),
            'menu_sociales' => __('Menu Redes Sociales', 'atr-opt')
        ]);
        
        //Thumbnails
        add_theme_support('post-thumbnails');

        /**
         * añadir tamaños de imagen 
         */
        add_image_size('blog-post', 500, 230, true);
        add_image_size('singular-post', 1920, 1276, true);

        /**
         * custom logo, con esta funcion puedo cambiar el logo desde el frontend
         */
        $logo = array(
            'height'    => 230,
            'width'     => 80
        );
        add_theme_support('custom-logo');

    }

     /**
     * Añade los custom post type al gancho de inicio en el c-panel del theme
     * https://codex.wordpress.org/Function_Reference/register_post_type (parametres)
     * @since 1.0.0
     * @access public
     */
    public function atr_cpt(){

        /**
     * Añade los custom post type al gancho de inicio en el c-panel del theme
     * atr-cpt es la funcion del custom post type
     * añadimos este CPT para la parte de themes
     */

    /**
     * @var $labels => son los nombres de las etiquetas
     * 
     *      'name'               => nombre en plural para el tipo de publicacion 
     *      'singular_name'      => Nombre para un objeto de este tipo de publicación. El valor predeterminado es Publicar
     *      'menu_name'          => nombre que llevara el menu en el c-panel, por defecto el mismo de los 2 campos anteriores
     *      'name_admin_bar'     => Cadena para usar en Nuevo en la barra de menú de Admin.
     *      'add_new'            => Boton de añadir nuevo, El valor predeterminado es Add New Post
     *      'add_new_itew'       => El valor predeterminado es Añadir nueva publicación
     *      'new_item'           => El valor predeterminado es New post
     *      'edit_item'          => El valor predeterminado es edit post / edit page.
     *      'view_item'          => El valor predeterminado es Ver publicación 
     *      'all_items'          => Cadena para el submenú. El valor predeterminado es Todas las publicaciones / Todas las páginas
     *      'search_items'       => El valor predeterminado es Buscar publicaciones
     *      'parent_item_colon'  => Esta cadena no se utiliza en tipos no jerárquicos. En los jerárquicos, el valor predeterminado es 'Página principal'
     *      'not_found'          => El valor predeterminado es No se han encontrado publicaciones / No se han encontrado páginas.
     *      'not_found_in_trash' => El valor predeterminado es No se encontraron publicaciones en la Papelera 
     */

        $labels = array(
            'name'               => _x( 'Themes', 'atr-opt' ),
            'singular_name'      => _x( 'Themes', 'post type singular name', 'atr-opt' ),
            'menu_name'          => _x( 'Themes', 'admin menu', 'atr-opt' ),
            'name_admin_bar'     => _x( 'Themes', 'add new on admin bar', 'atr-opt' ),
            'add_new'            => _x( 'Add new theme', 'book', 'atr-opt' ),
            'add_new_item'       => __( 'Add new theme', 'atr-opt' ),
            'new_item'           => __( 'New theme', 'atr-opt' ),
            'edit_item'          => __( 'Edit theme', 'atr-opt' ),
            'view_item'          => __( 'View theme', 'atr-opt' ),
            'all_items'          => __( 'All themes', 'atr-opt' ),
            'search_items'       => __( 'Search themes', 'atr-opt' ),
            'parent_item_colon'  => __( 'Parent themes:', 'atr-opt' ),
            'not_found'          => __( 'No themes found.', 'atr-opt' ),
            'not_found_in_trash' => __( 'No themes found in Trash.', 'atr-opt' )
        );

        /**
         * @var $args argumentos para la funcion register_post_type()
         *      
         *      'labels'                => aqui pondremos la array $labels
         *      'description'           => una breve descripcion de lo que es el tipo de publicacion
         *      'public'                => Controla cómo el tipo es visible para los autores y los lectores
         *      'publicly_queryable'    => Si las consultas se pueden realizar en el front-end como parte de parse_request ().
         *      'show_ui'               => se debe generar una IU (interfas de usuario) predeterminada para administrar este tipo de publicación
         *      'show_in_menu'          => Dónde mostrar el tipo de publicación en el menú de administración. show_ui debe ser cierto. Predeterminado
         *      'query_var'             => Establece la clave query_var para este tipo de publicación. por default es true, establecido en $ post_type
         *      'rewrite'               => si utilizamos la opcion comentada, se reescribe, debe estar en false
         *      'capability_type'       => se usa como base para construir capacidades, por default es post
         *      'has_archive'           => Habilita archivos de tipo de publicación. Usará $post_type como archivo comprimido por defecto.
         *      'hierarchical'          => Si el tipo de publicación es jerárquico (por ejemplo, página).Permite que el padre sea especificado. por default es false
         *      'menu_position'         => posicion del muenu
         *      'menu_icon'             => La url al icono que se usará para este menú o el nombre del icono de la fuente del icono
         *      'supports'              => tenemos :title, editor, author, thumbnail, excerpt, trackbacks, custom-fields, comments, post-formats...etc
         *      'taxonomies'            => Un conjunto de taxonomías registradas como category o post_tag que se utilizará con este tipo de publicación.
         */
    
        $args = array(
            'labels'             => $labels,
            'description'        => __( 'Description.', 'atr-opt' ),
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            //'rewrite'            => array( 'slug' => 'themes' ),
            'rewrite'            => false, //asi es correcto, no me reescribe
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'menu_position'      => 3,
            'menu_icon'          => ATR_DIR_URI . 'admin/img/flag-icon.png',
            'supports'           => array( 'title', 'editor', 'thumbnail', 'post-formats', 'custom-fields' ),
            'taxonomies'          => array( 'category', 'post_tag' ),
        );
        
        /**
         *themes sera el nombre id del Custom Post Type
         */
        register_post_type( 'themes', $args );

        /**
         * Esta funcion refresca automaticamente los enlaces de las publicaciones del custom post type
         * asi podremos visualizar los post
         */
        flush_rewrite_rules();

    }

    public function atr_advanced_custom_fields(){

        //para ver el ACF comentar la constante define
        define( 'ACF_LITE', true );

        include_once ATR_DIR_PATH . 'helpers/advanced-custom-fields/acf.php';

        if(function_exists("register_field_group"))
        {
            register_field_group(array (
                'id' => 'acf_banners',
                'title' => 'Banners',
                'fields' => array (
                    array (
                        'key' => 'field_5be98e73d17cf',
                        'label' => 'imagen_textura_1',
                        'name' => 'imagen_textura_1',
                        'type' => 'image',
                        'instructions' => 'poner aqui la imagen de la textura o fondo del banner',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be98f92d17d1',
                        'label' => 'imagen_banner_1',
                        'name' => 'imagen_banner_1',
                        'type' => 'image',
                        'instructions' => 'Poner aqui imagen del banner',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be99007d17d3',
                        'label' => 'texto_banner_1',
                        'name' => 'texto_banner_1',
                        'type' => 'wysiwyg',
                        'instructions' => 'poner aquí titulo y descripción corta para el banner',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_5be98f3bd17d0',
                        'label' => 'imagen_textura_2',
                        'name' => 'imagen_textura_2',
                        'type' => 'image',
                        'instructions' => 'poner aqui la imagen de la textura o fondo del banner',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be98fdbd17d2',
                        'label' => 'imagen_banner_2',
                        'name' => 'imagen_banner_2',
                        'type' => 'image',
                        'instructions' => 'Poner aqui imagen del banner',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be9905ad17d4',
                        'label' => 'texto_banner_2',
                        'name' => 'texto_banner_2',
                        'type' => 'wysiwyg',
                        'instructions' => 'poner aquí titulo y descripción corta para el banner',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'front-page.php',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'default',
                    'hide_on_screen' => array (
                    ),
                ),
                'menu_order' => 0,
            ));
            register_field_group(array (
                'id' => 'acf_themes',
                'title' => 'themes',
                'fields' => array (
                    array (
                        'key' => 'field_5be994cd004ed',
                        'label' => 'archivo',
                        'name' => 'archivo',
                        'type' => 'file',
                        'instructions' => 'suba aqui el archivo de la plantilla o theme',
                        'save_format' => 'url',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be99523004ee',
                        'label' => 'documentation',
                        'name' => 'documentation',
                        'type' => 'file',
                        'instructions' => 'Cargue aquí su archivo de documentacion, pdf o .zip',
                        'save_format' => 'url',
                        'library' => 'all',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'themes',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'default',
                    'hide_on_screen' => array (
                    ),
                ),
                'menu_order' => 0,
            ));
            register_field_group(array (
                'id' => 'acf_top-header',
                'title' => 'top-header',
                'fields' => array (
                    array (
                        'key' => 'field_5be992ae6791b',
                        'label' => 'texto_1',
                        'name' => 'texto_1',
                        'type' => 'text',
                        'instructions' => 'Ponga aqui la clase de su fontawesome',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5be993036791e',
                        'label' => 'imagen_1',
                        'name' => 'imagen_1',
                        'type' => 'image',
                        'instructions' => 'Suba aqui su imagen',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be993c167922',
                        'label' => 'descripcion_1',
                        'name' => 'descripcion_1',
                        'type' => 'wysiwyg',
                        'instructions' => 'ponga aqui la descripcion o el contenido de su header-top',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_5be992136791a',
                        'label' => 'texto_2',
                        'name' => 'texto_2',
                        'type' => 'text',
                        'instructions' => 'Ponga aqui la clase de su fontawesome',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5be9936b6791f',
                        'label' => 'imagen_2',
                        'name' => 'imagen_2',
                        'type' => 'image',
                        'instructions' => 'Suba aqui su imagen',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be9940a67923',
                        'label' => 'descripcion_2',
                        'name' => 'descripcion_2',
                        'type' => 'wysiwyg',
                        'instructions' => 'ponga aqui la descripcion o el contenido de su header-top',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_5be992ca6791c',
                        'label' => 'texto_3',
                        'name' => 'texto_3',
                        'type' => 'text',
                        'instructions' => 'Ponga aqui la clase de su fontawesome',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5be9938167920',
                        'label' => 'imagen_3',
                        'name' => 'imagen_3',
                        'type' => 'image',
                        'instructions' => 'Suba aqui su imagen',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be9942167924',
                        'label' => 'descripcion_3',
                        'name' => 'descripcion_3',
                        'type' => 'wysiwyg',
                        'instructions' => 'ponga aqui la descripcion o el contenido de su header-top',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                    array (
                        'key' => 'field_5be992db6791d',
                        'label' => 'texto_4',
                        'name' => 'texto_4',
                        'type' => 'text',
                        'instructions' => 'Ponga aqui la clase de su fontawesome',
                        'default_value' => '',
                        'placeholder' => '',
                        'prepend' => '',
                        'append' => '',
                        'formatting' => 'html',
                        'maxlength' => '',
                    ),
                    array (
                        'key' => 'field_5be9939467921',
                        'label' => 'imagen_4',
                        'name' => 'imagen_4',
                        'type' => 'image',
                        'instructions' => 'Suba aqui su imagen',
                        'save_format' => 'url',
                        'preview_size' => 'thumbnail',
                        'library' => 'all',
                    ),
                    array (
                        'key' => 'field_5be9943667925',
                        'label' => 'descripcion_4',
                        'name' => 'descripcion_4',
                        'type' => 'wysiwyg',
                        'instructions' => 'ponga aqui la descripcion o el contenido de su header-top',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'page_template',
                            'operator' => '==',
                            'value' => 'front-page.php',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'default',
                    'hide_on_screen' => array (
                    ),
                ),
                'menu_order' => 0,
            ));
            register_field_group(array (
                'id' => 'acf_video-blogs',
                'title' => 'video-blogs',
                'fields' => array (
                    array (
                        'key' => 'field_5be9958b64ab4',
                        'label' => 'video',
                        'name' => 'video',
                        'type' => 'text',
                        'instructions' => 'Ponga aqui el enlace coreespondiente al video subido en youtube',
                        'post_type' => array (
                            0 => 'oembed_cache',
                        ),
                        'allow_null' => 0,
                        'multiple' => 0,
                    ),
                    array (
                        'key' => 'field_5be9965764ab5',
                        'label' => 'texto_video_blog',
                        'name' => 'texto_video_blog',
                        'type' => 'wysiwyg',
                        'instructions' => 'Escriba aqui una descripción corta del video máximo 4 lineas',
                        'default_value' => '',
                        'toolbar' => 'full',
                        'media_upload' => 'yes',
                    ),
                ),
                'location' => array (
                    array (
                        array (
                            'param' => 'post_type',
                            'operator' => '==',
                            'value' => 'post',
                            'order_no' => 0,
                            'group_no' => 0,
                        ),
                    ),
                ),
                'options' => array (
                    'position' => 'normal',
                    'layout' => 'default',
                    'hide_on_screen' => array (
                    ),
                ),
                'menu_order' => 0,
            ));
        }


    }

  
}









