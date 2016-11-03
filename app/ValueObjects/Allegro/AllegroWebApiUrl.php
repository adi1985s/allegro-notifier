<?php
namespace App\ValueObjects\Allegro;

use App\ValueObjects\Contracts\ApiUrl;

class AllegroWebApiUrl extends ApiUrl
{
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
            throw new \InvalidArgumentException(sprintf(AllegroObjectErrorMessage::INVALID_PARAMETER_MSG, 'URL'));
        }
    }
}