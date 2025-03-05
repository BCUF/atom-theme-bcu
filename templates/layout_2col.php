<?php echo get_partial('layout_start'); ?>

<div id="wrapper" class="container-fluid pt-3 flex-grow-1">
  <?php echo get_partial('alerts'); ?>
  <div class="row">
    <?php include_slot('bcu-filter'); ?>
  </div>
  <div class="row">
    <div id="sidebar" class="col-md-2">
      <?php include_slot('sidebar'); ?>
    </div>
    <div id="main-column" role="main" class="col-md-8">
      <?php include_slot('title'); ?>
      <?php include_slot('before-content'); ?>
      <?php if (!include_slot('content')) { ?>
        <div id="content">
          <?php echo $sf_content; ?>
        </div>
      <?php } ?>
      <?php include_slot('after-content'); ?>
    </div>
    <div id="sidebar-right" class="col-md-2">
      <?php include_slot('popular'); ?>
    </div>
  </div>
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-4 g-4">
    <?php include_slot('main-nav'); ?>
  </div>
</div>

<?php echo get_partial('layout_end'); ?>
