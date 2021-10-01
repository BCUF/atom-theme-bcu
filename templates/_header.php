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
            <h1><?php echo link_to(image_tag('/plugins/arBcuPlugin/images/header-logo-bcu.svg', array('alt' => __('Bibliothèque cantonale et universitaire'))), 'https://www.fr.ch/bcufr', array('rel' => 'home')) ?></h1>
          <?php else: ?>
            <h1><?php echo link_to(image_tag('/plugins/arBcuPlugin/images/header-logo-bcu.svg', array('alt' => __('Kantons-und Universitätsbibliothek'))), 'https://www.fr.ch/kub', array('rel' => 'home')) ?></h1>
          <?php endif; ?>
        </div>

        <div id="header-title" class="span4">
           <h1><?php echo __('BCU electronic archive') ?></h1>
	      </div>

        <div id="header-nav-container" class="span5">


          <ul style id="header-nav" class="nav nav-pills pull-right">

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

            <?php
              $local_url = "local.bcu-fribourg.ch";
              // $local_url = "localhost";
              $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

              if ((!$sf_user->isAuthenticated())&&(strpos($actual_link, $local_url) !== false)){
                echo "<li>" . link_to(__('Log in'), array('module' => 'user', 'action' => 'login')) . "</li>";
              }
              
            ?>

          </ul>
          
        </div>
      </div>
      <div class="row">
          <div class="span6" style="vertical-align: top;">
            <?php echo get_component('menu', 'staticPagesMenu') ?>
            <span title="Presse-papier"><?php echo get_component('menu', 'clipboardMenu') ?></span>
            <span title="Aide"><?php echo get_component('menu', 'quickLinksMenu') ?></span>
          </div>
          <span class="span1"></span>
          <div id="header-search" class="span5">
            <?php echo get_component('search', 'box') ?>
          </div>
          
          <!-- <div id="header-lvl2">
            <div class="row"> -->

            <!-- </div>
          </div> -->
        </div>
      </div>
    </div>


  </div>

</div>