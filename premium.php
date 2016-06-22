<?php

require_once 'init.php';

if($user->premium){
	header('Location: index.php');
	exit();
}
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title></title>
	</head>
	<body>
		<p>Ir a Premium</p>
		<form action="/premium_charge.php" method="POST">
		<script
		src="https://checkout.stripe.com/checkout.js" class="stripe-button"
		data-key="<?php echo $stripe['publishable']; ?>"
		data-amount= "<?php echo $_SESSION['total'] ?>"
		data-name="Sitio Web"
		data-description="Premium"
		data-email="<?php echo $user->email; ?>"
		data-currency="mxn">
		</script>
		</form>
	</body>
</html>
