#!/bin/bash
sudo apt update && sudo apt upgrade -y
sudo apt install apache2 mariadb-server php libapache2-mod-php php-mysql curl git -y
sudo mariadb -e "CREATE DATABASE IF NOT EXISTS wordpress_db; CREATE USER IF NOT EXISTS 'wp_user'@'localhost' IDENTIFIED BY 'CloudAdmin123!'; GRANT ALL PRIVILEGES ON wordpress_db.* TO 'wp_user'@'localhost'; FLUSH PRIVILEGES;"
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp
