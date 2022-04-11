<section class="recent_posts">
<article>
    <div class="title_container">
    <h2>
        <?=  esc_html(get_field('title_section_recent_posts'))?>
    </h2>
    </div>
    <div class="card-container">
        <?php 
         $recentPosts = new WP_Query();
         $recentPosts->query('showposts=4');
         $count=0;
    ?>
        <?php while($recentPosts->have_posts()): $recentPosts->the_post(); $count ++?>
            <div class="col number-<?= esc_attr($count);?>">
                <?= get_template_part('parts/card', 'post'); ?>
            </div>
        <?php endwhile; wp_reset_postdata();?>
        </div>
        
</article>

</section>

<div class="curve-separator">
<div class="btn-container">
<?php $permalink = get_permalink( get_option( 'page_for_posts' ) ); ?>
<a class="default-btn" href="<?= get_post_type_archive_link('post');?>">Voir tout !</a>
</div>
</div>