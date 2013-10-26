#!/usr/bin/env bash

apt-get update
apt-get install apache2 php5 php5-mcrypt memcached -y

# Apache Config
a2dissite default
ln -s /vagrant/config/apache2.conf /etc/apache2/sites-enabled/default
ln -s /vagrant/config/apache2-sp.conf /etc/apache2/sites-enabled/sp
ln -s /vagrant/config/apache2-idp.conf /etc/apache2/sites-enabled/idp
service apache2 reload