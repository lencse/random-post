# Random post generator

[![Build Status](https://travis-ci.org/lencse/random-post.svg?branch=master)](https://travis-ci.org/lencse/random-post)

### Installation with vagrant

1. Clone and enter project dir
1. Edit vagrant/config/ssmtp.conf to add Gmail user (without `@gmail.com``) and password to send notification mails
1. Execute the following commands:

````
vagrant up
vagrant ssh
cd /shared
composer install --no-dev --optimize-autoloader
composer setup
# Edit config-web.php
````

### Open [http://localhost:8444](http://localhost:8444)
