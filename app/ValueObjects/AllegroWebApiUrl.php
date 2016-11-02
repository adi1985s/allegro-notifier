<?php
namespace App\ValueObjects;

class AllegroWebApiUrl extends ApiUrl
{
    const INVALID_URL_MGS = "Invalid web api URL";

    /**
     * @var string
     */
    private $webApiUrl;

    /**
     * @param string $webApiUrl
     */
    public function __construct(string $webApiUrl)
    {
        $this->guard($webApiUrl);
        $this->webApiUrl = $webApiUrl;
    }

    /**
     * @return string
     */
    public function get(): string
    {
        return $this->webApiUrl;
    }

    private function guard($webApiUrl)
    {
        if (filter_var($webApiUrl, FILTER_VALIDATE_URL) === false) {
            throw new \InvalidArgumentException(self::INVALID_URL_MGS);
        }
    }
}