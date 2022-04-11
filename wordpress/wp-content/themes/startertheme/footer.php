    </div>
    <footer class="footer">
    <div class="footer-logo-container">
        <?php 
            echo (get_custom_logo() . '<a href="' . home_url() . '">'.get_bloginfo('name').'</a>')
        ?>
    </div>
    <?php wp_nav_menu([
                    'theme_location' => 'footer',
                    'container' => false,
                    'menu_class' => ''
    ]);
    ?>
     <?= get_search_form() ?>
    </footer>
    <?php wp_footer() ?>
</body>
</html>

