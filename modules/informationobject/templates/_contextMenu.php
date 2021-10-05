<?php if ($sf_user->getAttribute('search-realm') && sfConfig::get('app_enable_institutional_scoping')) { ?>
  <?php include_component('repository', 'holdingsInstitution', ['resource' => QubitRepository::getById($sf_user->getAttribute('search-realm'))]); ?>
<?php } else { ?>
  <?php echo get_component('repository', 'logo'); ?>
<?php } ?>

<?php echo get_component('informationobject', 'treeView'); ?>

<?php slot('contextMenuSidebar') ?>
  <section>

      <input type="button" id="fullwidth-treeview-reset-button" class="c-btn c-btn-submit bcu-input" value="<?php echo __('Reset') ?>" />
      <input type="button" id="fullwidth-treeview-more-button" class="c-btn c-btn-submit bcu-input" data-label="<?php echo __('%1% more') ?>" value="" />
      <?php echo image_tag('/vendor/jstree/themes/default/throbber.gif', array('id' => 'fullwidth-treeview-activity-indicator', 'alt' => __('Loading ...'))) ?>

    <div id='main-column' class='span3'></div>
    <span id="fullwidth-treeview-configuration" data-items-per-page="<?php echo $itemsPerPage ?>"></span>

  </section>
<?php end_slot() ?>
