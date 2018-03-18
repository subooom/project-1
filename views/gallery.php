<?php
  session()->set('current_page','gallery');
  view()->load("partials/header");
?>
<div id="main">
  <h2>Image</h2>

  <h3>Fit</h3>
  <span class="image fit"><img src="../images/pic01.jpg" alt="" /></span>
  <div class="box alt">
    <div class="row 50% uniform">
      <div class="4u"><span class="image fit"><img src="../images/pic02.jpg" alt="" /></span></div>
      <div class="4u"><span class="image fit"><img src="../images/pic03.jpg" alt="" /></span></div>
      <div class="4u$"><span class="image fit"><img src="../images/pic04.jpg" alt="" /></span></div>
      <!-- Break -->
      <div class="4u"><span class="image fit"><img src="../images/pic04.jpg" alt="" /></span></div>
      <div class="4u"><span class="image fit"><img src="../images/pic02.jpg" alt="" /></span></div>
      <div class="4u$"><span class="image fit"><img src="../images/pic03.jpg" alt="" /></span></div>
      <!-- Break -->
      <div class="4u"><span class="image fit"><img src="../images/pic03.jpg" alt="" /></span></div>
      <div class="4u"><span class="image fit"><img src="../images/pic04.jpg" alt="" /></span></div>
      <div class="4u$"><span class="image fit"><img src="../images/pic02.jpg" alt="" /></span></div>
    </div>
  </div>

</div>

<?php
  view()->load("partials/footer");
?>
