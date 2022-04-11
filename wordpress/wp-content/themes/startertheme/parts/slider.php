<?php
    $images = get_field('gallery_section_2');
    if ($images) : ?>
      <div id="slider" class="slider">
        <?php foreach ($images as $image) : ?>
          <div class="slide" height="50px" style='background-image: url(<?= esc_url($image['url']) ?>)'>

          </div>
        <?php endforeach; ?>
      </div>
    <?php endif; ?>