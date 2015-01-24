SimpleSAMLPHP in Vagrant
=======

Vagrant Template for a SimpleSAMLPHP IdP and SP

Add the following to your /etc/hosts file:
```
127.0.0.1 local.idp local.app
```

Run ```vagrant up``` and go to http://local.app:8080/
Sign in as username/password

You can add more users to config/users.json
