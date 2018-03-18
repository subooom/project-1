<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','venue');
		session()->set('current_sub_page','show');

		view()->load('dashboard/partials/header');
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#" class="current"><?php echo ucfirst(session()->get('current_sub_page')) ?></a> </div>
				<h1>List Of Venues</h1>
				<a href="<?php echo site_url('/dashboard/venues/create') ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create New</a>
				</div>
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span12">

							<?php $venues = app()->venueModel()->findAll(); ?>

							<?php if (count($venues)): ?>
								<div class="widget-box">
									<div class="widget-content nopadding">
										<table class="table table-bordered table-striped">
											<thead>
												<tr>
													<th>#</th>
													<th>Title</th>
													<th>Description</th>
													<th>Distance</th>
													<th>Actions</th>
												</tr>
											</thead>
											<tbody>
												<?php foreach ($venues as $venue): ?>
													<tr class="even gradeX">
														<td><?php echo $venue->id ?></td>
														<td><?php echo $venue->title ?></td>
														<td><?php echo $venue->shortDesc() ?></td>
														<td><?php echo $venue->distance ?></td>
														<td>
															<a href="<?php echo site_url('/dashboard/venues/edit?id='. $venue->id)?>" class="badge badge-primary"><i class="fa fa-edit"></i> Edit</a>
															<a href="<?php echo site_url('/dashboard/venues/delete?id='. $venue->id)?>" class="badge badge-danger"><i class="fa fa-remove"></i> Delete</a>
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
		redirect('/login');
	}
	?>

