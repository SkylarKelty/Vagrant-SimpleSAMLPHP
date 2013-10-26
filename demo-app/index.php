<?php
/**
 * Demo app with SAML auth
 */

if (isset($_GET['signin'])) {
	require("/vagrant/SP/lib/_autoload.php");
	$as = new SimpleSAML_Auth_Simple('default-sp');
	$as->requireAuth();
	if ($as->isAuthenticated()) {
		$saml_attributes = $as->getAttributes();
	}
}

?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta name="description" content="">
		<meta name="author" content="">

		<title>SSO Sign In Demo</title>

		<link href="styles/css/bootstrap.css" rel="stylesheet">
		<link href="styles/css/signin.css" rel="stylesheet">
	</head>

	<body>
		<div class="container">
			<?php if (!isset($saml_attributes)) { ?>
			<form class="form-signin" method="GET" action="?">
				<input type="hidden" name="signin" value="" />
				<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
			</form>
			<?php } else {
				$name = $saml_attributes['name'][0];
				print "<p>Welcome {$name}!</p>";
			} ?>
		</div>
	</body>
</html>
