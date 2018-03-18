<?php
	session()->set('current_page','venues');
	view()->load('partials/header');

	$venues = app()->venueModel()->findAll();

?>
<div id="main">
      <h1>List Of Venues</h1>
      <table>
      	<tr>
      		<th>ID</th>
      		<th>Name</th>
      		<th>Description</th>
      		<th>Distance</th>
      	</tr>

      	<?php foreach ($venues as $venue) {
      		echo "<tr>";
				echo "<td>".$venue->id."</td>";      	
				echo "<td>".$venue->title."</td>";      	
				echo "<td>".$venue->description."</td>";      	
				echo "<td>".$venue->distance."</td>";  
			echo "</tr>"; 	
      	} ?>
      </table>
</div>

<?php view()->load('partials/footer')?>
