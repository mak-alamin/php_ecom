<?php require_once 'header-admin.php'; ?>

<?php require_once __DIR__ . '/partials/_navbar.php'; ?>

<?php require_once __DIR__ . '/partials/_sidebar.php'; ?>

<div class="d-flex">
  <div class="tab-content">
  <?php 
      require_once 'dashboard-content.php' ;
  ?>
  </div>
</div>


<?php require_once 'footer-admin.php'; ?>