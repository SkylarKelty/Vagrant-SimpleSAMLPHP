JSON mod for SAML
=============

SAML Module for authing against a JSON list of users

Example Config:
```
	'json' => array(
		'json:auth',
		'mappings' => '/saml/config/userlist.json',
		'encryption' => 'md5' // plain, md5, sha1
	),
```