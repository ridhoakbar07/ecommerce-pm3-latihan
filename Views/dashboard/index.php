<?php include_once 'layouts/_header.php'; ?>
<!-- ini bagian toast notifikasi -->
<?php include 'layouts/_toast.php'; ?>
<div class="container-fluid z-0 min-vh-100">
  <div class="row">
    <?php include_once 'layouts/_sidebar.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div
        class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
      </div>

      <?php
      $pageMapping = [
        'produk' => 'components/produk/index.php',
        'kategori' => 'components/kategori/index.php',
        'user' => 'components/user/index.php'
      ];

      // Check if 'page' parameter is set and its value exists in the mapping array
      if (isset($_GET['page']) && isset($pageMapping[$_GET['page']])) {
        include_once $pageMapping[$_GET['page']];
      } else {
        echo '<canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>';
      }
      ;
      ?>

    </main>
  </div>
</div>
<?php include 'layouts/_footer.php'; ?>

<!-- javascript untuk grafik -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
  integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="/docs/4.3/assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.9.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="assets/js/dashboard.js"></script>