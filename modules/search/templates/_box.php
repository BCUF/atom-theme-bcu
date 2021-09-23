<div id="search-form-wrapper">

  <form action="<?php echo url_for(array('module' => 'informationobject', 'action' => 'browse')) ?>" data-autocomplete="<?php echo url_for(array('module' => 'search', 'action' => 'autocomplete')) ?>"> 

    <input type="hidden" name="topLod" value="0"/>

    <div class="input-append">

      <?php if (isset($repository)): ?>
        <input autocomplete="off"  type="text" name="query"<?php if (isset($sf_request->query)) echo ' class="focused"' ?> value="<?php echo $sf_request->query ?>" placeholder="<?php echo __('Search %1%', array('%1%' => render_title($repository))) ?>"/>
      <?php else: ?>
        <input autocomplete="off"  type="text" name="query"<?php if (isset($sf_request->query)) echo ' class="focused"' ?> value="<?php echo $sf_request->query ?>" placeholder="<?php echo __('Search') ?>"/>
      <?php endif; ?>

<!-- Emplacement bouton dropdown -->
  <button type="submit" class="btn bcu-search-button">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-search" viewBox="0 0 16 16">
    <path d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z"/></svg>
  </button>

    </div>

    <div id="search-realm" class="search-popover">

      <div class="search-realm-advanced">
        <a href="<?php echo url_for(array('module' => 'informationobject', 'action' => 'browse', 'showAdvanced' => true, 'topLod' => false)) ?>">
          <?php echo __('Advanced search') ?>&nbsp;&raquo;
        </a>
      </div>

    </div>

  </form>

</div>