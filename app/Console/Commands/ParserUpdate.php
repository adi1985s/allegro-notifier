<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\ValueObjects\ApiCredentials;

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
     * @var ApiCredentials
     */
    private $apiCredentials;

    /**
     * @param ApiCredentials $apiCredentials
     */
    public function __construct(ApiCredentials $apiCredentials)
    {
        parent::__construct();
        $this->apiCredentials = $apiCredentials;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dd($this->apiCredentials->getWebApiToken());
    }
}
