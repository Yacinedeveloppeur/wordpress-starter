<?php get_header() ?>
<main class="padding-content news-page">
    <?php if (have_posts()) : ?>
        <section>
            <?php while (have_posts()) : the_post(); ?>
                <article>
                    <h2><?php the_title() ?></h2>
                    <div class="image-container">
                        <img src="<?php the_post_thumbnail_url('full'); ?>" alt="">
                    </div>
                    <p>
                        <?php the_content() ?>
                    </p>
                </article>
            <?php endwhile; ?>
        </section>
    <?php endif; ?>
</main>
<?php get_footer() ?>