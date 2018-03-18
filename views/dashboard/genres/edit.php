<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','genre');
		session()->set('current_sub_page','edit');

		view()->load('dashboard/partials/header');
?>

	<!--main-container-part-->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="/dashboard/genres/genres" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#"> <?php echo ucfirst(session()->get('current_sub_page')) ?></a></div>
			<h1>Edit</h1>
		</div>
		<?php
		    if (isset($_POST['update'])) {
		    	$genre = app()->genreModel()->find($_GET['id']);

		    	if(!$genre) return redirect('/dashboard/genres/genres');

		    	$genre->update($_POST);

		      	redirect('/dashboard/genres/genres');
		    }
		?>
		<div class="container-fluid"><hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="fa fa-edit"></i> </span>
						<h5>Genre #<?php echo $_GET['id'];
						 					?>
						 </h5>
						</div>
						<?php
							$genre = app()->genreModel()->find($_GET['id']);

							if(!$genre) return redirect('/dashboard/genres');
						?>
						<div class="widget-content nopadding">
							<form class="form-horizontal" method="post" name="basic_validate" id="basic_validate" novalidate="novalidate">
								<div class="control-group">
									<label class="control-label">Title</label>
									<div class="controls">
										<input type="text" name="name" id="name" value="<?php echo $genre->name ?>">
									</div>
								</div>
								<div class="form-actions">
									<input type="submit" value="Update" class="btn btn-success btn-sm" name="update">
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
