<?php

class StaticPageIndexAction extends sfAction
{
  public function execute($request)
  {
    // Check user authorization
    if ('no' === sfConfig::get('app_treeview_show_browse_hierarchy_page', 'no')) {
        QubitAcl::forwardUnauthorized();
    }

    $this->itemsPerPage = sfConfig::get('app_treeview_full_items_per_page', 50);
      
    $this->resource = $this->getRoute()->resource;

    if (1 > strlen($title = $this->resource->__toString()))
    {
      $title = $this->context->i18n->__('Untitled');
    }

    $this->response->setTitle("$title - {$this->response->getTitle()}");

    $this->content = $this->getPurifiedStaticPageContent();

    if (sfConfig::get('app_enable_institutional_scoping') && $this->resource->slug == 'home')
    {
      // Remove the search-realm attribute
      $this->context->user->removeAttribute('search-realm');
    }
  }

  protected function getPurifiedStaticPageContent()
  {
    $culture = sfContext::getInstance()->getUser()->getCulture();
    $cacheKey = 'staticpage:'.$this->resource->id.':'.$culture;
    $cache = QubitCache::getInstance();

    if (null === $cache)
    {
      return;
    }

    if ($cache->has($cacheKey))
    {
      return $cache->get($cacheKey);
    }

    $content = $this->resource->getContent(array('cultureFallback' => true));
    $content = QubitHtmlPurifier::getInstance()->purify($content);

    $cache->set($cacheKey, $content);

    return $content;
  }
}