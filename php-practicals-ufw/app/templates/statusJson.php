<html>
	<body>
		<br>
		<?php foreach ($allStatus as $statuses){
			for($i = 0; $i < count($statuses); $i++){
				echo json_decode($statuses)[$i];
			}
		      }
		?>
	</body>
</html>
