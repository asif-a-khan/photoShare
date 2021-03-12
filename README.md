# Installation instructions

composer install

npm install

Setup env file with database configurations as such:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=photoShare
DB_USERNAME=root
DB_PASSWORD=secret

# Vagrant instructions

vagrant ssh

sudo mysql -u root -p secret

create database photoShare;

exit;

php artisan migrate
