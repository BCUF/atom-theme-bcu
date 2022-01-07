<?php $menu = get_component('menu', 'staticPagesMenu') ?>
<?php $layout = 'layout_1col' ?>

<?php $layout = 'layout_2col' ?>
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

<?php decorate_with($layout) ?>

<?php slot('title') ?>
<h1><?php echo render_title($resource->getTitle(array('cultureFallback' => true))) ?></h1>
<?php end_slot() ?>

<div class="page">

    <div>
        <?php echo render_value_html($sf_data->getRaw('content')) ?>
    </div>

</div>

<?php if (QubitAcl::check($resource, 'update')) : ?>
    <?php slot('after-content') ?>
    <section class="actions">
        <ul>
            <li><?php echo link_to(__('Edit'), array($resource, 'module' => 'staticpage', 'action' => 'edit'), array('class' => 'c-btn c-btn-submit', 'title' => __('Edit this page'))) ?></li>
            <?php if (QubitAcl::check($resource, 'delete')) : ?>
                <li><?php echo link_to(__('Delete'), array($resource, 'module' => 'staticpage', 'action' => 'delete'), array('class' => 'c-btn c-btn-delete')) ?></li>
            <?php endif; ?>
        </ul>
    </section>
    <?php end_slot() ?>
<?php endif; ?>