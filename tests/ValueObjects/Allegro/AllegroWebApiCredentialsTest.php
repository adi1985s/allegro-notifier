<?php
namespace Tests\ValueObjects\Allegro;

use App\ValueObjects\Allegro\AllegroWebApiCredentials;

/**
 * @group ValueObject
 */
class AllegroWebApiCredentialsTest extends \PHPUnit_Framework_TestCase
{
    const VALID_USERNAME = 'john';
    const VALID_PASSWORD = 'password';
    const VALID_API_TOKEN = 'token123';

    /**
     * @var AllegroWebApiCredentials
     */
    protected $validApiCretentials;

    public function setUp()
    {
        $this->validApiCretentials = new AllegroWebApiCredentials(self::VALID_USERNAME, self::VALID_PASSWORD, self::VALID_API_TOKEN);
    }

    /**
     * @test
     */
    public function returnsUsername()
    {
        $this->assertEquals(self::VALID_USERNAME, $this->validApiCretentials->getUsername());
    }

    /**
     * @test
     */
    public function returnsPassword()
    {
        $this->assertEquals(self::VALID_PASSWORD, $this->validApiCretentials->getPassword());
    }

    /**
     * @test
     */
    public function returnsApiToken()
    {
        $this->assertEquals(self::VALID_API_TOKEN, $this->validApiCretentials->getApiToken());
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid username parameter
     */
    public function requiresUsername()
    {
        new AllegroWebApiCredentials('', self::VALID_PASSWORD, self::VALID_API_TOKEN);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid password parameter
     */
    public function requiresPassword()
    {
        new AllegroWebApiCredentials(self::VALID_USERNAME, '', self::VALID_API_TOKEN);
    }

    /**
     * @test
     * @expectedException \InvalidArgumentException
     * @expectedExceptionMessage Invalid apiToken parameter
     */
    public function requiresApiToken()
    {
        new AllegroWebApiCredentials(self::VALID_USERNAME, self::VALID_PASSWORD, '');
    }
}