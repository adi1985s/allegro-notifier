<?php
namespace App\Repositories;

use Doctrine\Common\Collections\ArrayCollection;

class AllegroCategoriesRepository extends CategoriesRepository
{
    /**
     * @var ApiConfigRepository
     */
    protected $apiConfigRepository;

    public function __construct(ApiConfigRepository $apiConfigRepository)
    {
        $this->apiConfigRepository = $apiConfigRepository;
    }

    public function getAll() : ArrayCollection
    {
        $client = new \SoapClient($this->apiConfigRepository->getApiUrl(), ['encoding'=>'UTF-8']);

        $itemsRaw = $client->doGetCatsData(['countryId' => 1, 'webapiKey' => $this->apiConfigRepository->getApiToken()]);

        $itemsArray = json_decode(json_encode($itemsRaw, JSON_UNESCAPED_UNICODE), true);

        $items = new ArrayCollection($itemsArray['catsList']['item']);

        return $items;
    }
}