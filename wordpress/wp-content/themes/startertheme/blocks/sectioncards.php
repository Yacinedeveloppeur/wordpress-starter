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
function sectioncards_block_init() {
	// Skip block registration if Gutenberg is not enabled/merged.
	if ( ! function_exists( 'register_block_type' ) ) {
		return;
	}
	$dir = get_stylesheet_directory() . '/blocks';

	$index_js = 'build/sectioncards.js';
	wp_register_script(
		'sectioncards-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$index_js}",
		[
			'wp-blocks',
			'wp-i18n',
			'wp-element',
		],
		filemtime( "{$dir}/{$index_js}" )
	);

	$editor_css = 'sectioncards/editor.css';
	wp_register_style(
		'sectioncards-block-editor',
		get_stylesheet_directory_uri() . "/blocks/{$editor_css}",
		[],
		filemtime( "{$dir}/{$editor_css}" )
	);

	$style_css = 'sectioncards/style.css';
	wp_register_style(
		'sectioncards-block',
		get_stylesheet_directory_uri() . "/blocks/{$style_css}",
		[],
		filemtime( "{$dir}/{$style_css}" )
	);

	register_block_type( 'startertheme/sectioncards', [
		'editor_script' => 'sectioncards-block-editor',
		'editor_style'  => 'sectioncards-block-editor',
		'style'         => 'sectioncards-block',
		'attributes' => [
			
			'title' => ['type' => 'string'],	
			'mediaID' => ['type' => 'string'],
			'mediaURL' => ['type' => 'string'],
			'btn' => ['type' => 'string'],
			'btnLink' => ['type' => 'string'],
			'titleCardOne' => ['type' => 'string'],
			'textCardOne' => ['type' => 'string'],
			'cardOneLink' => ['type' => 'string'],
			'titleCardTwo' => ['type' => 'string'],
			'textCardTwo' => ['type' => 'string'],
			'cardTwoLink' => ['type' => 'string'],
			'titleCardThree' => ['type' => 'string'],
			'textCardThree' => ['type' => 'string'],
			'cardThreeLink' => ['type' => 'string'],
			'titleCardFour' => ['type' => 'string'],
			'textCardFour' => ['type' => 'string'],
			'cardFourLink' => ['type' => 'string'],
		],
		'render_callback' => 'sectioncards_block_render',
	] );
}



function sectioncards_block_render(array $attributes)
{	
return
	<<<HTML
	<section class="sectioncards">
    <article>
	<h2>{$attributes['title']}</h2>
        <div class="card-container">
            <div class="col number-1">
                <a class="default-card" href={$attributes['cardOneLink']}>
                    <div>
                        <div>
                            <div class="card-icon-container">
                                <div class="card-icon" style="background-image:url({$attributes['mediaURL']})"></div>
                            </div>
                            <h3>{$attributes['titleCardOne']}</h3>
                        </div>
                        <p>{$attributes['textCardOne']}</p>
                    </div>
                </a>
            </div>
        
            <div class="col number-2">
                <a class="default-card" href={$attributes['cardTwoLink']}>
                    <div>
                        <div>
                            <div class="card-icon-container">
                                <div class="card-icon" style="background-image:url({$attributes['mediaURL']})"></div>
                            </div>
                            <h3>{$attributes['titleCardTwo']}</h3>
                        </div>
                        <p>{$attributes['textCardTwo']}</p>
                    </div>
                </a>
            </div>
      
            <div class="col number-3">
                <a class="default-card" href={$attributes['cardThreeLink']}>
                    <div>
                        <div>
                            <div class="card-icon-container">
                                <div class="card-icon" style="background-image:url({$attributes['mediaURL']})"></div>
                            </div>
                            <h3>{$attributes['titleCardThree']}</h3>
                        </div>
                        <p>{$attributes['textCardThree']}</p>
                    </div>
                </a>
            </div>
        
            <div class="col number-4">
                <a class="default-card" href={$attributes['cardFourLink']}>
                    <div>
                        <div>
                            <div class="card-icon-container">
                                <div class="card-icon" style="background-image:url({$attributes['mediaURL']})"></div>
                            </div>
                            <h3>{$attributes['titleCardFour']}</h3>
                        </div>
                        <p>{$attributes['textCardFour']}</p>
                    </div>
                </a>
            </div>
        </div>  
    </article>
</section>
<div class="curve-separator-sectioncards">
</div>	
HTML; 
};



add_action( 'init', 'sectioncards_block_init' );
