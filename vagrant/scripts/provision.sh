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
sudo apt-get -y install php5.6-mongodb

sudo pecl channel-update pecl.php.net

sudo cat /shared/vagrant/config/php.ini >> /etc/php/5.6/apache2/php.ini
sudo cat /shared/vagrant/config/php.ini >> /etc/php/5.6/cli/php.ini

sudo cp /shared/vagrant/config/apache-000-default.conf /etc/apache2/sites-available/000-default.conf
sudo a2enmod rewrite
service apache2 restart

sudo apt-get -y install git

curl -s https://getcomposer.org/installer | php
sudo mv composer.phar /usr/local/bin/composer

sudo apt-get -y install mongodb

sudo apt-get -y install ssmtp
sudo apt-get -y install heirloom-mailx

sudo apt-get -y install dos2unix

dos2unix /shared/vagrant/config/ssmtp.conf
sudo cat /shared/vagrant/config/ssmtp.conf >> /etc/ssmtp/ssmtp.conf


CRON="*/5 * * * * php /shared/bin/process-mail.php ; echo \"db.mails.remove()\" | mongo"

sudo crontab -l > mycron
echo "$CRON" >> mycron
sudo crontab mycron
rm mycron
