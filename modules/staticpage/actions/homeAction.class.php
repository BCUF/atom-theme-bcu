<?php

class StaticPageHomeAction extends StaticPageIndexAction
{
    public function execute($request)
    {
        parent::execute($request);

        // Check user authorization
        if ('no' === sfConfig::get('app_treeview_show_browse_hierarchy_page', 'no')) {
            QubitAcl::forwardUnauthorized();
        }
        $this->itemsPerPage = sfConfig::get('app_treeview_full_items_per_page', 50);
        parent::execute($request);
    }
}
