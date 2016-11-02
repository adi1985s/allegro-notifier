<?php
namespace App\Console\Commands;

use App\Repositories\CategoriesRepository;
use Doctrine\Common\Collections\ArrayCollection;
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
     * @var ApiConfigRepository
     */
    private $apiConfigRepository;
    /**
     * @var CategoriesRepository
     */
    private $categoriesRepository;

    /**
     * @param CategoriesRepository $categoriesRepository
     */
    public function __construct(CategoriesRepository $categoriesRepository)
    {
        parent::__construct();
        $this->categoriesRepository = $categoriesRepository;
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
        $items = \Cache::remember('categories-data', 30, function () {
            return $this->categoriesRepository->getAll();
        });

        dd($items->count());

        file_put_contents(base_path('dump_cats.json'), json_encode($items, JSON_UNESCAPED_UNICODE));

        // TODO: READY FOR QUERIES
    }
}
