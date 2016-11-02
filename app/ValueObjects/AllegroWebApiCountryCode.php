<?php
namespace App\ValueObjects;

class AllegroWebApiCountryCode extends ApiCountryCode
{
    const INVALID_COUNTRY_CODE_MGS = "Invalid country code";

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
            throw new \InvalidArgumentException(self::INVALID_COUNTRY_CODE_MGS);
        }
    }
}