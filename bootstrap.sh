#!/usr/bin/env bash

apt-get update
apt-get install apache2 php5 php5-mcrypt php5-memcache memcached -y

# Apache Config
update-rc.d apache2 enable
a2dissite default
ln -s /vagrant/config/apache2.conf /etc/apache2/sites-enabled/default
ln -s /vagrant/config/apache2-idp.conf /etc/apache2/sites-enabled/idp
service apache2 reload

# Memcached
service memcached start
update-rc.d memcached enable