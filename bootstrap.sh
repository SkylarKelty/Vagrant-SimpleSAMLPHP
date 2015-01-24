#!/usr/bin/env bash

# Install apache and PHP.
apt-get update
apt-get install curl apache2 php5 php5-curl php5-mcrypt php5-memcache memcached -y

# Install Composer.
curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

# Run Composer.
cd /vagrant/IdP && composer install
cd /vagrant/SP && composer install
cd ~

# Apache Config
update-rc.d apache2 enable
a2dissite default
ln -s /vagrant/config/apache2.conf /etc/apache2/sites-enabled/default
ln -s /vagrant/config/apache2-idp.conf /etc/apache2/sites-enabled/idp
service apache2 reload

# Memcached
service memcached start
update-rc.d memcached enable
