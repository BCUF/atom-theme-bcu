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
        <div class="span2" align="top">
          <?php echo get_component('menu', 'clipboardMenu') ?>
          <?php echo get_component('menu', 'quickLinksMenu') ?>
        </div>
        <div class="span6"></div>
        <div id="header-lvl2">
          <div class="row">


            <div id="header-search" class="span6">
              <?php echo get_component('search', 'box') ?>
            </div>


          </div>
        </div>
        <!-- </?php slot('sidebar') ?> -->

        <?php echo get_component('menu', 'staticPagesMenu') ?>

        <section>
          <!-- <h2></?php echo __('Browse by') ?></h2> -->
          <ul class="BCU-header-menu-ul">
            <?php $bcubrowseicon = [
              'browseInformationObjects' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-collection" viewBox="0 0 16 16">
                <path d="M2.5 3.5a.5.5 0 0 1 0-1h11a.5.5 0 0 1 0 1h-11zm2-2a.5.5 0 0 1 0-1h7a.5.5 0 0 1 0 1h-7zM0 13a1.5 1.5 0 0 0 1.5 1.5h13A1.5 1.5 0 0 0 16 13V6a1.5 1.5 0 0 0-1.5-1.5h-13A1.5 1.5 0 0 0 0 6v7zm1.5.5A.5.5 0 0 1 1 13V6a.5.5 0 0 1 .5-.5h13a.5.5 0 0 1 .5.5v7a.5.5 0 0 1-.5.5h-13z"/>
              </svg>',
              'browseSubjects' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-lightbulb" viewBox="0 0 16 16">
              <path d="M2 6a6 6 0 1 1 10.174 4.31c-.203.196-.359.4-.453.619l-.762 1.769A.5.5 0 0 1 10.5 13a.5.5 0 0 1 0 1 .5.5 0 0 1 0 1l-.224.447a1 1 0 0 1-.894.553H6.618a1 1 0 0 1-.894-.553L5.5 15a.5.5 0 0 1 0-1 .5.5 0 0 1 0-1 .5.5 0 0 1-.46-.302l-.761-1.77a1.964 1.964 0 0 0-.453-.618A5.984 5.984 0 0 1 2 6zm6-5a5 5 0 0 0-3.479 8.592c.263.254.514.564.676.941L5.83 12h4.342l.632-1.467c.162-.377.413-.687.676-.941A5 5 0 0 0 8 1z"/>
            </svg>',
              'browsePlacess' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-geo-alt" viewBox="0 0 16 16">
              <path d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A31.493 31.493 0 0 1 8 14.58a31.481 31.481 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94zM8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10z"/>
              <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4zm0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
            </svg>',
              'browseActors' => '<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
              <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1h8zm-7.978-1A.261.261 0 0 1 7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002a.274.274 0 0 1-.014.002H7.022zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4zm3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0zM6.936 9.28a5.88 5.88 0 0 0-1.23-.247A7.35 7.35 0 0 0 5 9c-4 0-5 3-5 4 0 .667.333 1 1 1h4.216A2.238 2.238 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816zM4.92 10A5.493 5.493 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275zM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0zm3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4z"/>
            </svg>', ]; ?>
            <?php $browseMenu = QubitMenu::getById(QubitMenu::BROWSE_ID) ?>
            <?php if ($browseMenu->hasChildren()): ?>
              <?php foreach ($browseMenu->getChildren() as $item): ?>
                <li class="BCU-header-menu-li"><a href="<?php echo url_for($item->getPath(array('getUrl' => true, 'resolveAlias' => true))) ?>"<?php echo ($bcubrowseicon[$item->name]); ?>><?php echo esc_specialchars($item->getLabel(array('cultureFallback' => true))) ?></a></li>
              <?php endforeach; ?>
            <?php endif; ?>
          </ul>
        </section>
        <!-- </?php end_slot() ?> -->
      </div>
    </div>


  </div>

</div>
