<footer>
  
  <div class="row mt-5 mb-1 mx-0">
    
    <?php if ('de' == $sf_user->getCulture()) : ?>
      <a class="navbar-brand d-flex flex-wrap flex-lg-nowrap align-items-center py-0 me-0" href="<?php echo url_for('https://www.fr.ch/kub'); ?>" title="Kantons-und Universitätsbibliothek" rel="">
        <?php echo image_tag('/plugins/arBcuPlugin/images/header-logo-bcu.svg', ['alt' => __('Kantons-und Universitätsbibliothek'), 'class' => 'd-inline-block my-0 me-3', 'height' => '51']); ?>
      </a>
    <?php else : ?>
      <a class="navbar-brand d-flex flex-wrap flex-lg-nowrap align-items-center py-0 me-0" href="<?php echo url_for('https://www.fr.ch/bcufr'); ?>" title="Bibliothèque cantonale et universitaire" rel="">
        <?php echo image_tag('/plugins/arBcuPlugin/images/header-logo-bcu.svg', ['alt' => __('Bibliothèque cantonale et universitaire'), 'class' => 'd-inline-block my-0 me-3', 'height' => '51']); ?>
      </a>
    <?php endif; ?>

  </div>

  <?php if (QubitAcl::check('userInterface', 'translate')) { ?>
    <?php echo get_component('sfTranslatePlugin', 'translate'); ?>
  <?php } ?>

  <?php echo get_component_slot('footer'); ?>

  <div id="print-date">
    <?php echo __('Printed: %d%', ['%d%' => date('Y-m-d')]); ?>
  </div>

  <div id="js-i18n">
    <div id="read-more-less-links"
      data-read-more-text="<?php echo __('Read more'); ?>" 
      data-read-less-text="<?php echo __('Read less'); ?>">
    </div>
  </div>

</footer>

<?php $gaKey = sfConfig::get('app_google_analytics_api_key', ''); ?>
<?php if (!empty($gaKey)) { ?>
  <script <?php echo __(sfConfig::get('csp_nonce', '')); ?> async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $gaKey; ?>"></script>
  <script <?php echo __(sfConfig::get('csp_nonce', '')); ?>>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
    <?php include_slot('google_analytics'); ?>
    gtag('config', '<?php echo $gaKey; ?>');
  </script>
<?php } ?>
