<div id="search-form-wrapper">

  <form action="<?php echo url_for(array('module' => 'informationobject', 'action' => 'browse')) ?>" data-autocomplete="<?php echo url_for(array('module' => 'search', 'action' => 'autocomplete')) ?>">

    <input type="hidden" name="topLod" value="0"/>

    <div class="input-append">

      <?php if (isset($repository)): ?>
        <input type="text" name="query"<?php if (isset($sf_request->query)) echo ' class="focused"' ?> value="<?php echo $sf_request->query ?>" placeholder="<?php echo __('Search %1%', array('%1%' => render_title($repository))) ?>"/>
      <?php else: ?>
        <input type="text" name="query"<?php if (isset($sf_request->query)) echo ' class="focused"' ?> value="<?php echo $sf_request->query ?>" placeholder="<?php echo __('Search') ?>"/>
      <?php endif; ?>

<!-- Emplacement bouton dropdown -->

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
