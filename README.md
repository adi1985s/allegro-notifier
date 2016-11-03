# allegro-notifier
### User friendly and configurable allegro.pl new auctions notifications. 

##### Installation
```sh
$ git clone https://github.com/initx/allegro-notifier.git
$ cd allegro-notifier && composer install
$ cp .env.example .env
```
Now edit Your .env configuration file. Please fill all variables with ALLEGRO_ prefix.
Allegro-notifier uses api token to read-only purposes from Allegro WebAPI. 
More informations about allegro webapi tokens: http://allegro.pl/webapi/?lang=en

After that You are ready to download categories.
To do this, type:
```sh
$ php artisan doctrine:schema:update && php artisan allegro:categories:rebuild
```

##### Additionally - run tests and build coverage report
```sh
$ php vendor/bin/phpunit --coverage-html ./coverage
```