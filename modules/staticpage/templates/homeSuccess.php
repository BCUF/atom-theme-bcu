<div id="homepage-hero">
	<?php decorate_with('layout_2col') ?>

	<?php slot('title') ?>
	<h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
	<?php end_slot() ?>

	<?php slot('sidebar') ?>

	<section>

		<input type="button" id="fullwidth-treeview-reset-button" class="c-btn c-btn-submit bcu-input" value="<?php echo __('Reset') ?>" />
		<input type="button" id="fullwidth-treeview-more-button" class="c-btn c-btn-submit bcu-input" data-label="<?php echo __('%1% more') ?>" value="" />
		<?php echo image_tag('/vendor/jstree/themes/default/throbber.gif', array('id' => 'fullwidth-treeview-activity-indicator', 'alt' => __('Loading ...'))) ?>
		<h2><?php echo __('Hierarchy') ?></h2>

		<div id='main-column' class='span3'></div>
		<span id="fullwidth-treeview-configuration" data-items-per-page="<?php echo $itemsPerPage ?>"></span>

	</section>

	<?php end_slot() ?>

	<div class="page">

		<section id="text-section">
			<?php echo render_value($sf_data->getRaw('content')) ?>
		</section>

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
						'browseEBooks' => '/plugins/arBcuPlugin/images/e-books.png',
						'browseBibliography' => '/plugins/arBcuPlugin/images/bibliographie_fribourgeoise.png',
					]; ?>
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

		<?php if (QubitAcl::check($resource, 'update')) : ?>
			<section class="actions">
				<ul>
					<li><?php echo link_to(__('Edit'), array($resource, 'module' => 'staticpage', 'action' => 'edit'), array('title' => __('Edit this page'), 'class' => 'c-btn')) ?></li>
				</ul>
			</section>
		<?php endif; ?>
	</div>


</div>