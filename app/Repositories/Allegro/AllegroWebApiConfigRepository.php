<?php
namespace App\Repositories\Allegro;

use App\ValueObjects\Contracts\ApiUrl;
use App\ValueObjects\Contracts\ApiCountryCode;
use App\ValueObjects\Contracts\ApiCredentials;
use App\ValueObjects\Contracts\ApiLocalVersion;
use App\Repositories\Contracts\ApiConfigRepository;

class AllegroWebApiConfigRepository implements ApiConfigRepository
{
    protected $apiCredentials;

    protected $apiUrl;

    protected $apiCountryCode;

    protected $apiLocalVersion;

    public function __construct(ApiCredentials $apiCredentials, ApiUrl $apiUrl, ApiCountryCode $apiCountryCode, ApiLocalVersion $apiLocalVersion)
    {
        $this->apiCredentials = $apiCredentials;
        $this->apiUrl = $apiUrl;
        $this->apiCountryCode = $apiCountryCode;
        $this->apiLocalVersion = $apiLocalVersion;
    }

    public function getApiToken() : string
    {
        return $this->apiCredentials->getApiToken();
    }

    public function getApiLocalVersion() : int
    {
        return $this->apiLocalVersion->get();
    }

    public function getApiUrl() : string
    {
        return $this->apiUrl->get();
    }
}