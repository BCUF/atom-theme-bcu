
<h2><?php echo __('Browse by') ?></h2>
<?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
<?php if ($browseMenu->hasChildren()): ?>
  <?php foreach ($browseMenu->getChildren() as $item): ?>
    <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>">
      <?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?>
    </a>
  <?php endforeach; ?>
<?php endif; ?>