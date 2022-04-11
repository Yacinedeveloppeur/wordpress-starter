<form action="<?= esc_url(home_url('/')) ?>">
    <input class="form" type="search" placeholder="Rechercher" name="s" aria-label="Search" value="<?= get_search_query() ?>">
    <button class="default-btn" type="submit">Rechercher</button>
</form>