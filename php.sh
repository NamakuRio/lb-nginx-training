#!/bin/bash

sudo apt update
sudo apt-get install software-properties-common -y
sudo add-apt-repository ppa:ondrej/php -y
sudo apt update -y
sudo apt install nginx php-fpm -y
