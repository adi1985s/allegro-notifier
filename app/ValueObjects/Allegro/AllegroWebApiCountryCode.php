<?php
namespace App\ValueObjects\Allegro;

use App\ValueObjects\Contracts\ApiCountryCode;

class AllegroWebApiCountryCode extends ApiCountryCode
{
    /**
     * @var int
     */
    protected $countryCode;

    /**
     * @param int $countryCode
     */
    public function __construct(int $countryCode)
    {
        $this->guard($countryCode);
        $this->countryCode = $countryCode;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->countryCode;
    }

    private function guard($countryCode)
    {
        if (empty($countryCode)) {
            throw new \InvalidArgumentException(sprintf(AllegroObjectErrorMessage::INVALID_PARAMETER_MSG, 'countryCode'));
        }
    }
}