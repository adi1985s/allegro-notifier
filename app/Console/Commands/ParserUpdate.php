<?php
namespace App\Console\Commands;

use App\ValueObjects\ApiCountryCode;
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
     * @var ApiCountryCode
     */
    private $apiCountryCode;

    /**
     * @param ApiCredentials $apiCredentials
     * @param ApiCountryCode $apiCountryCode
     */
    public function __construct(ApiCredentials $apiCredentials, ApiCountryCode $apiCountryCode)
    {
        parent::__construct();
        $this->apiCredentials = $apiCredentials;
        $this->apiCountryCode = $apiCountryCode;
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        dd($this->apiCountryCode->get());
    }
}
