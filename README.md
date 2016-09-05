# Random post generator

[![Build Status](https://travis-ci.org/lencse/random-post.svg?branch=master)](https://travis-ci.org/lencse/random-post)

### Installation with vagrant

````
cp vagrant/config/ssmtp.conf.dist vagrant/config/ssmtp.conf
# Add Gmail username and password to vagrant/config/ssmtp.conf
vagrant up
vagrant ssh
cd /shared
composer install --no-dev --optimize-autoloader
composer setup
# Edit config-web.php
````

### Open [http://localhost:8444](http://localhost:8444)
