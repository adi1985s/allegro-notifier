<?php
namespace App\ValueObjects;

class AllegroWebApiLocalVersion extends ApiLocalVersion
{
    const INVALID_LOCAL_VERSION = "Invalid local version";

    /**
     * @var int
     */
    protected $localVersion;

    /**
     * @param int $localVersion
     */
    public function __construct(int $localVersion)
    {
        $this->guard($localVersion);
        $this->localVersion = $localVersion;
    }

    /**
     * @return int
     */
    public function get(): int
    {
        return $this->localVersion;
    }

    protected function guard($localVersion)
    {
        if (empty($localVersion)) {
            throw new \InvalidArgumentException(self::INVALID_LOCAL_VERSION);
        }
    }
}