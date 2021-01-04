<form class="form-inline  my-2 " action="<?= esc_url(home_url('/')) ?>">

    <input class="form-control mx-2 "
           name="s"
           type="search"
           placeholder="Recherche"
           aria-label="Search"
           value="<?= get_search_query() ?>">


    <button class="btn btn-primary mx-2 "
            type="submit">Rechercher</button>
</form>