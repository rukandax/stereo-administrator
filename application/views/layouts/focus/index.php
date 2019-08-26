<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title><?= $title ?></title>

  <?= link_tag("https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i") ?>
  <?= link_tag("/public/vendor/fontawesome-free/css/all.min.css") ?>
  <?= link_tag("/public/css/sb-admin-2.min.css") ?>
</head>
<body class="bg-gradient-primary">
  <div class="container">
    <?= $content ?>
  </div>

  <script src="<?= base_url('/public/vendor/jquery/jquery.min.js') ?>"></script>
  <script src="<?= base_url('/public/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
  <script src="<?= base_url('/public/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>
  <script src="<?= base_url('/public/js/sb-admin-2.min.js') ?>"></script>
</body>
</html>
