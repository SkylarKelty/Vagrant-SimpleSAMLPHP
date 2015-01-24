<?php
/**
 * SAML 2.0 remote IdP metadata for simpleSAMLphp.
 *
 * Remember to remove the IdPs you don't use from this file.
 *
 * See: https://rnd.feide.no/content/idp-remote-metadata-reference
 */

$metadata['http://local.idp:8080'] = array(
	'name' => array(
		'en' => 'Local IdP',
	),
	'description'           => 'Here you can login with your own specified accounts.',

	'SingleSignOnService'  => 'http://local.idp:8080/simplesaml/saml2/idp/SSOService.php',
	'SingleLogoutService'  => 'http://local.idp:8081/simplesaml/saml2/idp/SingleLogoutService.php',
	'certFingerprint'      => 'afe71c28ef740bc87425be13a2263d37971da1f9'
);
