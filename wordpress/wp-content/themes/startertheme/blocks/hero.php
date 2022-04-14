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
function hero_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_stylesheet_directory() . '/blocks';

	$index_js = 'build/hero.js';
	wp_register_script(
		'hero-block-editor',
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

	$editor_css = 'hero/editor.css';
	wp_register_style(
		'hero-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$editor_css}",
		[],
		filemtime( "{$dir}/{$editor_css}" )
	);

	$style_css = 'hero/style.css';
	wp_register_style(
		'hero-block',
		get_stylesheet_directory_uri() . "/blocks/{$style_css}",
		[],
		filemtime( "{$dir}/{$style_css}" )
	);

	register_block_type( 'startertheme/hero', [
		'editor_script' => 'hero-block-editor',
		'editor_style'  => 'hero-block-editor',
		'style'         => 'hero-block',
		'category' => 'startertheme',
		'icon' => 'media-document',
		'attributes' => [
			'content' => ['type' => 'string'],
			'title' => ['type' => 'string'],
			'color' => ['type' => 'string', 'default' => '#000'],
			'mediaID' => ['type' => 'string'],
			'mediaURL' => ['type' => 'string'],
			'firstBtn' => ['type' => 'string'],
			'firstBtnLink' => ['type' => 'string'],
			'secondBtn' => ['type' => 'string'],
			'secondBtnLink' => ['type' => 'string'],
		],
		'render_callback' => 'hero_block_render'
	] );
}

function hero_block_render(array $attributes)
{
	return <<<HTML

	<section class="hero" style="color:{$attributes['color']}">
          <div class="hero-first-block">
            <div>
              <h1>{$attributes['title']}</h1>
              <p>{$attributes['content']}</p>
              <span class="btn-container">
                <a href={$attributes['firstBtnLink']} target="_blank" class="default-btn">
				{$attributes['firstBtn']}
                </a>
                <a href={$attributes['secondBtnLink']} target="_blank" class="link">
                  <i class="fa-solid fa-play"></i>{$attributes['secondBtn']}
                </a>
              </span>
            </div>
          </div>
          <div
            class="hero-second-block"
            style="background-image:url({$attributes['mediaURL']})"
          ></div>
        </section>


HTML;
}


add_action( 'init', 'hero_block_init' );
