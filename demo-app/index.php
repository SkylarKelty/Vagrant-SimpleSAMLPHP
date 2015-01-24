<?php
/**
 * Demo app with SAML auth
 */

require("/vagrant/SP/lib/_autoload.php");

$as = new SimpleSAML_Auth_Simple('default-sp');

if (isset($_GET['signin'])) {
	$as->requireAuth();
	if ($as->isAuthenticated()) {
		$saml_attributes = $as->getAttributes();
	}
}

if (isset($_GET['signout'])) {
	$as->logout("http://local.app:8080/");
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

		<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
		<link href="styles/css/page.css" rel="stylesheet">
	</head>

	<body>
		<div id="page" class="container">
			<?php if (!isset($saml_attributes)) { 
				print "<p><a href=\"?signin\" class=\"btn btn-lg btn-primary\">Sign in</a></p>";
			} else {
				$name = $saml_attributes['name'][0];
				print "<h3>Welcome {$name}!</h3>";
				print "<p><a href=\"?signout\" class=\"btn btn-lg btn-primary\">Sign out</a></p>";
			} ?>
		</div>
	</body>
</html>
