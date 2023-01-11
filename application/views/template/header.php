<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <title><?= $config[0]['site_title'] ?></title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
  <meta name="robots" content="index, follow">
  <meta name="google-site-verification" content="" />
  <meta name="Description" content="<?= $config[0]['site_description'] ?>">
  <!--Facebook tags -->
  <meta property="og:locale" content="pt_BR" />
  <meta property="og:site_name" content="">
  <meta property="og:title" content="<?= $config[0]['site_title'] ?>">
  <meta property="og:description" content="<?= $config[0]['site_description'] ?>">
  <meta property="og:image" itemprop="image" content="<?= base_url().$config[0]['seo_img'] ?>">
  <meta property="og:type" content="website">

  <meta name="theme-color" content="<?= '#'.$config[0]['nav_color'] ?>">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <!--   <link rel="shortcut icon" href="<?= base_url("assets/images/icons/favicon.png"); ?>" type="image/x-icon">
  <link rel="icon" href="<?= base_url("assets/images/icons/favicon.png"); ?>" type="image/x-icon"> -->

  <!--     Fonts and icons     -->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
  <link href="<?= base_url("assets/plugins/fontawesome/css/all.min.css"); ?>" rel="stylesheet">
  <!-- Material Kit CSS -->
  <link href="<?= base_url('assets/css/material-kit.css?v=2.0.6'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/plugins/slick/slick/slick.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/plugins/slick/slick/slick-theme.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/plugins/WOW/css/libs/animate.css'); ?>" rel="stylesheet" />
  <link href="<?= base_url('assets/css/custom.css'); ?>" rel="stylesheet" />
  <script src="<?= base_url('assets/js/core/jquery.min.js'); ?>" type="text/javascript"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/2.0.2/anime.min.js"></script>

  <script>
    setTimeout(function() {
      var f = document.querySelectorAll('iframe')[0];
      f.src = $("#video_src").val();
    }, 2000);
  </script>

</head>

<body>