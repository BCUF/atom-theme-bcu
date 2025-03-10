<?php echo get_partial('layout_start'); ?>

<div id="wrapper" class="container-xxl pt-3 flex-grow-1">
<!-- <div id="wrapper" class="container-fluid pt-3 flex-grow-1"> -->
  <?php echo get_partial('alerts'); ?>
  <div class="row">
    <?php include_slot('bcu-filter'); ?>
  </div>
  <div class="row">
    <div id="sidebar" class="col-md-3">
      <?php include_slot('sidebar'); ?>
    </div>
    <div id="main-column" role="main" class="col-md-9">
      <?php include_slot('title'); ?>
      <?php include_slot('before-content'); ?>
      <?php if (!include_slot('content')) { ?>
        <div id="content">
          <?php echo $sf_content; ?>
        </div>
      <?php } ?>
      <?php include_slot('after-content'); ?>
    </div>
  </div>

  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4 bcu">
    <?php include_slot('main-links'); ?>  
    <?php include_slot('main-nav'); ?>
  </div>
</div>

<?php echo get_partial('layout_end'); ?>
