<?php $browseIcon = [
  'browseInformationObjects' => '<i class="fa fa-map-marker" aria-hidden="true"></i>',
  'browseSubjects' => '<i class="fa fa-tag" aria-hidden="true"></i>',
  'browsePlaces' => '<i class="fa fa-map-marker" aria-hidden="true"></i>',
  'browseActors' => '<i class="fa fa-users" aria-hidden="true"></i>', ]; ?>

<?php $browseMenu = QubitMenu::getByName('browse') ?>
<?php if ($browseMenu->hasChildren()) { ?>
  <?php foreach ($browseMenu->getChildren() as $item) { ?>
      <a class="bcu-browse-icon" href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>" title="<?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>">
        <?php echo ($browseIcon[$item->name]); ?>
      </a>
  <?php } ?>
<?php } ?>