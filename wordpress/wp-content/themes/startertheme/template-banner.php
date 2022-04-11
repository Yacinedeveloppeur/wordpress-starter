<?php
/**
 * Template Name: Page avec bannière
 * Template Post Type: page, post
*/
?>

<?php get_header() ?>
<main class="container mt-4">
<?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
    <section >
        <div class="d-flex justify-content-center">
        <img src="<?php the_post_thumbnail_url('');?>" alt=""  width="100%" style="max-height:490px">
        </div>
            
            <h1 class="text-center my-4"><?php the_title() ?></h1>
            <?php the_content() ?>
    </section>
<?php endwhile;
endif; ?>
 </main>
<?php get_footer() ?>