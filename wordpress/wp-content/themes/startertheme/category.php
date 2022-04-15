<?php get_header() ?>
<main class="category padding-content">
<?php $works = get_terms(['taxonomy' => 'work']); ?>
<ul class="menu">
<?php 
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
$activeCategories=[];
foreach (get_the_category() as $element) {
    $activeCategories[]=$element->name;
}
foreach( $categories as $category ) {
    $category_link = sprintf( 
        (in_array($category->name, $activeCategories)) ? '<a class="link link-active" href="%1$s" alt="%2$s">%3$s</a>' : '<a class="link" href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );
    echo '<li class="item">' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</li>';
} 
?>
</ul>
<?php if (have_posts()) : ?>
    <section>
        <div>
            <div>
                <?php while (have_posts()) : the_post(); ?>
                    <div class="post">
                        <?php get_template_part('parts/category'); ?>
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


