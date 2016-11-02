<?php
namespace App\ValueObjects;

class AllegroWebApiLocalVersion
{
    /**
     * @var int
     */
    protected $localVersion;

    /**
     * @param int $localVersion
     */
    public function __construct(int $localVersion)
    {
        $this->localVersion = $localVersion;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->localVersion;
    }
}