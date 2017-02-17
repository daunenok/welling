<?php 
	$tires = htmlspecialchars($_POST["tires"]);
	$oil = htmlspecialchars($_POST["oil"]);
	$spark = htmlspecialchars($_POST["spark"]);
	$find = htmlspecialchars($_POST["find"]);
	$freight = htmlspecialchars($_POST["freight"]);
	$address = htmlspecialchars($_POST["address"]);

	define("TIRESPRICE", 20);
	define("OILPRICE", 5);
	define("SPARKPRICE", 10);
	define("TAX", 10);

	$items = $tires + $oil + $spark;
	$total = $tires * TIRESPRICE + $oil * OILPRICE + $spark * SPARKPRICE + $freight / 10;
	$totalTax = $total * (1 + TAX/100);

	switch ($find) {
		case 1:
			$findp = "You are our regular customer.";
			break; 
		case 2:
			$findp = "You found us by means of TV advertising.";
			break;
		case 3:
			$findp = "You found us by means of Phone directory.";
			break;
		case 4:
			$findp = "You found us by means of word of mouth.";
			break;
		default:
			$findp = "";
	}

	$date = date("H:i, jS F Y");
	$str = "$date - $tires tires, $oil oil, $spark spark plugs, $freight freight, $$totalTax - $address\n";
?>

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
<div class="results center-block well">
	<a href="index.php">Back</a>
	<h1 class="text-center">Auto Parts</h1>
	<h2 class="text-center">Order Results</h2>

	<?php 
		echo "<p class='text-center'>Order processed at " . $date . "</p>"; 
	?>

	<?php 
		if ($items == 0):
			echo "<p style='color:red;'>You didn't order anything!</p>";
			echo "<p><a href='index.php'>Back</a></p>";
		else:
	?>
	<h3>Your order:</h3>
	<p>
		<?php  
			echo "$tires tires <br>";
			echo "$oil bottles of oil <br>";
			echo "$spark spark plugs <br>";
			echo "$freight freight distance <br>";
		?>
	</p>

	<h3>Account:</h3>
	<p>
		Items ordered: <?php echo $items; ?><br>
		Total : $<?php echo number_format($total, 2); ?><br>
		Total with tax: $<?php echo number_format($totalTax, 2); ?>
	</p>
	<p class='text-center'><?php echo $findp; ?></p>
	<p class='text-center'>Your address: <?php echo $address; ?></p>

	<?php
			$root = $_SERVER["DOCUMENT_ROOT"];
			@$file = fopen($root . "/orders.txt", "a");
			if (!$file) {
				echo "<p style='color:red'>Your order could not processed now.</p>";
			} else {
				flock($file, LOCK_EX);
				fwrite($file, $str);
				flock($file, LOCK_UN);
				fclose($file);
			}
		endif; 
	?>
</div>
</body>
</html>
