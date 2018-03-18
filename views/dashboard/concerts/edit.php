<?php
	if(session()->get('isadmin')==='1'){
		session()->set('current_page','concert');
		session()->set('current_sub_page','edit');

		view()->load('dashboard/partials/header');
?>

	<!--main-container-part-->
	<div id="content">
		<div id="content-header">
			<div id="breadcrumb"> <a href="/dashboard/concerts/concerts" title="Go to Home" class="tip-bottom"><i class="fa fa-home"></i> <?php echo ucfirst(session()->get('current_page')) ?></a> <a href="#"> <?php echo ucfirst(session()->get('current_sub_page')) ?></a></div>
			<h1>Edit <?php   ?></h1>
		</div>
		<?php
		    if (isset($_POST['update'])) {
		    	$concert = app()->concertModel()->find($_GET['id']);

		    	if(!$concert) return redirect('/dashboard/concerts/concerts');

		      	$concert->update($_POST, $_FILES['image']);


		      	redirect('/dashboard/concerts/concerts');
		    }

		    $genres = app()->genreModel()->findAll();
			$venues = app()->venueModel()->findAll();
		?>
		<div class="container-fluid"><hr>
			<div class="row-fluid">
				<div class="span12">
					<div class="widget-box">
						<div class="widget-title"> <span class="icon"> <i class="fa fa-edit"></i> </span>
						<h5>Concert #<?php echo $_GET['id']; ?></h5>
						</div>
						<?php
							$concert = app()->concertModel()->find($_GET['id']);

							if(!$concert) return redirect('/dashboard/concerts/concerts');
						?>
						<div class="widget-content nopadding">
							<form class="form-horizontal" method="post" enctype="multipart/form-data"  action="#" name="basic_validate" id="basic_validate" novalidate="novalidate">
								<div class="control-group">
									<label class="control-label">Title</label>
									<div class="controls">
										<input type="text" name="title" id="title" value="<?php echo $concert->title ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Description</label>
									<div class="controls">
										<textarea name="description" id="description" rows="4" cols="50"><?php
											echo htmlspecialchars($concert->description);
										?></textarea>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Image</label>
									<div class="controls">
										<img src="<?php echo $concert->imgURL() ?>">
										<input type="file" name="image" id="image">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Genre</label>
									<div class="controls">
										<select name="genre_id">
											<?php foreach ($genres as $genre): ?>
												<option value="<?php echo $genre->id?>" <?php
													echo $genre->id == $concert->genre_id ? ' selected' : ''
												?>><?php echo $genre->name ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Date</label>
									<div class="controls">
										<input type="date" name="date" id="date1" alt="date" class="IP_calendar" title="d/m/Y" value="<?php echo $concert->event_date ?>">
									</div>
								</div>
								<div class="control-group">
									<label class="control-label">Venue</label>
									<div class="controls">
										<select name="venue_id">
											<?php foreach ($venues as $venue): ?>
												<option value="<?php echo $venue->id?>" <?php
													echo $venue->id == $concert->venue_id ? ' selected' : ''
												?>><?php echo $venue->title ?></option>
											<?php endforeach; ?>
										</select>
									</div>
								</div>
					            <div class="control-group">
					              <label class="control-label">Pin this post?</label>
					              <div class="controls">
					                <label>
					                  <input type="radio" name="pinned" value="1" <?php echo ($concert->pinned==1) ? 'checked' : ''?>/>
					                  Pin</label>
					                  <label>
					                  <input type="radio" name="pinned" value="0" <?php echo ($concert->pinned==0) ? 'checked' : ''?>/>
					                  Unpin</label>
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
