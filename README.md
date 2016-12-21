#LiteracyPro Bands & Albums

## Setup

```
#Set up your database environment: Specifically set the MySQL credentials to a
#valid database, username and password
cp .env.example .env
vim .env

#for *NIX/Mac
echo 192.168.33.10 adamlamers.dev | sudo tee -a /etc/hosts

#Change env to suit, or you can use the included Scotchbox vagrant box
#if you choose to use the Vagrant box, ssh into the vagrant box and cd to /var/www first.
#vagrant up
#vagrant ssh
#cd /var/www

composer install
php artisan key:generate
php artisan migrate
php artisan db:seed
```

Then navigate to http://adamlamers.dev or http://192.168.33.10

OR

Configure the .env, generate the keys, migrate and seed the database then run:

```
php artisan serve
```

