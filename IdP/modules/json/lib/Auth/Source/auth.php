<?php

/**
 * This class is an authentication source which will auth against a
 * JSON list of users
 *
 * @package simpleSAMLphp
 */
class sspmod_json_Auth_Source_auth extends sspmod_core_Auth_UserPassBase {


	/**
	 * Our users, stored in an associative array. The key of the array is "<username>:<password>",
	 * while the value of each element is a new array with the attributes for each user.
	 */
	private $users;

	/**
	 * Do we encrypt passwords?
	 */
	private $encryptionType;


	/**
	 * Constructor for this authentication source.
	 *
	 * @param array $info  Information about this authentication source.
	 * @param array $config  Configuration.
	 */
	public function __construct($info, $config) {
		assert('is_array($info)');
		assert('is_array($config)');

		/* Call the parent constructor first, as required by the interface. */
		parent::__construct($info, $config);

		$this->users = array();
		$this->encryptionType = 'plain';

		if (!isset($config['mappings'])) {
			throw new Exception('Missing config: "mappings"!');
		}

		if (!file_exists($config['mappings'])) {
			throw new Exception('Cannot find mappings file: ' . $config['mappings']);
		}

		$file = file_get_contents($config['mappings']);
		$json = json_decode($file, true);

		if ($json === NULL) {
			throw new Exception('Invalid JSON!');
		}

		foreach ($json as $username => $attrs) {
			$k = $username . ':' . $attrs['password'];
			unset($attrs['password']);
			$this->users[$k] = $attrs;
		}

		if (isset($config['encryption'])) {
			switch ($config['encryption']) {
				case 'plain':
				case 'md5':
				case 'sha1':
					$this->encryptionType = $config['encryption'];
					break;
				default:
					throw new Exception('Unsupported encryption type: ' . $config['encryption']);
			}
		}
	}


	/**
	 * Attempt to log in using the given username and password.
	 *
	 * On a successful login, this function should return the users attributes. On failure,
	 * it should throw an exception. If the error was caused by the user entering the wrong
	 * username or password, a SimpleSAML_Error_Error('WRONGUSERPASS') should be thrown.
	 *
	 * Note that both the username and the password are UTF-8 encoded.
	 *
	 * @param string $username  The username the user wrote.
	 * @param string $password  The password the user wrote.
	 * @return array  Associative array with the users attributes.
	 */
	protected function login($username, $password) {
		assert('is_string($username)');
		assert('is_string($password)');

		switch ($this->encryptionType) {
				case 'md5':
					$password = md5($password);
					break;
				case 'sha1':
					$password = sha1($password);
					break;
		}

		$userpass = $username . ':' . $password;
		if (!array_key_exists($userpass, $this->users)) {
			throw new SimpleSAML_Error_Error('WRONGUSERPASS');
		}

		return $this->users[$userpass];
	}

}
