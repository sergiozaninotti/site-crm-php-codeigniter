<?php
    if ($this->session->userdata("user_id")) { // verifica se existe alguma sessão iniciada pelo login e redireciona
      $data = array(
        "user_id" => $this->session->userdata("user_id") // pega o id da sessão do usuário
      );
    }
  ?>
  
  <!DOCTYPE html>
  <html lang="en">

  <head>
    <title><?= $title; ?></title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />

    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- Material Dashboard CSS -->
    <link rel="stylesheet" href="<?= base_url("assets/dashboard/css/material-dashboard.css"); ?>">
    <link href="<?= base_url("assets/dashboard/css/custom.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("assets/dashboard/css/animations.css"); ?>" rel="stylesheet">

    <link href="<?= base_url("assets/plugins/fontawesome/css/all.min.css"); ?>" rel="stylesheet">

    <link href="<?= base_url("assets/dashboard/plugins/datepicker/dist/css/datepicker.min.css"); ?>" rel="stylesheet">

    <link href="<?= base_url("assets/dashboard/plugins/fullcalendar/packages/core/main.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("assets/dashboard/plugins/fullcalendar/packages/daygrid/main.css"); ?>" rel="stylesheet">
    <link href="<?= base_url("assets/dashboard/plugins/fullcalendar/packages/list/main.css"); ?>" rel="stylesheet">

  </head>