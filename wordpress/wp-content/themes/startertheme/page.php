<?php get_header() ?>
<main class="padding-content">
<?php if (have_posts()) : ?>
    <h1>Page</h1>
    <?php get_template_part('parts/hero'); ?>
    <?php while (have_posts()) : the_post(); ?>
    <section >
    <?php if (the_post_thumbnail_url('post-thumbnail') != null): ?>
    <img src="<?php the_post_thumbnail_url('post-thumbnail'); ?>" alt="" style="float:left; margin-right:15px; margin-bottom:15px;">
    <?php endif;?>
    <?php the_content() ?>
    </section>
<?php endwhile;
endif; ?>
 </main>
<?php get_footer()?>