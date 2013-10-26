<?php



/**
 * Support the htmlinject hook, which allows modules to change header, pre and post body on all pages.
 */
$this->data['htmlinject'] = array(
  'htmlContentPre' => array(),
  'htmlContentPost' => array(),
  'htmlContentHead' => array(),
);


$jquery = array();
if (array_key_exists('jquery', $this->data)) $jquery = $this->data['jquery'];

if (array_key_exists('pageid', $this->data)) {
  $hookinfo = array(
    'pre' => &$this->data['htmlinject']['htmlContentPre'], 
    'post' => &$this->data['htmlinject']['htmlContentPost'], 
    'head' => &$this->data['htmlinject']['htmlContentHead'], 
    'jquery' => &$jquery, 
    'page' => $this->data['pageid']
  );
    
  SimpleSAML_Module::callHooks('htmlinject', $hookinfo);  
}

header('X-Frame-Options: SAMEORIGIN');
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="SimpleSAMLPHP Theme">
    <meta name="author" content="Skylar Kelty">

    <title><?php echo array_key_exists('header', $this->data) ? $this->data['header'] : 'simpleSAMLphp'; ?></title>

    <link href="/<?php echo $this->data['baseurlpath']; ?>resources/nicelogin/css/bootstrap.css" rel="stylesheet">
    <link href="/<?php echo $this->data['baseurlpath']; ?>resources/nicelogin/css/signin.css" rel="stylesheet">

    <script type="text/javascript" src="/<?php echo $this->data['baseurlpath']; ?>resources/script.js"></script>

    <?php
    if(!empty($this->data['htmlinject']['htmlContentHead'])) {
      foreach($this->data['htmlinject']['htmlContentHead'] AS $c) {
        echo $c;
      }
    }
    if(array_key_exists('head', $this->data)) {
      echo '<!-- head -->' . $this->data['head'] . '<!-- /head -->';
    }
    ?>
  </head>

  <?php
  $onLoad = '';
  if(array_key_exists('autofocus', $this->data)) {
    $onLoad .= 'SimpleSAML_focus(\'' . $this->data['autofocus'] . '\');';
  }
  if (isset($this->data['onLoad'])) {
    $onLoad .= $this->data['onLoad']; 
  }

  if($onLoad !== '') {
    $onLoad = ' onload="' . $onLoad . '"';
  }
  ?>
  <body<?php echo $onLoad; ?>>

    <div class="container">

    <?php
    if(!empty($this->data['htmlinject']['htmlContentPre'])) {
      foreach($this->data['htmlinject']['htmlContentPre'] AS $c) {
        echo $c;
      }
    }
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

<?php
if(!empty($this->data['htmlinject']['htmlContentPost'])) {
	foreach($this->data['htmlinject']['htmlContentPost'] AS $c) {
		echo $c;
	}
}
?>
		<div id="footer">
			<hr />
			Copyright &copy; 2013 <a href="https://github.com/SkylarKelty/">Skylar Kelty</a>
		</div>
    </div>
  </body>
</html>
