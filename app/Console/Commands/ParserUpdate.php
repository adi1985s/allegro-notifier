<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\ApiConfigRepository;

class ParserUpdate extends Command
{
    /**
     * @var string
     */
    protected $signature = 'parser:update';

    /**
     * @var string
     */
    protected $description = 'Command description';

    /**
     * @var ApiConfigRepository
     */
    private $apiConfigRepository;

    /**
     * @param ApiConfigRepository $apiConfigRepository
     */
    public function __construct(ApiConfigRepository $apiConfigRepository)
    {
        parent::__construct();
        $this->apiConfigRepository = $apiConfigRepository;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
//        $a = new \SoapClient($this->apiConfigRepository->getApiUrl());
//        $v = $a->doQuerySysStatus(1, 1, $this->apiConfigRepository->getApiToken());

        // TODO: READY FOR QUERIES
    }
}
