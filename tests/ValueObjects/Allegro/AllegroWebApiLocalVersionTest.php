<?php
namespace Tests\ValueObjects\Allegro;

use App\ValueObjects\Contracts\ApiLocalVersion;
use App\ValueObjects\Allegro\AllegroWebApiLocalVersion;

/**
 * @group ValueObject
 */
class AllegroWebApiLocalVersionTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instanceOfApiCountryCode()
    {
        $localVersion = new AllegroWebApiLocalVersion(1);

        $this->assertInstanceOf(ApiLocalVersion::class, $localVersion);
    }

    /**
     * @test
     */
    public function returnsUnmodifiedLocalVersion()
    {
        $localVersion = new AllegroWebApiLocalVersion(2);

        $this->assertEquals(2, $localVersion->get());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid localVersion parameter
     */
    public function localVersionMustBeHigherThanZero()
    {
        new AllegroWebApiLocalVersion(0);
    }
}