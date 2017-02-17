<?php 
	$name = htmlspecialchars($_POST["name"]);
	$email = htmlspecialchars($_POST["email"]);
	$check = true;
	if (!preg_match('/^[a-zA-Z0-9_\-\.]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/', $email)) $check = false;
	$comment = htmlspecialchars($_POST["comment"]);

	if ($check) {
		$address = "author@site.com";
		if (preg_match('/bigcustomer\.com/', $email)) {
			$address = "bob@example.com";
		} else {
			if (preg_match('/shop|retail/', $comment)) {
				$address = "retail@site.com";
			} elseif (preg_match('/deliver|fulfill/', $comment)) {
				$address = "fulfillment@site.com";
			} elseif (preg_match('/bill|account/', $comment)) {
				$address = "account@site.com";
			} 
		}


		$subject = "Feedback from site";
		$from = "From: website@site.com";
		$content = "Customer name: " . $name;
		$content .= "\nCustomer email: " . $email;
		$content .= "\nCustomer comment:\n" . $comment;

		mail($address, $subject, $content, $from);
	}
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
	<?php 
		if ($check):
	?>
	<h2>Feedback submitted.</h2>
	<p>Your feedback has been sent.</p>
	<p>
		<?php 
			echo nl2br($content);
		?>
	</p>
	<?php 
		else:
			echo "<p style='color:red'>Invalid email</p>";
		endif;
	?>
</div>
</body>
</html>
