<?php 
$images = ["brakes.png", "headlight.png",
		   "spark.png", "tire.png",
		   "wheel.png", "wiper.png"];
shuffle($images);
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta http-equiv="Cache-Control" content="no-cache">
	<title>Bob's Auto Parts</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/styles.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="main">
	<h1>Bob's Auto Parts</h1>
	<a href="order.php">New Order</a>&nbsp;&nbsp;&nbsp;&nbsp;
	<a href="orders.php">All Orders</a>
	<div class="images">
		<?php 
		for ($i = 0; $i < 3; $i++) { 
			echo "<img src='images/" . $images[$i] . "'>";
		}
		?>
	</div>
	<div class="feedback">
		<h2>Customer Feedback</h2>
		<p>Please tell us what you think.</p>
		<form action="feedback.php" method="POST">
			<div class="form-group">
      			<label for="name" class="control-label">Your name:</label>
      			<div>
        			<input type="text" class="form-control" id="name" name="name">
      			</div>
      		</div>

      		<div class="form-group">
      			<label for="name" class="control-label">Your email address:</label>
      			<div>
        			<input type="email" class="form-control" id="email" name="email">
      			</div>
      		</div>

      		<div class="form-group">
      			<label for="comment" class="control-label">Your feedback</label>
      			<div>
        			<textarea class="form-control" rows="5" id="comment" name="comment"></textarea>
      			</div>
    		</div>

  			<div class="form-group">
  				<div>
    				<button type="submit">Send Feedback</button>
  				</div>
			</div>					
		</form>
	</div>
</div>
</body>
</html>
