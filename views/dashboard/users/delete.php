<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','user');
		session()->set('current_sub_page','delete');

		view()->load('dashboard/partials/header');
		?>
		<?php
			if(isset($_POST['delete'])){
				app()->userModel()->delete($_GET['id']);

				redirect('/dashboard');
			}
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="/dashboard" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#"> <?php echo ucfirst(session()->get('current_sub_page')) ?></a></div>
				<h1>Are you sure you want to delete this user?</h1>
			</div>
			<form method="POST">
				<div class="form-actions">
					<input type="submit" value="Yes" class="btn btn-primary" name="delete">
					<a href="<?php echo site_url('/dashboard') ?>">Go Back!</a>
				</div>
			</form>
		</div>
		<?php
		view()->load("dashboard/partials/footer");
	}//end if
	else{
		redirect('/login');
	}
	?>
