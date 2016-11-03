<?php
namespace Tests\ValueObjects\Allegro;

use App\DataProviders\AllegroCategoryDataProvider;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @group DataProvider
 */
class AllegroCategoryDataProviderTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @test
     */
    public function providesApiData()
    {
        $firstCategory =
            [
                'name' => 'item1',
                'attr1' => 'attr1',
            ];
        $secondCategory =
            [
                'name' => 'item2',
                'attr1' => 'val2',
            ];
        $categoryItems = [$firstCategory, $secondCategory];
        $soapResponse = new \stdClass();
        $soapResponse->catsList = new \stdClass();
        $soapResponse->catsList->item = $categoryItems;
        $configRepository = \Mockery::mock('App\Repositories\Contracts\ApiConfigRepository');
        $configRepository->shouldReceive('getApiToken')
            ->andReturn('apiToken123');
        $soapClient = \Mockery::mock('\SoapClient');
        $soapClient->shouldReceive('doGetCatsData')
            ->once()
            ->andReturn($soapResponse);
        $dataProvider = new AllegroCategoryDataProvider($configRepository, $soapClient);

        $items = $dataProvider->getAll();

        $this->assertInstanceOf(ArrayCollection::class, $items);
        $this->assertEquals($categoryItems, $items->toArray());
    }
}