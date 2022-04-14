<?php get_header() ?>
<main class="container padding-content">

<?php $works = get_terms(['taxonomy' => 'work']); ?>
<ul class="nav nav-pills">
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
        (in_array($category->name, $activeCategories)) ? '<a class="nav-link bg-warning active" href="%1$s" alt="%2$s">%3$s</a>' : '<a class="nav-link text-dark" href="%1$s" alt="%2$s">%3$s</a>',
        esc_url( get_category_link( $category->term_id ) ),
        esc_attr( sprintf( __( 'View all posts in %s', 'textdomain' ), $category->name ) ),
        esc_html( $category->name )
    );
    echo '<li class="nav-item mx-2">' . sprintf( esc_html__( '%s', 'textdomain' ), $category_link ) . '</li>';
} 
?>
</ul>
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


