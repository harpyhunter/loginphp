#!/bin/bash
 
sudo apt update
sudo apt install php php-xml php-fpm libapache2-mod-php php-mysql php-gd php-imap php-curl php-mbstring mariadb-server -y
sudo service apache2 start
sudo service mysql start

cat << CD
============================================================================================
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
Please type a commands to create database and exit:
create database login_db;
exit;
^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^^
============================================================================================
CD
sudo mysql

cd /tmp
git clone https://github.com/dkcyberz/loginphp.git
cat << Setup
********************************************************************************************============================================================================================
Setup a Password and Remember
Enter "Yes" to All
Finally Change the password on database.php
============================================================================================********************************************************************************************
Setup
sudo mysql_secure_installation
cd loginphp/secweb
sudo mysql -u root  -p login_db < login_db.sql
cd ..
sudo mv secweb /var/www/html/secweb
sudo mv vulnweb /var/www/html/vulnweb
cd /var/www/html
sudo chmod -R 777 secweb
sudo chmod -R 777 vulnweb
cd secweb
sudo nano database.php
sudo cp database.php ../vulnweb/database.php
echo "Successfully Completed"
echo "Copy And Paste the URL to access secure login page    : http://127.0.0.1/secweb"
echo "Copy And Paste the URL to access vulnerable login page: http://127.0.0.1/vulnweb"

