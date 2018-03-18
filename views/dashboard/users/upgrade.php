<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','dashboard');

		view()->load('dashboard/partials/header');
		?>

		<?php 
			$user_id_to_upgrade = $_GET['id'];

			$user = app()->userModel()->find($user_id_to_upgrade);

			if(!$user) {
				// user not found by supplied id -> redirect

				return redirect('/dashboard');
			}



			if(isset($_POST['adminate'])){
				$user->toggleAdmin();

				return redirect('/dashboard');
			
			}
		?>
		<!--main-container-part-->
		<div id="content">
			<div id="content-header">
				<div id="breadcrumb"> <a href="/dashboard/genres" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#"> <?php echo ucfirst(session()->get('current_sub_page')) ?></a></div>
				<h1>Are you sure you want to
					<?php
						echo ( !$user->isAdmin()
							? ' give admin privleges to '
							:' take admin privleges from '
						) .$user->firstname.' '.$user->lastname . ' ?';
					?>		
				</h1>
			</div>
			<form method="POST">				
				<div class="form-actions">
					<input type="submit" value="Yes" class="btn btn-primary" name="adminate">
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

