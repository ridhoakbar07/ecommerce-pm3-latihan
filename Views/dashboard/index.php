<?php
if(!isset($_SESSION['role_user']) || $_SESSION['role_user'] !== 1) {
  echo "403 - Access Forbidden";
  exit;
}
?>

<?php include_once 'layouts/_header.php'; ?>
<!-- ini bagian toast notifikasi -->
<?php include 'layouts/_toast.php'; ?>
<div class="container-fluid z-0 min-vh-100">
  <div class="row">
    <?php include_once 'layouts/_sidebar.php'; ?>
    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <?php
      $pageMapping = [
        'produk' => 'components/produk/index.php',
        'kategori' => 'components/kategori/index.php',
        'user' => 'components/user/index.php'
      ];

      // Check if 'page' parameter is set and its value exists in the mapping array
      if(isset($page) && isset($pageMapping[$page])) {
        include_once $pageMapping[$page];
      } else {
        echo '
        <div
          class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Dashboard</h1>
        </div>
        <canvas class="my-4 w-100" id="myChart" width="900" height="380"></canvas>
        ';
      }
      ;
      ?>

    </main>
  </div>
</div>
<?php include 'layouts/_footer.php'; ?>

<!-- javascript untuk grafik -->
<script src="https://cdn.jsdelivr.net/npm/feather-icons@4.9.0/dist/feather.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@2.7.3/dist/Chart.min.js"></script>
<script src="../../assets/js/dashboard.js"></script>