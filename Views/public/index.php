<!DOCTYPE html>
<html lang="en" data-bs-theme="auto">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="Selamat Datang di laman ecommerce kami">
  <meta name="author" content="Ridho Akbar">
  <meta name="generator" content="Ridho Akbar">
  <meta name="theme-color" content="#712cf9">
  <title>e-Commerce</title>
  <link rel="icon" type="image/png" href="/assets/images/logo/bootstrap-logo.svg">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
  <link rel="stylesheet" href="/assets/css/app.css" />

</head>

<body>
  <?php include 'layouts/_header.php'; ?>

  <!-- ini bagian toast notifikasi -->
  <?php include 'layouts/_toast.php'; ?>

  <main class="py-3">
    <div class="container z-0">
      <div class="row">
        <?php
        $pageMapping = [
          'login' => 'components/login.php',
          'register' => 'components/register.php',
          'content' => 'components/content.php',
          'kategori' => 'components/kategori.php',
          'user' => 'components/user.php',
          '403' => '403.php',
        ];

        //cek apakah pada saat memanggil view pada route terdapat variabel 'page' tipe array
        if (isset($page) && isset($pageMapping[$page])) {
          include_once $pageMapping[$page];
        } else {
          include_once '404.php';
        }
        ?>
      </div>
    </div>
  </main>

  <?php include 'layouts/_footer.php'; ?>

  <script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
  <script>
    document.addEventListener('DOMContentLoaded', function () {
      var toastElement = document.querySelector('.toast');

      if (toastElement !== null) {
        var myToast = new bootstrap.Toast(toastElement);
        myToast.show();
      }
    });
  </script>
</body>

</html>