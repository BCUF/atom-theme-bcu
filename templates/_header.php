<?php echo get_component_slot('header') ?>

<?php echo get_component('default', 'updateCheck') ?>

<?php if ($sf_user->isAuthenticated()): ?>
  <div id="top-bar">
    <nav>
      <?php echo get_component('menu', 'userMenu') ?>
      <?php if (sfConfig::get('app_toggleLanguageMenu')): ?>
        <?php echo get_component('menu', 'changeLanguageMenu') ?>
      <?php endif; ?>
      <?php echo get_component('menu', 'mainMenu', array('sf_cache_key' => $sf_user->getCulture().$sf_user->getUserID())) ?>
    </nav>
  </div>
<?php endif; ?>

<div id="header">

  <div class="container">

    <div id="header-lvl1">
      <div class="row">

        <div id="logo-and-name" class="span2">
          <?php if ('fr' == $sf_user->getCulture()): ?>
            <h1><?php echo link_to(image_tag('/plugins/arBcuPlugin/images/header-logo.svg', array('alt' => __('Bibliothèque cantonale et universitaire'))), 'https://www.fr.ch/bcufr', array('rel' => 'home')) ?></h1>
          <?php else: ?>
            <h1><?php echo link_to(image_tag('/plugins/arBcuPlugin/images/header-logo.svg', array('alt' => __('Kantons-und Universitätsbibliothek'))), 'https://www.fr.ch/kub', array('rel' => 'home')) ?></h1>
          <?php endif; ?>
        </div>

        <div id="header-title" class="span4">
           <h1><?php echo __('BCU electronic archive') ?></h1>
	      </div>

        <div class="span4">


          <ul id="header-nav" class="nav nav-pills pull-right">

            <?php if ('fr' == $sf_user->getCulture()): ?>
              <li><?php echo link_to(__('Home'), '/index.php?sf_culture=fr') ?></li>
            <?php else: ?>
              <li><?php echo link_to(__('Home'), '/index.php?sf_culture=de') ?></li>
            <?php endif; ?>

            <?php if ('fr' == $sf_user->getCulture()): ?>
              <li><?php echo link_to(__('Contactez-nous'), 'https://www.fr.ch/contact?dir=BCUFR') ?></li>
            <?php else: ?>
              <li><?php echo link_to(__('Kontaktieren Sie uns'), 'https://www.fr.ch/de/kontakt?dir=BCUFR') ?></li>
            <?php endif; ?>

            <?php foreach (array('fr', 'de') as $item): ?>
              <?php if ($sf_user->getCulture() != $item): ?>
                <li><?php echo link_to(format_language($item, $item), array('sf_culture' => $item) + $sf_data->getRaw('sf_request')->getParameterHolder()->getAll()) ?></li>
                <?php break; ?>
              <?php endif; ?>
            <?php endforeach; ?>

            <?php if (!$sf_user->isAuthenticated()): ?>
              <li><?php echo link_to(__('Log in'), array('module' => 'user', 'action' => 'login')) ?></li>
            <?php endif; ?>

          </ul>
          
        </div>
        <div class="span2" align="top">
          <?php echo get_component('menu', 'clipboardMenu') ?>
          <?php echo get_component('menu', 'quickLinksMenu') ?>
        </div>
      </div>
    </div>

    <div id="header-lvl2">
      <div class="row">


        <div id="header-search" class="span12">
          <?php echo get_component('search', 'box') ?>
        </div>


      </div>
    </div>

  </div>

</div>
