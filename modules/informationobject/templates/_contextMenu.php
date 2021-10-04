<?php if ($sf_user->getAttribute('search-realm') && sfConfig::get('app_enable_institutional_scoping')) { ?>
  <?php include_component('repository', 'holdingsInstitution', ['resource' => QubitRepository::getById($sf_user->getAttribute('search-realm'))]); ?>
<?php } else { ?>
  <?php echo get_component('repository', 'logo'); ?>
<?php } ?>

<?php echo get_component('informationobject', 'treeView'); ?>

<?php if (!$showTreeview) { ?>
    <?php echo get_component('term', 'treeView', ['browser' => false]); ?>
  <?php } else { ?>

    <?php echo get_component('term', 'treeView', ['browser' => false, 'tabs' => true, 'pager' => $listPager]); ?>
<?php } ?>