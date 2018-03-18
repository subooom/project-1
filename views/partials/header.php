<?php require_once('bootstrap.php') ?>

<!DOCTYPE HTML>
<!--
  Massively by HTML5 UP
  html5up.net | @ajlkn
  Free for personal and commercial use under the CCA 3.0 license (html5up.net/license)
-->
<html>
  <head>
    <title>Paradox City Inc. | <?php echo ucfirst(session()->get('current_page')); ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link rel="stylesheet" href="<?php echo assets('/css/main.css') ?>" />
    <link rel="stylesheet" href="<?php echo assets('/css/font-awesome.css') ?>" />
    <link rel="shortcut icon" type="image/x-icon" href="images/title.png" />
    <noscript><link rel="stylesheet" href="<?php echo assets('/css/noscript.css') ?>" /></noscript>
    <link rel="stylesheet" href="<?php echo assets('/css/style.css') ?>" />
  </head>
  <body class="is-loading">

    <!-- Wrapper -->
      <div id="wrapper" class="fade-in">
        <!-- Intro -->

        <?php if((session()->get('current_page') == 'home')):

            // Input from search feild parsed into search function of concert class

          ?>

          <div id="intro">
            <h1>This is<br />
            Paradox City Inc.</h1>
            <p>We organize concerts in different venues.</p>

            <?php if(!session()->has('user')): ?>

              <p><a href="<?php echo site_url('login'); ?>"><button>Login</button></a> OR <a href="<?php echo site_url('signup')?>"><button>Sign Up</button></a><br /></p>

            <?php else: ?>

              <p><i class="fa fa-tick"></i>Logged in<?php echo (session()->get('isadmin') == 1) ? ' as an <b style="color:#e23939">administrator</b>':'' ?>. Click the arrow below to continue or just begin searching for contents right way.</p>

            <?php endif; ?>

            <form method="GET" action="<?php echo site_url('/search')?>" style="display: inline-block;">
              <input type="text" name="query" style="width: auto;" placeholder="Concerts">
              <input type="submit" value="Search">
            </form>
            <ul class="actions">
              <li><a href="#header" class="button icon solo fa-arrow-down scrolly">Continue</a></li>
            </ul>
          </div>
        <?php endif;  ?>

        <!-- Header -->
          <header id="header">
            <a href="<?php echo site_url('/')?>" class="logo">Paradox City Inc.</a>
          </header>
        <!-- Nav -->
          <nav id="nav">
            <ul class="links">
              <li class="<?php echo (session()->get('current_page') == 'home') ? 'active' : '' ?>"><a href="<?php echo site_url('/')?>">What's on</a></li>
              <?php if (session()->has('user')): ?>
                 <li class="<?php echo (session()->get('current_page') == 'favourites') ? 'active' : '' ?>"><a href="<?php echo site_url('favourites')?>">Favourites</a></li>
              <?php endif ?>

              <li class="<?php echo (session()->get('current_page') == 'gallery') ? 'active' : '' ?>"><a href="<?php echo site_url('gallery')?>">Gallery</a></li>
              <li class="<?php echo (session()->get('current_page') == 'login') ? 'active' : '' ?>"><a href="<?php echo site_url('login')?>">
                <?php echo session()->has('user') ? 'Logout' : 'Login';?>
              </a></li>
              <?php if (!session()->has('user')): ?>
                <li class="<?php echo (session()->get('current_page') == 'signup') ? 'active' : '' ?>"><a href="<?php echo site_url('signup')?>">Sign Up</a></li>
              <?php endif ?>
            </ul>

            <?php if(session()->get('isadmin') == 1): ?>
              <p><a class="button" id="admin-login" href="<?php echo site_url('dashboard')?>">Admin Dashboard</a></p>
            <?php endif ?>
          </nav>

