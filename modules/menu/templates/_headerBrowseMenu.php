<h3><?php echo $Menu->getLabel() ?></h3>
<?php foreach ($Menu->getChildren() as $item) : ?>
  <a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>">
    <?php echo $item->getLabel(array('cultureFallback' => true)) ?>
  </a>
<?php endforeach; ?>