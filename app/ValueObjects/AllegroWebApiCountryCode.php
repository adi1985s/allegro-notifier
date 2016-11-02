<?php
namespace App\ValueObjects;

class AllegroWebApiCountryCode
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
        $this->countryCode = $countryCode;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->countryCode;
    }
}