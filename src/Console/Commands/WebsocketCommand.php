<?php

namespace Sirj3x\Websocket\Console\Commands;

use Illuminate\Console\Command;
use Sirj3x\Websocket\Controllers\WebsocketWorkerController;
use Workerman\Worker;

class WebsocketCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ws:run';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'For run websocket and use that.';

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
     * @return int
     */
    public function handle(): int
    {
        // Create a Websocket server
        new WebsocketWorkerController();

        // Run worker
        Worker::runAll();

        return 0;
    }
}
