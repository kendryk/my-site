<form class="form-inline my-2 " action="<?= esc_url(home_url('/')) ?>">
    <div class="form-group mb-2">

    <input class="form-control mr-sm-2"
           name="s"
           type="search"
           placeholder="Recherche"
           aria-label="Search"
           value="<?= get_search_query() ?>">
    </div>

    <button class="btn btn-primary my-2"
            type="submit">Rechercher</button>
</form>