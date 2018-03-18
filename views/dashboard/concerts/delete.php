<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','concert');
		session()->set('current_sub_page','delete');

		view()->load('dashboard/partials/header');
		?>
		<?php
			if(isset($_POST['delete'])){
				app()->concertModel()->delete($_GET['id']);

				redirect('/dashboard/concerts/concerts');
			}
			if(isset($_POST['dont'])){
				redirect('/dashboard/concerts/concerts');
			}
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="/dashboard/concerts/concerts" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#"> <?php echo ucfirst(session()->get('current_sub_page')) ?></a></div>
				<h1>Are you sure you want to delete this Concert Event?</h1>
			</div>
			<form method="POST">
				<div class="form-actions">
					<input type="submit" value="Yes" class="btn btn-primary" name="delete">
					<input type="submit" value="No" class="btn btn-danger" name="dont">
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
