
          <div id="copyright">
            <ul><li>&copy; Copyright</li><li> <a href="https://github.com/subooom">Paradox Inc.</a></li></ul>
          </div>
          <!-- <style type="text/css">
            #wrapper > .bg {
              background-image: url("../../public/images/overlay.png"), linear-gradient(0deg, rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url("../../public/images/bg.jpg");
            }
          </style> -->
      </div>

      <script src="<?php echo assets('/js/jquery.min.js')?>"></script>
      <script src="<?php echo assets('/js/js.cookie.min.js')?>"></script>
      <script src="<?php echo assets('/js/jquery.scrollex.min.js')?>"></script>
      <script src="<?php echo assets('/js/jquery.scrolly.min.js')?>"></script>
      <script src="<?php echo assets('/js/skel.min.js')?>"></script>
      <script src="<?php echo assets('/js/util.js')?>"></script>
      <script src="<?php echo assets('/js/main.js')?>"></script>

      <script type="text/javascript">
        var FAV_LINKS = $('.fav');
        var me = <?php echo session()->get('user'); ?>;
        var counter = 0;
        function toggleFavorite($element) {
          if(counter%2 == 0){
            document.querySelector('.actions li a span').innerHTML = '<i class="fa fa-heart"></i> Added to Favourites';
            counter++;
          }
          else{
            document.querySelector('.actions li a span').innerHTML = '<i class="fa fa-heart-o"></i> Add to Favourites';
            counter++;
          }
        }

        FAV_LINKS.on('click', function(e) {
          e.preventDefault();

          var favourites = Cookies.get('favourites');
          console.log($(this).data('class'));
          var currentlyClickedID = $(this).data('class');

          if(!favourites) {
            favourites = {};
          } else {
            favourites = JSON.parse(favourites);
          }

          var myfavourites = favourites[me] || [];
          var index = myfavourites.indexOf(currentlyClickedID);

          if(index == -1) {
            // add if not exists
            myfavourites.push(currentlyClickedID);
          } else {
            // remove if exists
            myfavourites.splice(index, 1);
          }

          toggleFavorite($(this));

          favourites[me] = myfavourites;

          Cookies.set('favourites', JSON.stringify(favourites), { expires: 30 });
        });

        $(document).ready(function() {
          var favourites = Cookies.get('favourites');

          if(!favourites) return;

          favourites = JSON.parse(favourites);

          if(!favourites[me]) return;

          myfavourites = favourites[me];


          for (var i = myfavourites.length - 1; i >= 0; i--) {
            var link = $('[data-id='+ myfavourites[i] +']');
            toggleFavorite(link);
          }
        });
      </script>
  </body>
</html>
