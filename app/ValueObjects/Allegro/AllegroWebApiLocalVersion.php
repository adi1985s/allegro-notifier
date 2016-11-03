<?php
namespace App\ValueObjects\Allegro;

use App\ValueObjects\Contracts\ApiLocalVersion;

class AllegroWebApiLocalVersion extends ApiLocalVersion
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
        if ($localVersion <= 0) {
            throw new \InvalidArgumentException(sprintf(AllegroObjectErrorMessage::INVALID_PARAMETER_MSG, 'localVersion'));
        }
    }
}