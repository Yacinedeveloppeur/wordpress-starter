<?php get_header() ?>
<main class="container">
<?php get_template_part('parts/hero'); ?>
<?php $works = get_terms(['taxonomy' => 'work']); ?>
<?php if (is_array($works)) : ?>
    <ul class="nav nav-pills">
        <li class="nav-item">
            <a class="nav-link text-dark" href=<?= home_url() ?>>Tout</a>
        </li>
        <?php foreach ($works as $work) : ?>
            <li class="nav-item">
                <a href="<?= get_term_link($work) ?>"  <?= is_tax('work', $work->term_id) ? 'class="nav-link active bg-warning"' : 'class="nav-link text-dark' ?>"><?= $work->name ?></a>
            </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
<?php if (have_posts()) : ?>
    <section class="album py-5">
        <div class="container">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <?php while (have_posts()) : the_post(); ?>
                    <div class="col-sm-4">
                        <?php get_template_part('parts/card', 'post'); ?>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </section>
    <?php startertheme_pagination() ?>
<?php else : ?>
    <h1>Pas d'articles</h1>
<?php endif; ?>
</main>
<?php get_footer() ?>