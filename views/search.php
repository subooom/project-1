<?php
  session()->set('current_page','search');
  view()->load('partials/header');
 ?>
	<div id="main">
		<?php 
			$concerts = app()->concertModel()->search($_GET['query']);

			if(count($concerts)):
		?>

			<section class="posts">
				<?php foreach ($concerts as $count => $concert): ?>

					<?php if ($count%2==1): ?>
						<article>
							<header>
								<span class="date"><?php echo $concert->event_date; ?></span>
								<h2><a href="#"><?php echo $concert->title; ?></a></h2>
							</header>
							<a href="#" class="image main"><img src="<?php echo $concert->imgURL(); ?>" alt="" /></a>			
							<p><?php echo $concert->description; ?></p>
							<ul class="actions">
								<li><a href="#" class="button">Full Story</a></li>
								<?php if(session()->get('user') !== null): ?><li><a href="#" data-id="<?php echo $concert->id ?>" class="button fav"><i class="fa fa-heart-o"></i> Add to Favourites</a></li><?php endif; ?>
							</ul>
						</article>
					<?php else: ?>
						<article>
							<header>
								<span class="date"><?php echo $concert->event_date; ?></span>
								<h2><a href="#"><?php echo $concert->title; ?></a></h2>
							</header>
							<a href="#" class="image main"><img src="<?php echo $concert->imgURL(); ?>" alt="" /></a>			
							<p><?php echo $concert->description; ?></p>
							<ul class="actions">
								<li><a href="#" class="button">Full Story</a></li>
								<?php if(session()->get('user') !== null): ?><li><a href="#" data-id="<?php echo $concert->id ?>" class="button fav"><i class="fa fa-heart-o"></i> Add to Favourites</a></li><?php endif; ?>
							</ul>
						</article>
					<?php endif; ?>
				<?php endforeach; ?>
			</section>

		<?php else: ?>
			<h3>No items found for query string	<strong><?php echo $_GET['query'] ?></strong>.</h3>
		<?php endif; ?>
	</div>
<?php view()->load('partials/footer') ?>
