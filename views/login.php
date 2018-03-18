<?php
session()->set('current_page','login');

view()->load('partials/header');
?>

<!-- Main containter -->
<div id="main">
  <?php
    if (session()->has('user')) {
      echo '<h1><a href="logout">Click here to Logout</a></h1>';
    }
     // Parsing data from the login form
    if(isset($_POST['login'])){
      $user = app()->userModel()->findByCredentials($_POST['email'], $_POST['password']);

      if($user == User::NO_USER) {
        // user not found
      } elseif($user == User::PASSWORD_NO_MATCH) {
        // invalid password
      }

      if(is_array($user)) {
        session()->set('user', $user['id']);
        session()->set('name', $user['firstname'].' '.$user['lastname']);
        session()->set('isadmin', $user['isadmin']);

        redirect('index');
      }
    }
  ?>
  <?php
    if(!isset($_SESSION['user'])){
  ?>
  <form method="post" action="" class="alt" name="login">
    <?php
      if(isset($_POST['login'])){
        $email = $_POST['email'];
        if(!empty($database_mismatch)) echo '<label for="error">'.$database_mismatch.'</label>';
      }
    ?>
    <div class="row uniform">
        <div class="6u 12u$(xsmall)">
          <label for="email">Email Address</label>
          <input type="email" name="email" id="email" value="
            <?php
              if(isset($_POST['login']) && isset($_POST['email'])){
                echo $email;
              }
            ?>" placeholder="someone@something.com" required />
        </div>
        <div class="6u 12u$(xsmall)">
          <label for="password">Password</label>
          <input type="password" name="password" id="password" value="" placeholder="*********" required />
        </div>
        <div class="2u 12u$(xsmall)">
          <input type="submit" name="login" id="login" value="Login" class="special" />
          <a href=""><i>Forgot Password?</i></a>
        </div>
        <div class="3u 12u$(xsmall)">
          <input type="checkbox" id="demo-remember" name="remember-token" checked>
          <label for="demo-remember">Remember me</label>
        </div>
    </div>
  </form>
  <?php } ?>
</div>
<!-- End of main -->

<!-- Importing the footer.php -->
<?php view()->load('partials/footer');?>
