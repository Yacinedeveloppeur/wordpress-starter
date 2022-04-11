
<?php 
$categories = get_categories( array(
    'orderby' => 'name',
    'order'   => 'ASC'
) );
$countCategories=0;
?>

<section class="categories_part">
    <article>
        <div class="card-container">
            <?php foreach( $categories as $category ) {
            if ($category->name != "Non classé"):
            $countCategories ++; ?>
            <div class="col number-<?= esc_attr($countCategories)?>">
                <a class="default-card" href=" <?= esc_url( get_category_link( $category->term_id ) )?>">
                    <div>
                        <div>
                            <div class="card-icon-container">
                                <div class="card-icon"></div>
                            </div>
                            <h3><?= esc_html( $category->name )?></h3>
                        </div>
                        <p><?= esc_html( $category->description )?></p>
                    </div>
                </a>
            </div>
        <?php endif; }?>
        </div>  
    </article>
</section>
<div class="curve-separator-categories">
</div>
