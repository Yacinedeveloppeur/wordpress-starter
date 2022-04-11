<?php get_header() ?>
<section class="padding-content">
    <article>
        <h1><?php the_category(' - ') ?></h1>
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <?php get_template_part('parts/category', 'post'); ?>
              <div style="text-align:center">
              <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" style="margin-right:15px; margin-bottom:15px;">
              </div>
            <?php endwhile; ?>
            <?php startertheme_pagination() ?>
            <?= paginate_links(); ?>
        <?php else : ?>
            <h1>Pas d'articles</h1>
        <?php endif; ?>
    </article>
</section>
<?php get_footer() ?>