<?php

require_once('walker/CommentWalker.php');
require_once('blocks/hero.php');
require_once('blocks/section.php');
require_once('blocks/sectionmessages.php');
require_once('blocks/lastposts.php');
require_once('blocks/categories.php');


function startertheme_supports()
{
    add_theme_support('title-tag');
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
    add_theme_support('menus');
    add_theme_support('html5');
    register_nav_menu('header', 'En tête du menu');
    register_nav_menu('footer', 'Pied de page');
    add_image_size('post-thumbnail', 350, 215, true);
}

function startertheme_register_assets()
{
    // wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css', []);
    wp_register_script('bundle', 'https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js', [], false, true);
    wp_register_script('jquery', 'https://code.jquery.com/jquery-3.2.1.min.js', [], false, true);
    wp_register_style('fontAwesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.0/css/all.min.css', []);
    // wp_enqueue_style('bootstrap');
    wp_enqueue_style('fontAwesome');
    wp_enqueue_script('bundle');
    wp_enqueue_style('style', get_stylesheet_uri(), array(), '1.0');
    wp_enqueue_style('main', get_template_directory_uri() . '/main.css', array(), '1.0');
}


// **********************MENU***********************


function startertheme_wp_nav_menu_items($items, $args)
{  
    if ($args->theme_location == 'header') {
        $homeLink = '<a href="' . home_url() . '">'.get_bloginfo('name').'</a>';
        $items = '<div class="logo">' . get_custom_logo() . $homeLink . '</div><input class="menu-btn" type="checkbox" id="menu-btn" />
        <label class="menu-icon" for="menu-btn"><span class="navicon"></span></label><ul class="menu">' . $items . '</ul>';
       
    } 
    elseif ($args->theme_location == 'footer') {
        $items = '<ul>' . $items . '</ul>';

    } 
    return $items;
}



function startertheme_menu_class($classes)
{
    $classes[] = 'nav-item*';
    return $classes;
}

function startertheme_menu_link_class($attrs)
{
    $attrs['class'] = 'nav-link*';
    return $attrs;
}

function startertheme_title_separator()
{
    return '|';
}

add_action('after_setup_theme', 'startertheme_supports');
add_action('wp_enqueue_scripts', 'startertheme_register_assets');

add_filter('nav_menu_css_class', 'startertheme_menu_class');
add_filter('nav_menu_link_attributes', 'startertheme_menu_link_class');
add_filter('wp_nav_menu_items', 'startertheme_wp_nav_menu_items', 10, 2);

add_action('after_switch_theme', 'flush_rewrite_rules');
add_action('switch_theme', 'flush_rewrite_rules');
add_filter('document_title_separator', 'startertheme_title_separator');





function startertheme_pagination()
{
    $pages = paginate_links(['type' => 'array']);
    if ($pages === null) {
        return;
    }
    echo '<nav aria-label="Pagination my-4">';
    echo '<ul class="pagination">';
    foreach ($pages as $page) {
        $active = strpos($page, 'current') !== false;
        $class = 'page-item';
        if ($active) {
            $class .= ' active';
        }
        echo '<li class="' . $class . '">';
        echo str_replace('page-numbers', 'page-link', $page);
        echo '</li>';
    }
    echo '</nav>';
}



//TAXONOMY


function startertheme_init()
{
    register_taxonomy(
        'work',
        'post',
        [
            'labels' => [
                'name' => 'Réalisations',
                'singular_name'     => 'Réalisation',
                'plural_name'       => 'Réalisations',
                'search_items'      => 'Rechercher des réalisations',
                'all_items'         => 'Toutes les réalisations',
                'edit_item'         => 'Editer la réalisation',
                'update_item'       => 'Mettre à jour la réalisation',
                'add_new_item'      => 'Ajouter une nouvelle réalisation',
                'new_item_name'     => 'Ajouter une nouvelle réalisation',
                'menu_name'         => 'Réalisation',
            ],
            'show_in_rest' => true,
            'hierarchical' => true,
            'show_admin_column' => true,
        ]
    );
}

add_action('init', 'startertheme_init');



//BLOCS

add_filter(
    'block_categories',
    function ($categories) {
        $categories[] = [
            'slug' => 'startertheme',
            'title' => 'Starter Theme',
            'icon' => null
        ];
        return $categories;
    }
);


if (function_exists('acf_register_block_type')) {
    add_action('acf/init', function () {
        acf_register_block_type(
            [
                'name' => 'recent_posts',
                'title' => 'Derniers articles',
                'icon' => 'media-document',
                'render_template' => 'blocks/recent_posts.php',
                'enqueue_style' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
                'category' => 'theme',
                'supports' => [
                    'align' => false,
                    'mode' => true,
                    'multiple' => false,
                ]
            ],

        );
        acf_register_block_type(
            [
                'name' => 'question_list',
                'title' => 'Liste de questions',
                'icon' => 'list-view',
                'render_template' => 'blocs/question_list.php',
                'enqueue_style' => 'https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css',
                'category' => 'theme',
                'supports' => [
                    'align' => false,
                    'mode' => true,
                    'multiple' => false,
                ]
            ],
        );
    });
};



/**
 * Manages sponso post
 *
 * Use meta boxes
 */

require_once('metaboxes/sponso.php');
SponsoMetaBox::register();

add_filter('manage_post_posts_columns', function ($columns) {
    $newColumns = [];
    foreach ($columns as $k => $v) {
        if ($k === 'date') {
            $newColumns['sponso'] = 'Article sponsorisé ?';
        }
        $newColumns[$k] = $v;
    }
    return $newColumns;
});


add_filter('manage_post_posts_custom_column', function ($column, $postId) {
    if ($column === 'sponso') {
        if (!empty(get_post_meta($postId, SponsoMetaBox::META_KEY, true))) {
            $class = 'yes';
        } else {
            $class = 'no';
        }
        echo '<div class="bullet bullet-' . $class . '"></div>';
    }
}, 10, 2);


/**
 * @param WP_Query $query
 */


function startertheme_pre_get_posts($query)
{
    if (is_admin() || !is_search() || !$query->is_main_query()) {
        return;
    }
    if (get_query_var('sponso') === '1') {
        $meta_query = $query->get('meta_query', []);
        $meta_query[] = [
            'key' => SponsoMetaBox::META_KEY,
            'compare' => 'EXISTS',
        ];
        $query->set('meta_query', $meta_query);
    }
}

function startertheme_query_vars($params)
{
    $params[] = 'sponso';
    return $params;
}

add_action('pre_get_posts', 'startertheme_pre_get_posts');
add_filter('query_vars', 'startertheme_query_vars');




/**
 * Proper ob_end_flush() for all levels
 *
 * This replaces the WordPress `wp_ob_end_flush_all()` function
 * with a replacement that doesn't cause PHP notices.
 */
remove_action('shutdown', 'wp_ob_end_flush_all', 1);
add_action('shutdown', function () {
    while (@ob_end_flush());
});


// Fix issue : "Update to WP 5.9.1 breaks media selection"

function acf_filter_rest_api_preload_paths( $preload_paths ) {
	global $post;
	$rest_path    = rest_get_route_for_post( $post );
	$remove_paths = array(
		add_query_arg( 'context', 'edit', $rest_path ),
		sprintf( '%s/autosaves?context=edit', $rest_path ),
	);

	return array_filter(
		$preload_paths,
		function( $url ) use ( $remove_paths ) {
			return ! in_array( $url, $remove_paths, true );
		}
	);
}
add_filter( 'block_editor_rest_api_preload_paths', 'acf_filter_rest_api_preload_paths', 10, 1 );