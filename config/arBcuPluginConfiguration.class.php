<?php

class arBcuPluginConfiguration extends sfPluginConfiguration
{
  // Summary and version. AtoM recognizes any plugin as a theme as long as
  // the $summary string contains the word "theme" in it (case-insensitive).
  public static
    $summary = 'Theme plugin, extension of arDominionPlugin.',
    $version = '0.0.1';

  public function contextLoadFactories(sfEvent $event)
  {
    // Here we are including the CSS stylesheet build in our pages.
    $context = $event->getSubject();
    $context->response->addStylesheet('/plugins/arBcuPlugin/css/min.css', 'last', array('media' => 'all'));
    //add custom js for read-more/less
    $context->response->addJavaScript('/plugins/arBcuPlugin/js/bcuCustom.js', 'last');
  }

  public function initialize()
  {
    
    
    // Run the class method contextLoadFactories defined above once Symfony
    // is done loading the internal framework factories.
    $this->dispatcher->connect('context.load_factories', array($this, 'contextLoadFactories'));

    // This allows us to override the application decorators.
    $decoratorDirs = sfConfig::get('sf_decorator_dirs');
    $decoratorDirs[] = $this->rootDir.'/templates';
    sfConfig::set('sf_decorator_dirs', $decoratorDirs);

    // This allows us to override the contents of the application modules.
    $moduleDirs = sfConfig::get('sf_module_dirs');
    $moduleDirs[$this->rootDir.'/modules'] = false;
    sfConfig::set('sf_module_dirs', $moduleDirs);
 
    // Custom OAI set definitions
    QubitOai::addOaiSet(new QubitOaiBcuSet());
    QubitOai::addOaiSet(new QubitOaiFondsRFrSet());
    
  }
}
