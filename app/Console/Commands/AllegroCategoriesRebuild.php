<?php
namespace App\Console\Commands;

use App\Entities\Category;
use Doctrine\ORM\EntityManager;
use Illuminate\Console\Command;
use App\Repositories\Contracts\CategoryRepository;
use Illuminate\Cache\Repository as CacheRepository;
use App\DataProviders\AllegroCategoryDataProvider;
use Doctrine\Common\Collections\ArrayCollection;

class AllegroCategoriesRebuild extends Command
{
    /**
     * @var string
     */
    protected $signature = 'allegro:categories:rebuild';

    /**
     * @var string
     */
    protected $description = 'Rebuild categories';

    /**
     * @var AllegroCategoryDataProvider
     */
    protected $categoriesDataProvider;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @var CacheRepository
     */
    protected $cacheRepository;
    /**
     * @var CategoryRepository
     */
    private $categoryRepository;

    /**
     * @param AllegroCategoryDataProvider $categoriesDataProvider
     * @param CategoryRepository $categoryRepository
     * @param CacheRepository $cacheRepository
     * @param EntityManager $em
     */
    public function __construct(AllegroCategoryDataProvider $categoriesDataProvider, CategoryRepository $categoryRepository, CacheRepository $cacheRepository, EntityManager $em)
    {
        parent::__construct();

        $this->em = $em;
        $this->cacheRepository = $cacheRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoriesDataProvider = $categoriesDataProvider;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /**
         * @var $items ArrayCollection
         */
        $categories = $this->cacheRepository->remember('categories-data', 30, function () {
            return $this->categoriesDataProvider->getAll();
        });

        foreach ($categories as $allegroCategory) {
            $name = $allegroCategory['catName'];
            $position = $allegroCategory['catPosition'];
            $allegroId = $allegroCategory['catId'];
            $allegroParentId = $allegroCategory['catParent'];

            $parentId = 0; // temporary. we must update it later

            $ourCategory = new Category($name, $position, $parentId, $allegroId, $allegroParentId);
            $this->em->persist($ourCategory);
        }

        $this->em->flush();

        $ourCategories = $this->categoryRepository->findBy(['id' => 1]);
        dd($ourCategories);

        // TODO: READY FOR QUERIES
    }
}
