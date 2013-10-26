#!/usr/bin/env bash

apt-get update
apt-get install apache2 php5 -y

# Apache Config
a2dissite default
ln -s /vagrant/config/apache2.conf /etc/apache2/sites-enabled/saml
service apache2 reload