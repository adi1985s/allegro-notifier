<?php
namespace Tests\ValueObjects\Allegro;

use App\ValueObjects\Contracts\ApiCountryCode;
use App\ValueObjects\Allegro\AllegroWebApiCountryCode;

/**
 * @group ValueObject
 */
class AllegroWebApiCountryCodeTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function instanceOfApiCountryCode()
    {
        $countryCode = new AllegroWebApiCountryCode(15);

        $this->assertInstanceOf(ApiCountryCode::class, $countryCode);
    }

    /**
     * @test
     */
    public function returnsUnmodifiedCountryCode()
    {
        $countryCode = new AllegroWebApiCountryCode(15);

        $this->assertEquals(15, $countryCode->get());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid countryCode parameter
     */
    public function countryCodeMustBeHigherThanZero()
    {
        new AllegroWebApiCountryCode(0);
    }
}