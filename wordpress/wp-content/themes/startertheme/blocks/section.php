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
function section_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_stylesheet_directory() . '/blocks';

	$index_js = 'build/section.js';
	wp_register_script(
		'section-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$index_js}",
		[
			'wp-blocks',
			'wp-i18n',
			'wp-element',
			'wp-components',
			'wp-editor',
		],
		filemtime( "{$dir}/{$index_js}" )
	);

	$editor_css = 'section/editor.css';
	wp_register_style(
		'section-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$editor_css}",
		[],
		filemtime( "{$dir}/{$editor_css}" )
	);

	$style_css = 'section/style.css';
	wp_register_style(
		'section-block',
		get_stylesheet_directory_uri() . "/blocks/{$style_css}",
		[],
		filemtime( "{$dir}/{$style_css}" )
	);

	register_block_type( 'startertheme/section', [
		'editor_script' => 'section-block-editor',
		'editor_style'  => 'section-block-editor',
		'style'         => 'section-block',
		'category' => 'startertheme',
		'icon' => 'media-document',
		'attributes' => [
			'intro' => ['type' => 'string'],
			'content' => ['type' => 'string'],
			'title' => ['type' => 'string'],
			'color' => ['type' => 'string', 'default' => '#000'],
			'mediaID' => ['type' => 'string'],
			'mediaURL' => ['type' => 'string'],
		],
		'render_callback' => 'section_block_render'
	] );
}

function section_block_render(array $attributes)
{
	return <<<HTML

<section class="section-block" style="color:{$attributes['color']}">
          <div class="section-first-block">
            <div>
				<span>
				<p>{$attributes['intro']}</p>
              <h2>{$attributes['title']}</h2>
				</span>
              <p>{$attributes['content']}</p>
            </div>
          </div>
          <div
            class="section-second-block"
            style="background-image:url({$attributes['mediaURL']})"
          ></div>
        </section>


HTML;
}


add_action( 'init', 'section_block_init' );
