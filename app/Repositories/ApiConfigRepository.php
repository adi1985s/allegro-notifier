<?php
namespace App\Repositories;

use App\ValueObjects\ApiCountryCode;
use App\ValueObjects\ApiCredentials;
use App\ValueObjects\ApiLocalVersion;
use App\ValueObjects\ApiUrl;

abstract class ApiConfigRepository
{
    /**
     * @var ApiCredentials
     */
    protected $apiCredentials;

    /**
     * @var ApiUrl
     */
    protected $apiUrl;

    /**
     * @var ApiCountryCode
     */
    protected $apiCountryCode;

    /**
     * @var ApiLocalVersion
     */
    protected $apiLocalVersion;

    /**
     * @param ApiCredentials $apiCredentials
     * @param ApiUrl $apiUrl
     * @param ApiCountryCode $apiCountryCode
     * @param ApiLocalVersion $apiLocalVersion
     */
    public function __construct(ApiCredentials $apiCredentials, ApiUrl $apiUrl, ApiCountryCode $apiCountryCode, ApiLocalVersion $apiLocalVersion)
    {
        $this->apiCredentials = $apiCredentials;
        $this->apiUrl = $apiUrl;
        $this->apiCountryCode = $apiCountryCode;
        $this->apiLocalVersion = $apiLocalVersion;
    }

    /**
     * @return string
     */
    public function getApiToken() : string
    {
        return $this->apiCredentials->getApiToken();
    }

    /**
     * @return int
     */
    public function getApiLocalVersion() : int
    {
        return $this->apiLocalVersion->get();
    }

    /**
     * @return string
     */
    public function getApiUrl() : string
    {
        return $this->apiUrl->get();
    }
}