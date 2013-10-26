<?php
/**
 * SAML 2.0 remote SP metadata for simpleSAMLphp.
 *
 * See: http://simplesamlphp.org/docs/trunk/simplesamlphp-reference-sp-remote
 */

/*
 * Example simpleSAMLphp SAML 2.0 SP
 */
$metadata['http://local.sp:8081/simplesaml/module.php/saml/sp/metadata.php/default-sp'] = array(
	'AssertionConsumerService' => 'http://local.sp:8081/simplesaml/module.php/saml/sp/saml2-acs.php/default-sp',
	'SingleLogoutService' => 'http://local.sp:8081/simplesaml/module.php/saml/sp/saml2-logout.php/default-sp',
);