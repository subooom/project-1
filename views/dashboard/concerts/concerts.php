<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','concert');
		session()->set('current_sub_page','show');

		view()->load('dashboard/partials/header');
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#" class="current"><?php echo ucfirst(session()->get('current_sub_page')) ?></a> </div>
				<h1>List Of Concerts</h1>
				<a href="<?php echo site_url('/dashboard/concerts/create') ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create New</a>
				</div>
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span12">

							<?php
								$concerts = app()->concertModel()->findAll();
								if ($concerts):
							?>
							<div class="widget-box">
								<div class="widget-content nopadding">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
											<th>#</th>
											<th>Title</th>
											<th>Description</th>
											<th>Image</th>
											<th>Genre</th>
											<th>Date</th>
											<th>Venue</th>
											<th>Created</th>
											<th>Updated</th>
											<th>Pinned</th>
											<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($concerts as $concert): ?>
												<tr class="even gradeX">
													<td class="text-center"><?php echo $concert->id ?></td>
													<td class="text-center"><?php echo $concert->title ?></td>
													<td class="text-center"><?php echo $concert->shortDesc() ?></td>
													<td id="eye-icon" class="text-center"><span class="badge badge-primary eye-icon-text" style="font-size: 0.9em">Hover to <i class="fa fa-eye"></i></span>
														<img src="<?php echo $concert->imgURL() ?>" alt="NA" style="height:10em"></td>
													<td class="text-center"><?php echo $concert->genre_id ?></td>
													<td class="text-center"><?php echo $concert->event_date ?></td>
													<td class="text-center"><?php echo $concert->venue_id ?></td>
													<td class="text-center"><?php echo $concert->created_at ?></td>
													<td class="text-center"><?php echo $concert->updated_at ?></td>
													<td class="text-center"><?php echo ($concert->pinned === 1) ? 'Yes' : 'No' ?></td>
													<td class="text-center">
														<a href="<?php echo site_url('/dashboard/concerts/edit?id='.$concert->id) ?>" class="badge badge-info"><i class="fa fa-edit"></i> Edit</a>
														<br>
														<a href="<?php echo site_url('/dashboard/concerts/delete?id='.$concert->id) ?>" class="badge badge-danger"><i class="fa fa-remove"></i> Delete</a>
													</td>
												</tr>
											<?php endforeach; ?></a>
										</tbody>
									</table>
								</div>
							</div>
							<?php else: ?>
								<div class="widget-content nopadding">
								<hr>No Items Available
								</div>
							<?php endif ?>
						</div>
					</div>

				</div>
			</div>
		</div>
		<!--end-main-container-part-->

		<?php
		view()->load("dashboard/partials/footer");
	}//end if
	else{
		redirect('../../login');
	}
	?>

