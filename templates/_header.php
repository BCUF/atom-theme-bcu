<?php echo get_component_slot('header') ?>

<?php echo get_component('default', 'updateCheck') ?>

<?php if ($sf_user->isAuthenticated()) : ?>
  <div id="top-bar">
    <nav>
      <?php echo get_component('menu', 'userMenu') ?>
      <?php if (sfConfig::get('app_toggleLanguageMenu')) : ?>
        <?php echo get_component('menu', 'changeLanguageMenu') ?>
      <?php endif; ?>
      <?php echo get_component('menu', 'mainMenu', array('sf_cache_key' => $sf_user->getCulture() . $sf_user->getUserID())) ?>
    </nav>
  </div>
<?php endif; ?>

<div id="header">

  <div class="container">

    <div id="header-lvl1">
      <div class="row">

        <div id="logo-and-name" class="span3">
          <?php if ('fr' == $sf_user->getCulture()) : ?>
            <h1><?php echo link_to(image_tag('/plugins/arBcuPlugin/images/header-logo-bcu.svg', array('alt' => __('Bibliothèque cantonale et universitaire'))), 'https://www.fr.ch/bcufr', array('rel' => 'home')) ?></h1>
          <?php else : ?>
            <h1><?php echo link_to(image_tag('/plugins/arBcuPlugin/images/header-logo-bcu.svg', array('alt' => __('Kantons-und Universitätsbibliothek'))), 'https://www.fr.ch/kub', array('rel' => 'home')) ?></h1>
          <?php endif; ?>
        </div>

        <?php if ('fr' == $sf_user->getCulture()) : ?>
          <div id="Fri-Memoria-logo" class="span3" style="padding-left: 20px;">
            <h1><a href="/index.php?sf_culture=fr"><img src="/plugins/arBcuPlugin/images/FriMemoria-logo_new.svg"></a></h1>
          </div>
        <?php else : ?>
          <div id="Fri-Memoria-logo" class="span3" style="padding-left: 20px;">
            <h1><a href="/index.php?sf_culture=de"><img src="/plugins/arBcuPlugin/images/FriMemoria-logo_new_DE.svg"></a></h1>
          </div>
        <?php endif; ?>

        <!-- bouton feedback PC -->
        <?php if ('fr' == $sf_user->getCulture()) : ?>
          <a id="feedback-link" href="/feedback" title="Votre avis nous intéresse !"><img id="feedback-img" src="/plugins/arBcuPlugin/images/feedbackIconRight.svg"></img></a>
        <?php else : ?>
          <a id="feedback-link" href="/feedback" title="Ihre Meinung ist uns wichtig !"><img id="feedback-img" src="/plugins/arBcuPlugin/images/feedbackIconRightDE.svg"></img></a>
        <?php endif; ?>

        <!-- bouton feedback mobile -->
        <?php if ('fr' == $sf_user->getCulture()) : ?>
          <a id="feedback-link-mobile" href="/feedback" title="Votre avis nous intéresse !"><img id="feedback-img-mobile" src="/plugins/arBcuPlugin/images/feedbackIconRightSmall.svg"></img></a>
        <?php else : ?>
          <a id="feedback-link-mobile" href="/feedback" title="Ihre Meinung ist uns wichtig !"><img id="feedback-img-mobile" src="/plugins/arBcuPlugin/images/feedbackIconRightSmall.svg"></img></a>
        <?php endif; ?>

        <div id="header-nav-container" class="span5">


          <ul style id="header-nav" class="nav nav-pills pull-right">

            <?php if ('fr' == $sf_user->getCulture()) : ?>
              <li><?php echo link_to(__('Home'), '/index.php?sf_culture=fr') ?></li>
            <?php else : ?>
              <li><?php echo link_to(__('Home'), '/index.php?sf_culture=de') ?></li>
            <?php endif; ?>

            <?php if ('fr' == $sf_user->getCulture()) : ?>
              <li><?php echo link_to(__('Conditions d\'utilisation'), '/privacy?sf_culture=fr') ?></li>
            <?php else : ?>
              <li><?php echo link_to(__('Nutzungsbedingungen'), '/privacy?sf_culture=de') ?></li>
            <?php endif; ?>

            <?php if ('fr' == $sf_user->getCulture()) : ?>
              <li><?php echo mail_to('fri-memoria@fr.ch', 'Contactez-nous') ?></li>
            <?php else : ?>
              <li><?php echo mail_to('fri-memoria@fr.ch', 'Kontaktieren Sie uns') ?></li>
            <?php endif; ?>

            <?php foreach (array('fr', 'de') as $item) : ?>
              <?php if ($sf_user->getCulture() != $item) : ?>
                <li><?php echo link_to(format_language($item, $item), array('sf_culture' => $item) + $sf_data->getRaw('sf_request')->getParameterHolder()->getAll()) ?></li>
                <?php break; ?>
              <?php endif; ?>
            <?php endforeach; ?>

            <?php
            $local_url = "local.bcu-fribourg.ch";
            // $local_url = "localhost";
            $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if ((!$sf_user->isAuthenticated()) && (strpos($actual_link, $local_url) !== false)) {
              if ('fr' == $sf_user->getCulture()) {
                echo '<li><a href="/user/login" title="Ouverture de session"><i class="	fa fa-sign-in" style="color: #555555;font-size: 20px;" aria-hidden="true"></i></a></li>';
              } else {
                echo '<li><a href="/user/login" title="Anmelden"><i class="	fa fa-sign-in" style="color: #555555;font-size: 20px;" aria-hidden="true"></i></a></li>';
              }
            }

            ?>

          </ul>

        </div>
      </div>
      <div class="row">
        <div id="staticPagesMenu" class="span6" style="vertical-align: top;">
          <?php echo get_component('menu', 'staticPagesMenu') ?>

          <?php if ('fr' == $sf_user->getCulture()) : ?>
            <span title="Presse-papier" style="padding-left: 70px;"><?php echo get_component('menu', 'clipboardMenu') ?></span>
          <?php else : ?>
            <span title="Zwischenablage" style="padding-left: 70px;"><?php echo get_component('menu', 'clipboardMenu') ?></span>
          <?php endif; ?>

          <?php if ('fr' == $sf_user->getCulture()) : ?>
            <span title="Liens rapides"><?php echo get_component('menu', 'quickLinksMenu') ?></span>
          <?php else : ?>
            <span title="Direkter Link"><?php echo get_component('menu', 'quickLinksMenu') ?></span>
          <?php endif; ?>

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