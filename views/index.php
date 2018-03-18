
<?php
	session()->set('current_page','home');
	view()->load("partials/header");
?>

<!-- Main -->
<div id="main">
		<?php

			$concerts = app()->concertModel()->findAll("ORDER BY created_at DESC");

			$pinned = app()->concertModel()->findAll("WHERE pinned = 1 ORDER BY created_at DESC");

		?>
				<!-- Featured Post -->
					<article class="post featured">
						<header class="major">
							<span class="date"><?php echo $pinned[0]->event_date; ?></span>
							<h2><a href="#"><?php echo $pinned[0]->shortDesc() ?>...</a></h2>
							<p><?php echo $pinned[0]->description; ?></p>
						</header>
						<a href="" class="image main"><img src="<?php echo $pinned[0]->imgURL(); ?>" alt="Image NA" /></a>
						<ul class="actions">
							<li><a href="#" class="button big"><i class="fa fa-external-link"></i> Full Story</a></li>
							<li><a href="#" class="button big"><i class="fa fa-credit-card"></i> Purchase Tickets</a></li>
							<?php if(session()->get('user') !== null): ?>
								<li>
									<a href="#" class="button big fav" data-id="<?php echo $pinned[0]->id ?>">
										<span></span>
									</a>
								</li>
							<?php endif; ?>
						</ul>
					</article>


					<section class="posts">
						<?php

							$count = 1;

							foreach ($concerts as $concert):

								$count++;

								if ($count%2==1):
						?>
									<article>
										<header>
											<span class="date"><?php echo $concert->event_date ?></span>
											<h2><a href="#"><?php echo $concert->title; ?></a></h2>
										</header>
										<a href="#" class="image main"><img src="<?php echo $concert->imgURL() ?>" alt="Image NA" style="height: 315px;" /></a>
										<p><?php echo $concert->shortDesc() ?>...</p>
										<ul class="actions">
											<li><a href="#" class="button"><i class="fa fa-external-link"></i> Full Story</a></li>
											<li><a href="#" class="button"><i class="fa fa-credit-card"></i> Purchase Tickets</a></li>
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
											<h2><a href="#"><?php echo $concert->title ?></a></h2>
										</header>
										<a href="#" class="image main"><img src="<?php echo $concert->imgURL(); ?>" alt="" style="height: 315px;" /></a>
										<p><?php echo $concert->shortDesc() ?>...</p>
										<ul class="actions">
											<li><a href="#" class="button"><i class="fa fa-external-link"></i> Full Story</a></li>
											<li><a href="#" class="button"><i class="fa fa-credit-card"></i> Purchase Tickets</a></li>
											<?php if(session()->get('user') !== null): ?>
												<li>
													<a href="#" data-id="<?php echo $concert->id ?>" class="button fav">
														<span></span>
													</a>
												</li><?php endif; ?>
										</ul>
									</article>
								<?php endif; ?>
					<?php 	endforeach; ?>
					</section>

</div>

<?php
	view()->load("partials/footer");
?>
