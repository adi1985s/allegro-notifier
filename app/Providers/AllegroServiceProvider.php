<?php
namespace App\Providers;

use App\ValueObjects\ApiCredentials;
use Illuminate\Support\ServiceProvider;
use App\ValueObjects\AllegroWebApiCredentials;
use Illuminate\Config\Repository as ConfigRepository;

class AllegroServiceProvider extends ServiceProvider
{
    /**
     * @param ConfigRepository $configRepository
     */
    public function boot(ConfigRepository $configRepository)
    {
        $this->app->singleton(ApiCredentials::class, function() use ($configRepository) {
            $username = $configRepository->get('allegro.username');
            $password = $configRepository->get('allegro.password');
            $webApiKey = $configRepository->get('allegro.webApiKey');

            return new AllegroWebApiCredentials($username, $password, $webApiKey);
        });
    }
}
