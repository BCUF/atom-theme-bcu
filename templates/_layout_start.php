<!DOCTYPE html>
<html lang="<?php echo $sf_user->getCulture(); ?>" dir="<?php echo sfCultureInfo::getInstance($sf_user->getCulture())->direction; ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php include_title(); ?>
    <?php echo get_component('default', 'tagManager', ['code' => 'script']); ?>
    <link rel="shortcut icon" href="<?php echo public_path('favicon.ico'); ?>">
    <script defer src="/plugins/arBcuPlugin/dist/js/vendor.bundle.1697f26639ee588df9ee.js"></script><script defer src="/plugins/arBcuPlugin/dist/js/arBcuPlugin.bundle.2239ab28d8f5940072bd.js"></script><link href="/plugins/arBcuPlugin/dist/css/arBcuPlugin.bundle.5f24988e712b05096558.css" rel="stylesheet">
    <?php echo get_component_slot('css'); ?>
  </head>
  <body class="d-flex flex-column min-vh-100 <?php echo $sf_context->getModuleName(); ?> <?php echo $sf_context->getActionName(); ?>">
    <?php echo get_component('default', 'tagManager', ['code' => 'noscript']); ?>
    <?php echo get_partial('header'); ?>
    <?php include_slot('pre'); ?>
