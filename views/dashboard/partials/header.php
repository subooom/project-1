<!DOCTYPE html>
<html lang="en">
<head>
<title>Paradox Admin | <?php echo ucfirst(session()->get('current_page')); ?></title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="<?php echo assets('/dashboard/css/bootstrap.min.css') ?>" />
<link rel="stylesheet" href="<?php echo assets('/dashboard/css/bootstrap-responsive.min.css') ?>" />
<link rel="stylesheet" href="<?php echo assets('/dashboard/css/fullcalendar.css') ?>" />
<link rel="stylesheet" href="<?php echo assets('/dashboard/css/matrix-style.css') ?>" />
<link rel="stylesheet" href="<?php echo assets('/dashboard/css/matrix-media.css') ?>" />
<link rel="shortcut icon" type="image/x-icon" href="images/title.png" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="<?php echo assets('/dashboard/css/jquery.gritter.css') ?>" />
<link rel="stylesheet" href="<?php echo assets('/dashboard/css/style.css') ?>" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
</head>
<body>
  <nav class="navbar navbar-expand navbar-dark bg-dark" style="margin-top: 10px;">
    <a class="navbar-brand" href="<?php echo site_url('/dashboard')?>"><img src="<?php echo assets('/dashboard/img/logo.png'); ?>" alt="Paradox Admin" /></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExample02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Welcome, <?php echo session()->get('name'); ?>
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a href="<?php echo site_url('/logout')?>" class="badge"><i class="fa fa-key"></i> Log Out</a>
          </div>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo site_url('/')?>">Return to main site</a>
        </li>
      </ul>
    </div>
  </nav>
  <!--close-top-Header-menu-->
  <!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="fa fa-home"></i> Dashboard</a>
  <ul>
    <li class="<?php echo (session()->get('current_page') == 'dashboard') ? 'active' : '' ?>"><a href="<?php echo site_url('/dashboard')?>"><i class="fa fa-users"></i> <span>Home</span></a> </li>
    <li class="<?php echo (session()->get('current_page') == 'admins') ? 'active' : '' ?>"><a href="<?php echo site_url('/dashboard/users/admins')?>"><i class="fa fa-users"></i> <span>Admins</span></a> </li>
    <li class="<?php echo (session()->get('current_page') == 'users') ? 'active' : '' ?>"><a href="<?php echo site_url('/dashboard/users/users')?>"><i class="fa fa-users"></i> <span>Users</span></a> </li>
    <li class="<?php echo (session()->get('current_page') == 'concert') ? 'active' : '' ?>" > <a href="<?php echo site_url('/dashboard/concerts/concerts')?>"><i class="fa fa-bolt"></i> <span>Events</span></a> </li>
    <li class="<?php echo (session()->get('current_page') == 'venue') ? 'active' : '' ?>"> <a href="<?php echo site_url('/dashboard/venues/venues')?>"><i class="fa fa-flag"></i> <span>Venues</span></a> </li>
    <li class="<?php echo (session()->get('current_page') == 'genre') ? 'active' : '' ?>"> <a href="<?php echo site_url('/dashboard/genres/genres')?>"><i class="fa fa-tags"></i> <span>Genres</span></a> </li>
  </ul>
</div>
<!--sidebar-menu-->
