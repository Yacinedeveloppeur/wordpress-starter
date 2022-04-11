<?php
/**
 * Functions to register client-side assets (scripts and stylesheets) for the
 * Gutenberg block.
 *
 * @package startertheme
 */

/**
 * Registers all block assets so that they can be enqueued through Gutenberg in
 * the corresponding context.
 *
 * @see https://wordpress.org/gutenberg/handbook/designers-developers/developers/tutorials/block-tutorial/applying-styles-with-stylesheets/
 */
function lastposts_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_stylesheet_directory() . '/blocks';

	$index_js = 'build/lastposts.js';

	wp_register_script(
		'lastposts-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$index_js}",
		[
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-api-fetch',
		],
		filemtime( "{$dir}/{$index_js}" )
	);

	wp_register_style('tinySlider', "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.3/tiny-slider.css", []);
    wp_register_script('tinySlider', "https://cdnjs.cloudflare.com/ajax/libs/tiny-slider/2.9.2/min/tiny-slider.js", [], false, true);
	wp_enqueue_style('tinySlider');
    wp_enqueue_script('tinySlider');
    wp_enqueue_script('slider', get_template_directory_uri() . '/blocks/lastposts/slider.js', array(), '1.0', true);
	

	$editor_css = 'lastposts/editor.css';
	wp_register_style(
		'lastposts-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$editor_css}",
		[],
		filemtime( "{$dir}/{$editor_css}" )
	);

	$style_css = 'lastposts/style.css';
	wp_register_style(
		'lastposts-block',
		get_stylesheet_directory_uri() . "/blocks/{$style_css}",
		[],
		filemtime( "{$dir}/{$style_css}" )
	);

	register_block_type( 'startertheme/lastposts', [
		'editor_script' => 'lastposts-block-editor',
		'editor_style'  => 'lastposts-block-editor',
		'style'         => 'lastposts-block',
		'render_callback' => 'lastposts_block_render'
	] );
}

function lastposts_block_render()
{
	$lastposts = wp_get_recent_posts(
		[
			'numberposts' => 9,
			'post_status' => 'publish'
		]
		);
		if (empty($lastposts)) {
			return "<p>Pas d'articles</p>";
		}
		$posts_output = '<div class="lastposts-block"><div class="slider">';
		foreach ($lastposts as $post) {
			$post_id = $post['ID'];
			$post_author_id = $post['post_author'];
			$post_thumbnail = get_the_post_thumbnail_url($post_id, 'full');
			$posts_output .= '<a class="post slide default-card" href="'.get_permalink($post_id).'">
			<img src="'.$post_thumbnail.'"/></br>
			<i>Par '. get_the_author_meta('display_name', $post_author_id) . ' | ' . get_the_date( 'd F Y', get_the_ID() ) .'</i>
			<h3>'.get_the_title($post_id).'</h3></a>
			';
		}
		$posts_output .= '</dvi></div>';
		return $posts_output;
}

add_action('rest_api_init', 'register_rest_images');
function register_rest_images(){
	register_rest_field( array('post'),
	'fimg_url',
	array(
		'get_callback' => 'get_rest_featured_image',
		'update_callback' => null,
		'schema' => null,
	)
	);
}

function get_rest_featured_image( $object, $field_name, $request ) {
	if ($object['featured_media']) {
		$img = wp_get_attachment_image_src( $object['featured_media'], 'app-thumb' );
		return $img[0];
	}
	return false;
}


add_action( 'init', 'lastposts_block_init' );
