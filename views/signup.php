<?php
  session()->set('current_page', 'signup');
  
  view()->load('partials/header');
?>
<div id="main">
  <!-- Sign up form -->
  <h2 id="signup">Sign up</h2>
  <?php
    if (isset($_POST['register'])) {
      
      app()->userModel()->create($_POST);


      redirect('login');
    }
  ?>
  <form method="post" action="" class="alt" class="signup">
    <div class="row uniform">
      <div class="6u 12u$(xsmall)">
        <label for="firstname">First Name</label>
        <input type="text" name="firstname" id="first-name" value="" placeholder="John" />
      </div>
      <div class="6u$ 12u$(xsmall)">
        <?php
          if (!empty($error_message['firstname'])) {
        ?>
          <?php echo '<div class="alert pull-right">'.$error_message['firstname'].'</div>'; ?>
        <?php
          }
        ?>
      </div>
      <div class="6u$ 12u$(xsmall)">
        <label for="lastname">Last Name</label>
        <input type="text" name="lastname" id="last-name" value="" placeholder="Doe" />
      </div>
      <div class="6u$ 12u$(xsmall)">
        <label for="email">Email Address</label>
        <input type="email" name="email" id="demo-email" value="" placeholder="johndoe@something.com" />
      </div>
      <!-- Break -->
      <div class="6u$ 12u$(xsmall)">
        <label for="agerange">Age Range</label>
        <div class="select-wrapper">
          <select name="agerange" id="age-range">
            <option value="">-</option>
            <option value="0">0-19</option>
            <option value="1">19-39</option>
            <option value="2">39+</option>
          </select>
        </div>
      </div>
      <div class="6u$ 12u$(xsmall)">
        <label for="password">Password</label>
        <input type="password" name="password" placeholder="*********">
      </div>
      <div class="6u$ 12u$(xsmall)">
        <label for="confirm-password">Confirm Password</label>
        <input type="password" name="confirm-password" placeholder="*********">
      </div>
      <div class="6u$ 12u$(xsmall)">
          <input type="checkbox" id="demo-terms" name="terms" >
          <label for="demo-terms">I agree to the terms and conditions.</label>
      </div>
      <!-- Break -->
      <div class="12u$">
        <ul class="actions">
          <li><input type="submit" name="register" value="Register" class="special" /></li>
          <li><input type="reset" value="Reset" /></li>
        </ul>
      </div>
    </div>
  </form>
</div>
<?php view()->load('partials/footer');?>
