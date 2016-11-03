<?php
namespace Tests\ValueObjects\Allegro;

use App\ValueObjects\Contracts\ApiUrl;
use App\ValueObjects\Allegro\AllegroWebApiUrl;

/**
 * @group ValueObject
 */
class AllegroWebApiUrlTest extends \PHPUnit_Framework_TestCase
{
    const VALID_URL = 'http://test.com/api/v1';

    /**
     * @test
     */
    public function instanceOfApiCountryCode()
    {
        $apiUrl = new AllegroWebApiUrl(self::VALID_URL);

        $this->assertInstanceOf(ApiUrl::class, $apiUrl);
    }

    /**
     * @test
     */
    public function returnsUnmodifiedApiUrl()
    {
        $apiUrl = new AllegroWebApiUrl(self::VALID_URL);

        $this->assertEquals(self::VALID_URL, $apiUrl->get());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid URL parameter
     */
    public function allowsOnlyValidUrl()
    {
        $url = ':///invalid-url.com/api/v1';

        new AllegroWebApiUrl($url);
    }
}