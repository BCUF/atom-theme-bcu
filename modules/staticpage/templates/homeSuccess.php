<div id="homepage-hero">
    <?php decorate_with('layout_2col') ?>

    <?php slot('title') ?>
      <h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
    <?php end_slot() ?>

    <?php slot('sidebar') ?>

      <?php echo get_component('menu', 'staticPagesMenu') ?>

      <section>
        <h2><?php echo __('Browse by') ?></h2>
        <ul>
          <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
          <?php if ($browseMenu->hasChildren()): ?>
            <?php foreach ($browseMenu->getChildren() as $item): ?>
              <li><a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>"><?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?></a></li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </section>

      <?php echo get_component('default', 'popular', array('limit' => 10, 'sf_cache_key' => $sf_user->getCulture())) ?>

    <?php end_slot() ?>

    <div class="page">
	<style>
		.actions {
			padding: 0px;	
		}

		.thumbnail {
			position: relative;
			width: 100%;
			border: none;
			max-width: 400px;
			box-shadow: none;
		}

		.bcu-image {
			display: block;
			width: 100%;
			height: auto;
		}

		a.thumbnail:hover{
			display: grid;
			border: none;
			box-shadow: none;
		}

		.overlay{
			height: 100%;
		}	
			
		.bcu-text{
			position: absolute;
			bottom: 4px;
			right: 4px;
			left: 4px;
			background:rgba(255, 255, 255, 0.8);
			color: black;
			font-size: 0.8rem;
			font-weight: 600;
			padding-left: 0.5rem;
			padding-right: 0.5rem;
			padding-top: 0.5rem;
			padding-bottom: 0.5rem;
			/* text-align: center; */
		}
		.thumbnail:hover .bcu-text{
			background:rgba(255, 255, 255, 0.7);
			font-size: 0.9rem;
			height: 80%;
			padding-top: 2rem;
			/* text-align: left; */
		}
		.thumbnail:hover img{
			opacity: 0.4;
		}
		@media (min-width: 768px) and (max-width: 979px) {
			.bcu-text{
				font-size: 0.6rem
			}
		}
	</style>
      <section style="display: inline;">
		<div>
			<ul class="thumbnails">
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/archives_privees.png" alt="" href="#" class="">
						<div class="overlay">
							<div class="bcu-text">Archives privées</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/archives_musicales.png" alt="" href="#">
						<div class="overlay">
							<div class="bcu-text align-middle">Archives musicales</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/archives_photo.png" alt="" href="#">
						<div class="overlay">
							<div class="bcu-text">Archives photographiques</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/archives_film_son.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Archives film et son</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/archives_institutions.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Archives d'institutions et manifestations culturelles</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/patrimoine_film_son.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Patrimoine film et son</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/livres_manuscrits.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Livres manuscrits</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/imprimes_anciens_rares.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Imprimés anciens et rares</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/periodiques.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Périodiques</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/monographie.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Monographies et ouvrages de référence</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/presse.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Presse</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/affiches_new.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Affiches</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/cartes_plans.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Cartes et plans</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/websites.png" alt="">
						<div class="overlay">
							<div class="bcu-text">Websites</div>
						</div>
					</a>
				</li>
				<li class="span2">
					<a href="#" class="thumbnail">
						<img src="/plugins/arBcuPlugin/images/e-books.png" alt="">
						<div class="overlay">
							<div class="bcu-text">E-books</div>
						</div>
					</a>
				</li>
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