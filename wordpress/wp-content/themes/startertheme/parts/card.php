<?php 
$icon_cards = get_field('icon_cards');
 ?>
 <a href="<?php the_permalink() ?>" class="default-card ">
<div >
    <div>
    <div class="card-icon-container">
    <img src="<?= esc_url($icon_cards['url']); ?>" alt="<?= esc_attr($icon_cards['alt']); ?>" width="50px" />
    </div>
    <h5><?php the_title() ?></h5>    
    </div>
<p ><?php the_excerpt() ?></p>
        
</div>
</a>

