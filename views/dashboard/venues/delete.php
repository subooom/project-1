<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','venue');
		session()->set('current_sub_page','delete');

		view()->load('dashboard/partials/header');
		?>
		<?php
			if(isset($_POST['delete'])){
				app()->venueModel()->delete($_GET['id']);

				redirect('/dashboard/venues/venues');
			}
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="/dashboard/venues/venues" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#"> <?php echo ucfirst(session()->get('current_sub_page')) ?></a></div>
				<h1>Are you sure you want to delete this venue?</h1>
			</div>
			<form method="POST">
				<div class="form-actions">
					<input type="submit" value="Yes" class="btn btn-primary" name="delete">
					<a href="<?php echo site_url('/dashboard/venues/venues') ?>">Go Back!</a>
				</div>
			</form>
		</div>
		<?php
		view()->load("dashboard/partials/footer");
	}//end if
	else{
		redirect('../../login');
	}
	?>
