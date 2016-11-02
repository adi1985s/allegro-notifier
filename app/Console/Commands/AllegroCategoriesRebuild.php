<?php
namespace App\Console\Commands;

use App\Entities\Category;
use App\Repositories\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\EntityManager;
use Illuminate\Console\Command;
use App\Repositories\ApiConfigRepository;

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
     * @var CategoriesRepository
     */
    protected $categoriesRepository;

    /**
     * @var EntityManager
     */
    protected $em;

    /**
     * @param CategoriesRepository $categoriesRepository
     * @param EntityManager $em
     */
    public function __construct(CategoriesRepository $categoriesRepository, EntityManager $em)
    {
        parent::__construct();
        $this->categoriesRepository = $categoriesRepository;
        $this->em = $em;
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
        $categories = \Cache::remember('categories-data', 30, function () {
            return $this->categoriesRepository->getAll();
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

        // TODO: READY FOR QUERIES
    }
}
