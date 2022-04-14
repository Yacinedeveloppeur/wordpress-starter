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
function sectionmessages_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_stylesheet_directory() . '/blocks';

	$index_js = 'build/sectionmessages.js';
	wp_register_script(
		'sectionmessages-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$index_js}",
		[
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		],
		filemtime( "{$dir}/{$index_js}" )
	);

	$editor_css = 'sectionmessages/editor.css';
	wp_register_style(
		'sectionmessages-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$editor_css}",
		[],
		filemtime( "{$dir}/{$editor_css}" )
	);

	$style_css = 'sectionmessages/style.css';
	wp_register_style(
		'sectionmessages-block',
		get_stylesheet_directory_uri() . "/blocks/{$style_css}",
		[],
		filemtime( "{$dir}/{$style_css}" )
	);

	register_block_type( 'startertheme/sectionmessages', [
		'editor_script' => 'sectionmessages-block-editor',
		'editor_style'  => 'sectionmessages-block-editor',
		'style'         => 'sectionmessages-block',
		'category' => 'startertheme',
		'icon' => 'admin-comments',
		'attributes' => [
			'title' => ['type' => 'string'],
			'text' => ['type' => 'string'],		
			'messageOne' => ['type' => 'string'],
			'messageTwo' => ['type' => 'string'],
			'messageThree' => ['type' => 'string'],
			'messageFour' => ['type' => 'string'],
			'messageFive' => ['type' => 'string'],
			'btn' => ['type' => 'string'],
			'btnLink' => ['type' => 'string'],
			'mediaOneURL' => ['type' => 'string'],
			'mediaOneID' => ['type' => 'string'],
			'mediaTwoURL' => ['type' => 'string'],
			'mediaTwoID' => ['type' => 'string'],
			'mediaThreeURL' => ['type' => 'string'],
			'mediaThreeID' => ['type' => 'string'],
			'mediaFourURL' => ['type' => 'string'],
			'mediaFourID' => ['type' => 'string'],
			'mediaFiveURL' => ['type' => 'string'],
			'mediaFiveID' => ['type' => 'string'],
		],
		'render_callback' => 'sectionmessages_block_render',
	] );
}



function sectionmessages_block_render(array $attributes)
{	
return
	<<<HTML
	<section class="sectionmessages">
    <article>
		<div class="first-block-messages-container">
		<p class="message-one"><img src="{$attributes['mediaOneURL']}"  width='98px'/><span>{$attributes['messageOne']}</span></p>
		<p class="message-two"><span>{$attributes['messageTwo']}</span><img src="{$attributes['mediaTwoURL']}"  width='98px'/></p>
		</div>
	<div class="centered-content">
		<div>
		<h2>{$attributes['title']}</h2>
		<p>{$attributes['text']}</p>
		<a href={$attributes['btnLink']} target="_blank" class="default-btn">{$attributes['btn']}</a>
		</div>
	</div>
	<div class="second-block-messages-container">
	<p><span>{$attributes['messageThree']}</span><img src="{$attributes['mediaThreeURL']}"  width='98px'/></p>
	<p class="message-four"><span>{$attributes['messageFour']}</span><img src="{$attributes['mediaFourURL']}"  width='98px'/></p>
	<p><span>{$attributes['messageFive']}</span><img src="{$attributes['mediaFiveURL']}"  width='98px'/></p>
	</div>
    </article>
</section>
HTML; 
};



add_action( 'init', 'sectionmessages_block_init' );
