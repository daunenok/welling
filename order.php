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
<div class="order">
	<a href="index.php">Back</a>
	<div class="panel panel-default">
  		<div class="panel-heading">
    		<h2>Order</h2>
  		</div>
  		<div class="panel-body">
   			<form action="processorder.php" method="POST">
				<table class="table table-striped table-hover">
					<thead>
						<tr>
							<th>Item</th>
							<th>Quantity</th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>Tires</td>
							<td>
								<input type="number" name="tires">
							</td>
						</tr>
						<tr>
							<td>Oil</td>
							<td>
								<input type="number" name="oil">
							</td>
						</tr>
						<tr>
							<td>Spark Plugs</td>
							<td>
								<input type="number" name="spark">
							</td>
						</tr>
						<tr>
							<td>
								Freight Distance
								<table style="width:150px;margin-top:10px">
									<tr>
										<th>Distance</th>
										<th>Cost</th>
									</tr>
									<?php 
										for ($i = 50; $i <= 250; $i+=50) { 
											echo "<tr>";
											echo "<td>" . $i . "</td>";
											echo "<td>" . $i/10 . "</td>";
											echo "</tr>";
										}
									?>
								</table>
							</td>
							<td>
								<input type="number" name="freight">
							</td>
						</tr>
						<tr>
							<td>Your Address</td>
							<td>
								<input type="text" name="address">
							</td>
						</tr>
						<tr>
							<td>How did you find us?</td>
							<td>
								<select name="find">
									<option value="1" selected>I'm a regular customer</option>
									<option value="2">TV advertising</option>
									<option value="3">Phone directory</option>
									<option value="4">Word of mouth</option>
								</select>
							</td>
						</tr>
						<tr>
							<td colspan="2" class="text-center">
								<input type="submit" value="Submit Order">
							</td>
						</tr>
					</tbody>
				</table>
			</form>
  		</div>
	</div>
</div>
</body>
</html>