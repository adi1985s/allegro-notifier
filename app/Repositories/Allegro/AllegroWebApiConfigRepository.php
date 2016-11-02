<?php
namespace App\Repositories\Allegro;

use App\Repositories\Contracts\ApiConfigRepository;
use App\ValueObjects\ApiCountryCode;
use App\ValueObjects\ApiCredentials;
use App\ValueObjects\ApiLocalVersion;
use App\ValueObjects\ApiUrl;

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