<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','dashboard');

		view()->load('dashboard/partials/header');

		$home = app()->homeModel()->find();

		?>
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#" class="current"><?php echo ucfirst(session()->get('current_sub_page')) ?></a> </div>
				<h1 class="page-header">Home</h1>
				<div class="container-fluid"><hr>
					<div class="row-fluid">
						<div class="span12">
							<div class="widget-box">
								<div class="widget-title"> <span class="icon"> <i class="fa fa-info"></i> </span>
								<h5>Update Homepage</h5>
								</div>
								<div class="widget-content nopadding">
									<form class="form-horizontal" method="post" enctype="multipart/form-data"  action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
										<div class="control-group">
											<label class="control-label">Page Title</label>
											<div class="controls">
												<input type="text" name="title" id="title" value="<?php echo $home["title"] ?>" size="100%">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Page Description</label>
											<div class="controls">
												<textarea name="description" id="description" rows="4" cols="100%" ><?php echo $home["description"] ?>
												</textarea>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Background Image</label>
											<div class="controls">
												<input type="file" name="image" id="image">
												<img src="<?php echo public_dir("/images/" . $home['background_image']) ?>" width="250em">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label">Copyright Text</label>
											<div class="controls">
												<input type="text" name="copyright" value="<?php echo $home["copyright"] ?>" size="100%">
											</div>
				            </div>
										<div class="form-actions">
											<input type="submit" value="Update" class="btn btn-success" name="submit">
										</div>
									</form>
								</div>
							</div>
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
		redirect('../login');
	}
	?>

