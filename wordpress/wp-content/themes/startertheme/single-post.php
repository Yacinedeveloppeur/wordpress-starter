<?php get_header() ?>
<?php if (have_posts()) : ?>
    <main class="padding-content">
        <section class="pb-5">
            <?php while (have_posts()) : the_post(); ?>
                <?php if (get_post_meta(get_the_ID(), SponsoMetaBox::META_KEY, true) === '1') : ?>
                    <div class='alert alert-warning'>
                        Cet article est sponsorisé
                    </div>
                <?php endif; ?>
                <div>
                    <img src="<?php the_post_thumbnail_url('full'); ?>" alt="" style="float:right;" class="mb-4">
                    <div>
                        <h1><?php the_title() ?></h1>
                        <?php the_content() ?>
                        <i><?= get_the_date('', $post->ID); ?></i>
                    </div>
                </div>
                <?php if (comments_open() || get_comments_number()) {
                    comments_template();
                } ?>
                <?php if (is_array(get_the_terms(get_post(), 'work'))) : ?>
                    <h2 class="my-4">Articles relatifs</h2>
                    <div class="row">
                        <?php
                        $works = array_map(function ($term) {
                            return $term->term_id;
                        }, get_the_terms(get_post(), 'work'));
                        $query = new WP_Query(
                            [
                                'post__not_in' => [get_the_ID()],
                                'post_type' => 'post',
                                'posts_per_page' => 3,
                                'orderby' => 'rand',
                                'tax_query' => [
                                    [
                                        'taxonomy' => 'work',
                                        'terms' => $works,
                                    ]
                                ],
                                'meta_query' => [
                                    [
                                        'key' => SponsoMetaBox::META_KEY,
                                        'compare' => 'NOT EXISTS'
                                    ]
                                ]
                            ]
                        );
                        while ($query->have_posts()) : $query->the_post();
                        ?>
                            <div class="col-sm-4">
                                <?php get_template_part('parts/card', 'post'); ?>
                            </div>
                        <?php endwhile;
                        wp_reset_postdata(); ?>
                    </div>
                <?php endif; ?>
            <?php endwhile; ?>
        <?php endif; ?>
        </section>
    </main>
    <?php get_footer() ?>