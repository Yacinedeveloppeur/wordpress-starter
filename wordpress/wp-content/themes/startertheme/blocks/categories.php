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
function categories_block_init()
{
	// Skip block registration if Gutenberg is not enabled/merged.
	if (!function_exists('register_block_type')) {
		return;
	}
	$dir = get_stylesheet_directory() . '/blocks';

	$index_js = 'build/categories.js';

	wp_register_script(
		'categories-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$index_js}",
		[
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-api-fetch',
		],
		filemtime("{$dir}/{$index_js}")
	);


	$editor_css = 'categories/editor.css';
	wp_register_style(
		'categories-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$editor_css}",
		[],
		filemtime("{$dir}/{$editor_css}")
	);

	$style_css = 'categories/style.css';
	wp_register_style(
		'categories-block',
		get_stylesheet_directory_uri() . "/blocks/{$style_css}",
		[],
		filemtime("{$dir}/{$style_css}")
	);

	register_block_type('startertheme/categories', [
		'editor_script' => 'categories-block-editor',
		'editor_style'  => 'categories-block-editor',
		'style'         => 'categories-block',
		'category' => 'startertheme',
		'icon' => 'media-document',
		'render_callback' => 'categories_block_render',
		'attributes' => [
			'title' => ['type' => 'string'],
			'mediaID' => ['type' => 'string'],
			'mediaURL' => ['type' => 'string'],
		]
	]);
}

function categories_block_render(array $attributes)
{
	$categories = get_categories(array(
		'orderby' => 'name',
		'order'   => 'ASC'
	));


	if (empty($categories)) {
		return "<p>Pas de catégorie</p>";
	}
	$countCategories = 0;
	$posts_output = '<section class="categories-block"><article>	<h2>' . $attributes['title'] . '</h2><div class="card-container">';
	foreach ($categories as $category) {
		if ($category->name != "Non classé") :
			$countCategories++;
			$posts_output .= '<div class="col number-' . $countCategories . '">
                    <a class="default-card" href="' . get_category_link($category->term_id) . '">
                        <div>
                            <div>
                                <div class="card-icon-container">
								<div class="card-icon" style="background-image:url(' . $attributes['mediaURL'] . ')"></div>
                                </div>
                                <h3>' . $category->name . '</h3>
                            </div>
                            <p>' . $category->description . '</p>
                        </div>
                    </a>
                </div>';
		endif;
	}
	$posts_output .= '</div></article></section><div class="curve-separator-sectioncards">
	</div>';
	return $posts_output;
};

add_action('init', 'categories_block_init');
