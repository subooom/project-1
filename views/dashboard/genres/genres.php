<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','genre');
		session()->set('current_sub_page','show');

		view()->load('dashboard/partials/header');
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#" class="current"><?php echo ucfirst(session()->get('current_sub_page')) ?></a> </div>
				<h1>List Of Genres</h1>
				<a href="<?php echo site_url('/dashboard/genres/create') ?>" class="btn btn-primary btn-sm pull-right"><i class="fa fa-plus"></i> Create New</a>
				</div>
				<div class="container-fluid">
					<div class="row-fluid">
						<div class="span12">

							<?php
								$genres = app()->genreModel()->findAll();
								if ($genres):
							?>
							<div class="widget-box">
								<div class="widget-content nopadding">
									<table class="table table-bordered table-striped">
										<thead>
											<tr>
											<th>#</th>
											<th>Name</th>
											<th>Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php foreach ($genres as $genre): ?>
												<tr class="even gradeX">
													<td><?php echo $genre->id ?></td>
													<td><?php echo $genre->name ?></td>
													<td>
														<a href="<?php echo site_url('/dashboard/genres/edit?id='.$genre->id) ?>" class="badge badge-primary"><i class="fa fa-edit"></i> Edit</a>
														<a href="<?php echo site_url('/dashboard/genres/delete?id='.$genre->id) ?>" class="badge badge-danger"><i class="fa fa-remove"></i> Delete</a>
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

