<?php
define( 'PARENT_DIR', get_template_directory() );

// Подключение дополнительных файлов, расширяющие тему
include_once (PARENT_DIR . '/includes/shortcodes.php'); // Шорткоды (набор типовых элементов, обязательно сделать шаблон)
include_once (PARENT_DIR . '/includes/widgets/widget.php'); // Виджет (попробовать создать хоть один, либо переделать из плагина)  
include_once (PARENT_DIR . '/includes/metaboxes/metabox.php'); // Пользовательские поля
include_once (PARENT_DIR . '/includes/custom-post-types.php'); // Пользовательские типы записей

include_once (PARENT_DIR . '/options-framework/options-framework.php');  

// Подключение стилей
function theme_styles()
{
    // bootstrap
	wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.min.css');
	wp_enqueue_style('bootstrap');
    // font-awesome
	wp_register_style('font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css');
	wp_enqueue_style('font-awesome');
}
add_action('wp_enqueue_scripts', 'theme_styles'); // Add Custom Styles

// Подключение скриптов
function theme_scripts()
{       
    // jQuery
    wp_register_script('jQuery', get_template_directory_uri() . '/js/jquery.min.js', array('jquery'), '', true);
    wp_enqueue_script('jQuery');
    // bootstrap
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.min.js', array('jquery'), '', true);
    wp_enqueue_script('bootstrap');
    // owl.carousel
    wp_register_script('owl.carousel', get_template_directory_uri() . '/js/owl.carousel.min.js', array('jquery'), '', true);
    wp_enqueue_script('owl.carousel');
    // пользовательские скрипты
    wp_register_script('scripts', get_template_directory_uri() . '/js/scripts.js', array('jquery'), '', true);
    wp_enqueue_script('scripts');    
}
add_action('wp_enqueue_scripts', 'theme_scripts'); // Add Custom Scripts


// Поддержка меню
register_nav_menus( array(
	'base_menu' => 'Главное меню',
	'add_menu' => 'Дополнительное меню'		
));


// Поддержка изображений темы
add_theme_support('post-thumbnails');
add_image_size( 'slag-page', 434, 434, true);
add_image_size( 'slug-single', 1240, 698, true);

// Создание сайдбара для темы
$args = array(
	'name'          => __( 'Sidebar', 'theme_text_domain' ),
	'id'            => 'sidebar-1',
	'description'   => 'Добавьте необходимые виджеты',
	'class'         => '',
	'before_widget' => '',
	'after_widget'  => '',
	'before_title'  => '',
	'after_title'   => ''
);
register_sidebar( $args );

// Меняем внешний вид формы поиска
function my_search_form( $form ) {  
  
    $form = '<form method="get" id="site-searchform" class="searchform" action="' . home_url( '/' ) . '" >   
        <input type="search"  autocomplete="off" value="' . get_search_query() . '" name="s" id="s" placeholder="'.__('Искать').'" />  
        <input type="submit" value="&#xf002;">   
    </form>';  
  
    return $form;
}  
add_filter( 'get_search_form', 'my_search_form' );


// Добавление тегов и опций в редактор WP 
function appthemes_add_quicktags() {  
    if ( wp_script_is('quicktags') ){  
?>  
    <script type="text/javascript">    
        QTags.addButton( 'eg_hr', 'hr', '<hr />', '', 'h', 'Horisontal line', 201 );  
        QTags.addButton( 'eg_br', 'br', '<br />', '', 'br', 'Breack', 202 );
        //QTags.addButton( 'eg_p', 'p', '<p class="simple-text-14">', '', 'p', 'p without margin', 203 );
        //QTags.addButton( 'eg_pm', 'p-margin', '<p class="simple-text-14 text-image-bottom">', '', 'p-margin', 'p with margin', 204 );  
    </script>  
<?php  
    }  
} 

// Хлебные крошки ???

// Пагинация ??? 
