# allegro-notifier
### User friendly and configurable allegro.pl new auctions notifications. 

<svg xmlns="http://www.w3.org/2000/svg" width="84" height="20"><linearGradient id="b" x2="0" y2="100%"><stop offset="0" stop-color="#bbb" stop-opacity=".1"/><stop offset="1" stop-opacity=".1"/></linearGradient><mask id="a"><rect width="84" height="20" rx="3" fill="#fff"/></mask><g mask="url(#a)"><path fill="#555" d="M0 0h51v20H0z"/><path fill="#97CA00" d="M51 0h33v20H51z"/><path fill="url(#b)" d="M0 0h84v20H0z"/></g><g fill="#fff" text-anchor="middle" font-family="DejaVu Sans,Verdana,Geneva,sans-serif" font-size="11"><text x="25.5" y="15" fill="#010101" fill-opacity=".3">phpunit</text><text x="25.5" y="14">phpunit</text><text x="66.5" y="15" fill="#010101" fill-opacity=".3">56%</text><text x="66.5" y="14">56%</text></g></svg>

##### Installation
```sh
$ git clone https://github.com/initx/allegro-notifier.git
$ cd allegro-notifier && composer install
$ cp .env.example .env
```
Now edit Your .env configuration file. Please fill all "ALLEGRO_%" variables with proper values.
More informations about allegro webapi tokens: http://allegro.pl/webapi/?lang=en

After that You are ready to download categories.
To do this, type:
```sh
$ php artisan doctrine:schema:update
$ php artisan allegro:categories:rebuild
```