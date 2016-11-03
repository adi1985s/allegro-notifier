# allegro-notifier
##### User friendly and configurable allegro.pl new auctions notifications. 

#### Installation
1. Clone repository & configure
```sh
$ git clone https://github.com/initx/allegro-notifier.git
$ cd allegro-notifier && composer install
$ cp .env.example .env
```
Now edit Your .env configuration file. Please fill all variables with ALLEGRO_ prefix.
Allegro-notifier uses informations provided in .env file to perform read-only requests from Allegro WebAPI. 
More informations about allegro webapi tokens: 
http://allegro.pl/webapi/

http://allegro.pl/webapi/?lang=en

2. Build database structure
```sh
$ php artisan doctrine:schema:create
```

#### Usage
Download categories.
To do this, type:
```sh
$ php artisan allegro:categories:rebuild
```

##### Additionally - run tests and build coverage report
```sh
$ php vendor/bin/phpunit --coverage-html ./coverage
```