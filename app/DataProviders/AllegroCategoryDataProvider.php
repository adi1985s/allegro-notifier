<?php
namespace App\DataProviders;

use App\Repositories\Contracts\ApiConfigRepository;
use Doctrine\Common\Collections\ArrayCollection;

class AllegroCategoryDataProvider
{
    /**
     * @var ApiConfigRepository
     */
    protected $apiConfigRepository;

    /**
     * @var \SoapClient
     */
    protected $soapClient;

    /**
     * @param ApiConfigRepository $apiConfigRepository
     * @param \SoapClient $soapClient
     */
    public function __construct(ApiConfigRepository $apiConfigRepository, \SoapClient $soapClient)
    {
        $this->apiConfigRepository = $apiConfigRepository;
        $this->soapClient = $soapClient;
    }

    public function getAll() : ArrayCollection
    {
        $itemsRaw = $this->soapClient->doGetCatsData(['countryId' => 1, 'webapiKey' => $this->apiConfigRepository->getApiToken()]);

        $itemsArray = json_decode(json_encode($itemsRaw, JSON_UNESCAPED_UNICODE), true);

        $items = new ArrayCollection($itemsArray['catsList']['item']);

        return $items;
    }
}