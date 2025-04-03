<?php decorate_with('layout_2col'); ?>

<?php slot('bcu-filter'); ?>
  <div class="d-flex justify-content-center main-filter">
    <?php echo get_component('search', 'box2'); ?>
  </div>
<?php end_slot(); ?>

<?php slot('sidebar'); ?>

  <?php echo get_component('menu', 'staticPagesMenu'); ?>

  <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID); ?>
  <?php if ($browseMenu->hasChildren()) { ?>
    <section class="card mb-3">
      <h2 class="h5 p-3 mb-0">
        <?php echo __('Browse by'); ?>
      </h2>
      <div class="list-group list-group-flush">
        <?php foreach ($browseMenu->getChildren() as $item) { ?>
          <a
            class="list-group-item list-group-item-action"
            href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>">
            <?php echo esc_specialchars($item->getLabel(['cultureFallback' => true])); ?>
          </a>
        <?php } ?>
      </div>
    </section>
  <?php } ?>

<?php end_slot(); ?>

<div class="page p-3">
  <h1>
    <?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?>
  </h1>
  <?php echo render_value_html($sf_data->getRaw('content')); ?>
</div>

<?php if (QubitAcl::check($resource, 'update')) { ?>
  <?php slot('after-content'); ?>
    <section class="actions mb-3">
      <?php echo link_to(__('Edit'), [$resource, 'module' => 'staticpage', 'action' => 'edit'], ['class' => 'btn atom-btn-outline-light']); ?>
    </section>
  <?php end_slot(); ?>
<?php } ?>

<?php slot('main-links'); ?>

  <?php $MainLinks = QubitMenu::getByName('MainLinks'); ?>
	<?php if (isset($MainLinks) && $MainLinks->hasChildren()) { ?>
		<?php foreach ($MainLinks->getChildren() as $item) { ?>
      <a href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>" class="thumbnail bcu-thumbnail">
        <div class="col">
          <div class="card bcu">
            <div class="card-body">
              <h5 class="card-title"><?php echo esc_entities($item->getLabel(['cultureFallback' => true])); ?></h5>
                <p class="card-text card-body-text"><?php echo esc_entities($item->getDescription(['cultureFallback' => true])); ?></p>
              </div>
            </div>
          </div>
        </a>
    <?php } ?>
  <?php } ?>
							
<?php end_slot(); ?>

<?php slot('main-nav'); ?>
<?php 

$MainNav = QubitMenu::getByName('MainNav');
if (isset($MainNav) && $MainNav->hasChildren()) {

  $thumbnails = [
    'thumbnail01' => '/plugins/arBcuPlugin/images/thumbnail01.jpg',
    'thumbnail02' => '/plugins/arBcuPlugin/images/thumbnail02.jpg',
    'thumbnail03' => '/plugins/arBcuPlugin/images/thumbnail03.jpg',
    'thumbnail04' => '/plugins/arBcuPlugin/images/thumbnail04.jpg',
    'thumbnail05' => '/plugins/arBcuPlugin/images/thumbnail05.jpg',
    'thumbnail06' => '/plugins/arBcuPlugin/images/thumbnail06.jpg',
    'thumbnail07' => '/plugins/arBcuPlugin/images/thumbnail07.jpg',
    'thumbnail08' => '/plugins/arBcuPlugin/images/thumbnail08.jpg',
    'thumbnail09' => '/plugins/arBcuPlugin/images/thumbnail09.jpg',
    'thumbnail10' => '/plugins/arBcuPlugin/images/thumbnail10.jpg',
    'thumbnail11' => '/plugins/arBcuPlugin/images/thumbnail11.jpg',
    'thumbnail12' => '/plugins/arBcuPlugin/images/thumbnail12.jpg',
    'thumbnail13' => '/plugins/arBcuPlugin/images/thumbnail13.jpg',
    'thumbnail14' => '/plugins/arBcuPlugin/images/thumbnail14.jpg',
    'thumbnail15' => '/plugins/arBcuPlugin/images/thumbnail15.jpg',
    'thumbnail16' => '/plugins/arBcuPlugin/images/thumbnail16.jpg',
    'thumbnail17' => '/plugins/arBcuPlugin/images/thumbnail17.jpg',
    'thumbnail18' => '/plugins/arBcuPlugin/images/thumbnail18.jpg'
  ];
?>

		<?php foreach ($MainNav->getChildren() as $item) { ?>
      <a href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>" class="thumbnail bcu-thumbnail">
        <div class="col">
          <div class="card bcu">
          <img src="<?php echo ($thumbnails[$item->name]); ?>" class="card-img-top" alt="<?php echo esc_entities($item->getLabel(['cultureFallback' => true])); ?>">
            <div class="card-body">
              <h5 class="card-title card-title-img"><?php echo esc_entities($item->getLabel(['cultureFallback' => true])); ?></h5>
              </div>
            </div>
          </div>
        </a>
    <?php } ?>
<?php } ?>
							
<?php end_slot(); ?>

