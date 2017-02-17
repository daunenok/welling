<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Bob's Auto Parts</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
	<a href="index.php">Back</a>
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h2>Orders</h2>
  		</div>
  		<div class="panel-body">
	  		<?php 
	  			$root = $_SERVER["DOCUMENT_ROOT"];
				$orders = file($root . "/orders.txt");
			?>
			<table class="table table-bordered table-hover">
				<thead>
					<tr style="background:#CFCCE5">
						<th>Order Date</th>
						<th>Tires</th>
						<th>Oil</th>
						<th>Spark Plugs</th>
						<th>Total</th>
						<th>Address</th>
					</tr>
				</thead>
				<tbody>
					<?php
					foreach ($orders as $order) {
						echo "<tr>";
						$arr = explode(" - ", $order);
						$parts = explode(", ", $arr[1]);
						unset($parts[3]);
						$parts[4] = substr($parts[4], 1);
						echo "<td>" . $arr[0] . "</td>";
						foreach ($parts as $part) {
							$part = (float)$part;
							echo "<td>" . $part . "</td>";
						}
						echo "<td>" . $arr[2] . "</td>";
						echo "</tr>";
					}
			  		?>
	  			</tbody>
	  		</table>
  		</div>
  	</div>
</div>
</body>
</html>