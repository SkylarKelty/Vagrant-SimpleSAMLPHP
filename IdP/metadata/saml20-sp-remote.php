<?php
/**
 * SAML 2.0 remote SP metadata for simpleSAMLphp.
 *
 * See: http://simplesamlphp.org/docs/trunk/simplesamlphp-reference-sp-remote
 */

$metadata['http://local.app:8080/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = array(
	'AssertionConsumerService' => 'http://local.app:8080/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
	'SingleLogoutService' => 'http://local.app:8080/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
);
