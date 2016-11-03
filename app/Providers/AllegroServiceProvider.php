<?php
namespace App\Providers;

use App\ValueObjects\Contracts\ApiUrl;
use Illuminate\Support\ServiceProvider;
use App\ValueObjects\Allegro\AllegroWebApiUrl;
use App\ValueObjects\Contracts\ApiCountryCode;
use App\ValueObjects\Contracts\ApiCredentials;
use App\ValueObjects\Contracts\ApiLocalVersion;
use App\Repositories\Contracts\ApiConfigRepository;
use Illuminate\Cache\Repository as CacheRepository;
use Illuminate\Config\Repository as ConfigRepository;
use App\ValueObjects\Allegro\AllegroWebApiCredentials;
use App\ValueObjects\Allegro\AllegroWebApiCountryCode;
use App\ValueObjects\Allegro\AllegroWebApiLocalVersion;
use App\Repositories\Allegro\AllegroWebApiConfigRepository;

class AllegroServiceProvider extends ServiceProvider
{
    /**
     * @param ConfigRepository $configRepository
     * @param CacheRepository $cacheRepository
     */
    public function boot(ConfigRepository $configRepository, CacheRepository $cacheRepository)
    {
        $this->bindApiCredentials($configRepository);

        $this->bindApiCountryCode($configRepository);

        $this->bindApiLocalVersion($configRepository, $cacheRepository);

        $this->bindApiUrl($configRepository);

        // at last, bind config repository provider
        $this->bindApiConfigRepository($configRepository);

        $this->bindSoapClient();
    }

    /**
     * @param ConfigRepository $configRepository
     */
    protected function bindApiCredentials(ConfigRepository $configRepository)
    {
        $this->app->singleton(ApiCredentials::class, function () use ($configRepository) {
            $username = $configRepository->get('allegro.username');
            $password = $configRepository->get('allegro.password');
            $webApiKey = $configRepository->get('allegro.webApiKey');

            return new AllegroWebApiCredentials($username, $password, $webApiKey);
        });
    }

    /**
     * @param ConfigRepository $configRepository
     */
    protected function bindApiCountryCode(ConfigRepository $configRepository)
    {
        $this->app->singleton(ApiCountryCode::class, function () use ($configRepository) {
            $countryCode = $configRepository->get('allegro.countryCode');

            return new AllegroWebApiCountryCode($countryCode);
        });
    }

    /**
     * @param ConfigRepository $configRepository
     * @param CacheRepository $cacheRepository
     */
    protected function bindApiLocalVersion(ConfigRepository $configRepository, CacheRepository $cacheRepository)
    {
        $this->app->singleton(ApiLocalVersion::class, function () use ($configRepository, $cacheRepository) {

            // cache query to which gets local version from API endpoint
            $localVersion = $cacheRepository->remember('localVersion', 30, function () use ($configRepository) {
                /**
                 * @var $apiUrl ApiUrl
                 */
                $apiUrl = $this->app->make(ApiUrl::class);
                /**
                 * @var $apiCredentials ApiCredentials
                 */
                $apiCredentials = $this->app->make(ApiCredentials::class);

                $soapCli = new \SoapClient($apiUrl->get());
                $apiResponse = $soapCli->doQueryAllSysStatus(['countryId' => 1, 'webapiKey' => $apiCredentials->getApiToken()]);
                $apiResponse = json_decode(json_encode($apiResponse), true);

                return $apiResponse['sysCountryStatus']['item'][0]['verKey'];
            });

            return new AllegroWebApiLocalVersion($localVersion);
        });
    }

    /**
     * @param ConfigRepository $configRepository
     */
    protected function bindApiUrl(ConfigRepository $configRepository)
    {
        $this->app->singleton(ApiUrl::class, function () use ($configRepository) {
            $webApiUrl = $configRepository->get('allegro.webApiUrl');

            return new AllegroWebApiUrl($webApiUrl);
        });
    }

    /**
     * @param ConfigRepository $configRepository
     */
    public function bindApiConfigRepository(ConfigRepository $configRepository)
    {
        $this->app->singleton(ApiConfigRepository::class, function () use ($configRepository) {
            /**
             * @var $apiUrl ApiUrl
             */
            $apiUrl = $this->app->make(ApiUrl::class);
            /**
             * @var $apiCredentials ApiCredentials
             */
            $apiCredentials = $this->app->make(ApiCredentials::class);
            /**
             * @var $countryCode ApiCountryCode
             */
            $countryCode = $this->app->make(ApiCountryCode::class);
            /**
             * @var $localVersion ApiLocalVersion
             */
            $localVersion = $this->app->make(ApiLocalVersion::class);

            return new AllegroWebApiConfigRepository($apiCredentials, $apiUrl, $countryCode, $localVersion);
        });
    }

    private function bindSoapClient()
    {
        $this->app->bind(\SoapClient::class, function () {
            $apiConfigRepository = $this->app->make(ApiConfigRepository::class);

            return new \SoapClient($apiConfigRepository->getApiUrl(), ['encoding'=>'UTF-8']);
        });
    }
}
