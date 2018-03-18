<?php
  session()->set('current_page','favourites');
  view()->load('partials/header');
 ?>
<div id="main">
	<h1>List Of Your Favourites</h1>
	<?php
		$cookie = app()->cookie();

		$favourites = $cookie->get('favourites');
		$me = session()->get('user');

		$favourites = @json_decode($favourites, true);

		if(is_array($favourites) && array_key_exists($me, $favourites) && !empty($favourites[$me])):
			$concerts = app()->concertModel()->favourites($favourites[$me]);
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
							<?php if(session()->get('user') !== null): ?>
								<li>
									<a href="#" data-id="<?php echo $concert->id ?>" class="button fav">
										<span></span>
									</a>
								</li>
							<?php endif; ?>
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
							<?php if(session()->get('user') !== null): ?>
								<li>
									<a href="#" data-id="<?php echo $concert->id ?>" class="button fav">
										<span></span>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</article>
				<?php endif; ?>
			<?php endforeach; ?>
		</section>
	<?php else: ?>

		<h3>No Favourites Yet!</h3>

	<?php endif; ?>
</div>
<?php view()->load('partials/footer') ?>
