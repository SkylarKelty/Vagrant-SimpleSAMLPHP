<?php 
	if (!isset($this->data['autofocus'])) {
		$this->data['autofocus'] = 'username';
	}
	$this->includeAtTemplateBase('includes/header.php'); 
?>

<form action="?" method="post" name="f" class="form-signin">
	<h2 class="form-signin-heading">Please sign in</h2>
	
	<?php
	foreach ($this->data['stateparams'] as $name => $value) {
		echo('<input type="hidden" name="' . htmlspecialchars($name) . '" value="' . htmlspecialchars($value) . '" />');
	}
	?>

	<input type="text" id="username" name="username" class="form-control" placeholder="Username"<?php if (isset($this->data['username'])) {echo ' value="'.htmlspecialchars($this->data['username']).'"';} ?> autofocus>


	<input type="password" id="password" name="password" class="form-control" placeholder="Password">

	<button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
</form>

<?php $this->includeAtTemplateBase('includes/footer.php'); ?>