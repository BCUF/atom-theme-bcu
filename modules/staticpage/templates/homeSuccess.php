<?php decorate_with('layout_2col'); ?>

<?php slot('bcu-filter'); ?>
  <div class="d-flex justify-content-center main-filter">
  <!-- <div class="d-flex flex-wrap flex-lg-nowrap flex-grow-1"> -->
    <!-- ?php echo get_component('menu', 'browseMenu', ['sf_cache_key' => 'dominion-b5'.$sf_user->getCulture().$sf_user->getUserID()]); ? -->
    <?php echo get_component('search', 'box2'); ?>
  </div>
<?php end_slot(); ?>

<?php slot('title'); ?>
  <h1><?php echo render_title($resource->getTitle(['cultureFallback' => true])); ?></h1>
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

  <!-- ?php echo get_component('default', 'popular', [
      'limit' => 3,
      'sf_cache_key' => $sf_user->getCulture(),
  ]); ? -->

<?php end_slot(); ?>

<div class="page p-3">
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

  <?php $MainNav = QubitMenu::getByName('MainLinks'); ?>
	<?php if ($MainNav->hasChildren()) { ?>
		<?php foreach ($MainNav->getChildren() as $item) { ?>
      <a href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>" class="thumbnail bcu-thumbnail">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title"><?php echo esc_entities($item->getLabel(['cultureFallback' => true])); ?></h5>
                <p class="card-text"><?php echo esc_entities($item->getDescription(['cultureFallback' => true])); ?></p>
              </div>
            </div>
          </div>
        </a>
    <?php } ?>
  <?php } ?>
							
<?php end_slot(); ?>

<?php slot('main-nav'); ?>

  <!-- ?php $thumbnails = [
		'browsePrivateArchives' => '/plugins/arBcuPlugin/images/archives_privees.png',
		'browseMusicalArchives' => '/plugins/arBcuPlugin/images/archives_musicales.png',
		'browsePhotographicArchives' => '/plugins/arBcuPlugin/images/archives_photo.png',
		'browseFilmArchives' => '/plugins/arBcuPlugin/images/archives_film_son.png',
		'browseInstitutionalArchives' => '/plugins/arBcuPlugin/images/archives_institutions.png',
		'browseFilmHeritage' => '/plugins/arBcuPlugin/images/patrimoine_film_son.png',
		'browseManuscripts' => '/plugins/arBcuPlugin/images/livres_manuscrits.png',
		'browseAncientPrints' => '/plugins/arBcuPlugin/images/imprimes_anciens_rares.png',
		'browsePeriodicals' => '/plugins/arBcuPlugin/images/periodiques.png',
		'browseMonographs' => '/plugins/arBcuPlugin/images/monographie.png',
		'browsePress' => '/plugins/arBcuPlugin/images/presse.png',
		'browsePosters' => '/plugins/arBcuPlugin/images/affiches_new.png',
		'browseMaps' => '/plugins/arBcuPlugin/images/cartes_plans.png',
		'browseWebsites' => '/plugins/arBcuPlugin/images/websites.png',
		'browseEBooks' => '/plugins/arBcuPlugin/images/e-books.png',
		'browseBibliography' => '/plugins/arBcuPlugin/images/bibliographie_fribourgeoise.png',
	]; ? -->

<?php $thumbnails = [
		'browsePrivateArchives' => '/images/test-a.jpg',
		'browseMusicalArchives' => '/images/test-b.jpg',
		'browsePhotographicArchives' => '/images/test-a.jpg',
		'browseFilmArchives' => '/images/test-b.jpg',
		'browseInstitutionalArchives' => '/images/test-a.jpg',
		'browseFilmHeritage' => '/images/test-a.jpg',
		'browseManuscripts' => '/images/test-b.jpg',
		'browseAncientPrints' => '/images/test-a.jpg',
		'browsePeriodicals' => '/images/test-b.jpg',
		'browseMonographs' => '/images/test-a.jpg',
		'browsePress' => '/images/test-b.jpg',
		'browsePosters' => '/images/test-a.jpg',
		'browseMaps' => '/images/test-b.jpg',
		'browseWebsites' => '/images/test-a.jpg',
		'browseEBooks' => '/images/test-b.jpg',
		'browseBibliography' => '/images/test-a.jpg',
	]; ?>

  <?php $MainNav = QubitMenu::getByName('MainNav'); ?>
	<?php if ($MainNav->hasChildren()) { ?>
		<?php foreach ($MainNav->getChildren() as $item) { ?>
      <a href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>" class="thumbnail bcu-thumbnail">
        <div class="col">
          <div class="card">
          <img src="<?php echo ($thumbnails[$item->name]); ?>" class="card-img-top" alt="<?php echo esc_entities($item->getLabel(['cultureFallback' => true])); ?>">
            <div class="card-body">
              <h5 class="card-title"><?php echo esc_entities($item->getLabel(['cultureFallback' => true])); ?></h5>
                <!-- <p class="card-text">Description de la carte 2.</p> -->
              </div>
            </div>
          </div>
        </a>
    <?php } ?>
  <?php } ?>
							
<?php end_slot(); ?>

