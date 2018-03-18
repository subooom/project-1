<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','genre');
		session()->set('current_sub_page','create');

		view()->load('dashboard/partials/header');
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="/dashboard/genres/genres" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#"> <?php echo ucfirst(session()->get('current_sub_page')) ?></a></div>
				<h1>Add a Genre</h1>
			</div>
			<?php
			    if (isset($_POST['submit'])) {

			      app()->genreModel()->create($_POST);


			      redirect('/dashboard/genres/genres');
			    }
			?>
			<div class="container-fluid"><hr>
				<div class="row-fluid">
					<div class="span12">
						<div class="widget-box">
							<div class="widget-title"> <span class="icon"> <i class="fa fa-info"></i> </span>
							<h5>Insert the data</h5>
							</div>
							<div class="widget-content nopadding">
								<form class="form-horizontal" method="post" enctype="multipart/form-data"  action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
									<div class="control-group">
										<label class="control-label">Genre name</label>
										<div class="controls">
											<input type="text" name="name" id="name">
										</div>
									</div>
									<div class="form-actions">
										<input type="submit" value="Create" class="btn btn-success" name="submit">
									</div>
								</form>
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

