<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Repositories\ProductRepository;

class FMTCFeed extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'feed:fmtc';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get FMTC feed and save into our local system.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle(ProductRepository $repo)
    {
        $repo->getAndSaveDeals();
    }
}