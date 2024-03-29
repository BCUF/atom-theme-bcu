<?php $browseIcon = [
  'browseInformationObjects' => '<i class="bcu-browse-icon fa fa-tags" aria-hidden="true"></i>',
  'browseSubjects' => '<i class="bcu-browse-icon fa fa-tag" aria-hidden="true"></i>',
  'browsePlaces' => '<i class="bcu-browse-icon fa fa-map-marker" aria-hidden="true"></i>',
  'browseActors' => '<i class="bcu-browse-icon fa fa-users" aria-hidden="true"></i>', 
  'browseHierarchy' => '<i class="bcu-browse-icon fa fa-sitemap" aria-hidden="true"></i>',]; ?>

<?php $browseMenu = QubitMenu::getByName('browse') ?>
<?php if ($browseMenu->hasChildren()) { ?>
  <?php foreach ($browseMenu->getChildren() as $item) { ?>
      <a class="bcu-browse-link" href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>" title="<?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>">
        <?php echo ($browseIcon[$item->name]); ?>
      </a>
  <?php } ?>
<?php } ?>