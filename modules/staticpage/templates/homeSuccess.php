<div id="homepage-hero">
    <?php decorate_with('layout_2col') ?>

    <?php slot('title') ?>
      <h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
    <?php end_slot() ?>

    <?php slot('sidebar') ?>

		<?php/* echo get_component('menu', 'staticPagesMenu') ?>

		<section>
			<h2><?php echo __('Browse by') ?></h2>
			<ul>
				<?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
				<?php if ($browseMenu->hasChildren()): ?>
					<?php foreach ($browseMenu->getChildren() as $item): ?>
						<li><a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>"><?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?></a></li>
					<?php endforeach; ?>
				<?php*/ endif; ?>
			<!-- </ul> -->
				<!-- </?php decorate_with('layout_2col.php') ?> -->

				<!-- </?php slot('title') ?> -->
					<input type="button" id="fullwidth-treeview-reset-button" class="c-btn c-btn-submit bcu-input" value="<?php echo __('Reset') ?>" />
					<input type="button" id="fullwidth-treeview-more-button" class="c-btn c-btn-submit bcu-input" data-label="<?php echo __('%1% more') ?>" value="" />
					<?php echo image_tag('/vendor/jstree/themes/default/throbber.gif', array('id' => 'fullwidth-treeview-activity-indicator', 'alt' => __('Loading ...'))) ?>
					<h2><?php echo __('Hierarchy') ?></h2>
				<!-- </?php end_slot() ?> -->

				<!-- </?php slot('content') ?> -->

				<div id='main-column' class='span3'></div>
				<span id="fullwidth-treeview-configuration" data-items-per-page="<?php echo $itemsPerPage ?>"></span>

				<!-- </?php end_slot() ?> -->
		</section>

	<!-- <//?php echo get_component('default', 'popular', array('limit' => 10, 'sf_cache_key' => $sf_user->getCulture())) ?> -->

	<?php end_slot() ?>

	<div class="page">

		<section style="display: inline;">
		<div>
			<ul class="thumbnails bcu-thumbnails">
				<?php $thumbnails = [
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
					'browseEBooks' => '/plugins/arBcuPlugin/images/e-books.png', ]; ?>
				<?php $MainNav = QubitMenu::getByName('MainNav'); ?>
				<?php if ($MainNav->hasChildren()) { ?>
					<?php foreach ($MainNav->getChildren() as $item) { ?>
						<li class="span2">
							<a href="<?php echo url_for($item->getPath(['getUrl' => true, 'resolveAlias' => true])); ?>" class="thumbnail bcu-thumbnail">
								<img src="<?php echo ($thumbnails[$item->name]); ?>" alt="" href="#" class="">
								<div class="bcu-overlay">
									<div class="bcu-text">
										<?php echo esc_entities($item->getLabel(['cultureFallback' => true])); ?>
									</div>
								</div>
							</a>
						</li>
					<?php } ?>
				<?php } ?>
			</ul>
		</div>
		</section>
		<section id="text-section">
			<?php echo render_value($sf_data->getRaw('content')) ?>
		</section>

		<?php if (QubitAcl::check($resource, 'update')): ?>
			<section class="actions">
				<ul>
				<li><?php echo link_to(__('Edit'), array($resource, 'module' => 'staticpage', 'action' => 'edit'), array('title' => __('Edit this page'), 'class' => 'c-btn')) ?></li>
				</ul>
			</section>
		<?php endif; ?>      
	</div>


</div>