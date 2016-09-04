#!/bin/bash

echo "export VAGRANT_BOX=$PROVISION_VAGRANT_BOX" >> /home/vagrant/.profile
export VAGRANT_BOX=$PROVISION_VAGRANT_BOX

sudo apt-add-repository -y ppa:ondrej/php
sudo apt-get -y update
sudo apt-get -y upgrade

sudo apt-get -y install mc
sudo apt-get -y install tree

sudo apt-get -y install apache2

sudo apt-get -y install php5.6
sudo apt-get -y install php-pear
sudo apt-get -y install php5.6-mcrypt
sudo apt-get -y install php5.6-curl
sudo apt-get -y install php5.6-gd
sudo apt-get -y install php5.6-intl
sudo apt-get -y install php5.6-xml
sudo apt-get -y install php5.6-mbstring
sudo apt-get -y install php5.6-zip
sudo apt-get -y install php5.6-xdebug
#sudo apt-get install -y autoconf g++ make openssl libssl-dev libcurl4-openssl-dev
#sudo apt-get install -y libcurl4-openssl-dev pkg-config
#sudo apt-get install -y libsasl2-dev
sudo apt-get -y install php5.6-mongodb

sudo pecl channel-update pecl.php.net

#sudo pecl install mongodb

sudo cat /shared/vagrant/config/php.ini >> /etc/php/5.6/apache2/php.ini
sudo cat /shared/vagrant/config/php.ini >> /etc/php/5.6/cli/php.ini

sudo cp /shared/vagrant/config/apache-000-default.conf /etc/apache2/sites-available/000-default.conf
sudo a2enmod rewrite
service apache2 restart

sudo apt-get -y install git

curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

curl -sL https://deb.nodesource.com/setup_6.x | sudo -E bash -
sudo apt-get -y install nodejs

sudo npm install -g bower
sudo npm install -g grunt-cli
sudo npm install -g pm2

#sudo gem install sass
#sudo apt-get -y install ruby-compass
#
#sudo gem install sass
#sudo apt-get -y install ruby-compass

sudo apt-get -y install mongodb
