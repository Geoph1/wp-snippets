<!-- Меню -->

<?php 
	// В functions.php
	register_nav_menus( array(
		'base_menu' => 'Главное меню',
		'add_menu' => 'Дополнительное меню'		
	));

	// В шаблоне, напр. header.php
	$args = array(
		'theme_location' => 'base_menu',
		'menu' => 'Название меню (если необходимо)',
		'container' => 'nav',
		'container_class' => 'название класса',
		'container_id' => 'название id',
		'menu_class' => 'menu',
		'menu_id' => '',
		'before' => 'текст перед тегом а',
		'after' => 'текст после тега а',
		'link_before' => 'текст перед анкором',
		'link_after' => 'текст после анкора',
		'items_wrap' => '<ul id = "%1$s" class = "%2$s">%3$s</ul>',
		'depth' => 0,
	);
	wp_nav_menu( $args );
?>


<!-- Сайдбар -->

<?php // Dynamic Sidebar
if ( ! function_exists( 'dynamic_sidebar' ) || ! dynamic_sidebar( 'Sidebar Name' ) ) : ?>

	<!-- Sidebar fallback content -->

<?php endif; // End Dynamic Sidebar Sidebar Name ?>

<?php if ( is_active_sidebar( 'sidebar-id' ) ) : ?>
	<div id="widget-area" class="widget-area">
		<?php dynamic_sidebar( 'sidebar-id' ); ?>
	</div><!-- .widget-area -->
<?php endif; ?>

<?php 
	$args = array(
		'name'          => __( 'Sidebar name', 'theme_text_domain' ),
		'id'            => 'sidebar-id',
		'description'   => '',
		'class'         => '',
		'before_widget' => '<li id="%1" class="widget %2">',
		'after_widget'  => '</li>',
		'before_title'  => '<h2 class="widgettitle">',
		'after_title'   => '</h2>'
	);

	register_sidebar( $args );
 ?>


 <!-- Запросы WP Query -->

 <?php 
	// Самые популярные и основные запросы WP_Query
	$args = array(
		'category_name'    => 'blog', // название категории
		'post_type'   => 'any', // тип выводимых записей, напр. page или пользовательский
		'order'               => 'DESC', // 
		'orderby'             => 'date', //
		'tag'           => 'cooking', // по названию тега
		'posts_per_page'         => 10,
		'paged'                  => $paged, // номер страницы пагинации, необходим при создании пагинации, использовать глобальную переменную $wp_query
		'meta_key'       => 'key', // по ключу мета-поля
		'pagename'		=>  'name_of_page', // по имени страницы, использовать slug
		'name'			=>  'name_of_post'  // по имени записи, использовать slug 
	);

	$query = new WP_Query( $args );

	// Стандартный запрос в шаблоне темы
	$query = new WP_Query ( array( 'category_name' => 'blog', 'order' => 'DESC', 'posts_per_page' => 10 ) );
 	$query = new WP_Query ( array( 'post_type' => 'page', 'orderby' => 'rand' ) );
 	$query = new WP_Query ( array( 'post_type' => 'page', 'pagename' => 'about' ) );
 	$wp_query = new WP_Query ( array( 'post_type' => 'post', 'category_name' => 'blog', 'paged' => $paged ) );
?>


<!-- Пользовательские записи и таксономия -->

<?php 
	function prefix_register_name() {
	
		$labels = array(
			'name'                => __( 'Portfolio', 'text-domain' ),
			'singular_name'       => __( 'Portfolio Case', 'text-domain' ),
			'add_new'             => _x( 'Add New Portfolio Case', 'text-domain', 'text-domain' ),
			'add_new_item'        => __( 'Add New Portfolio Case', 'text-domain' ),
			'edit_item'           => __( 'Edit Portfolio Case', 'text-domain' ),
			'new_item'            => __( 'New Portfolio Case', 'text-domain' ),
			'menu_name'           => __( 'Portfolio', 'text-domain' ),
		);
	
		$args = array(
			'labels'                   => $labels,
			'hierarchical'        => true, // вывод в стиле Рубрики
			'taxonomies'          => array(),
			'public'              => true,
			'show_ui'             => true,
			'menu_position'       => 5,
			'menu_icon'           => get_template_directory_uri() . '/includes/images/ico-portfolio.png',
			'show_in_nav_menus'   => true,
			'rewrite'             => array( // использовать ли ЧПУ для ссылок
	            'slug' => 'portfolio',
	            'with_front' => FALSE,
        		),
			'capability_type'     => 'post',
			'supports'            => array(
				'title', 'editor', 'author', 'thumbnail',
				'excerpt','custom-fields', 'trackbacks', 'comments',
				'revisions', 'page-attributes', 'post-formats'
				)
		);
	
		register_post_type( 'portfolio', $args );

		
		$labels = array(
			'name'					=> _x( 'Portfolio', 'Taxonomy Portfolio', 'text-domain' ),
			'singular_name'			=> _x( 'Portfolio Case', 'Taxonomy Portfolio Case', 'text-domain' ),
			'edit_item'				=> __( 'Edit Portfolio Case', 'text-domain' ),
			'add_new_item'			=> __( 'Add New Portfolio Case', 'text-domain' ),
			'new_item_name'			=> __( 'New Portfolio Case Name', 'text-domain' ),
			'menu_name'				=> __( 'Portfolio Case', 'text-domain' ),
		);
	
		$args = array(
			'labels'            => $labels,
			'rewrite'           => true,
			'query_var'         => true,
		);
		
		register_taxonomy( 'portfolio_category', 'portfolio', $args );
	}
	
	add_action( 'init', 'prefix_register_name' );
?>





