<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class CleanupAbandonedCartsCommand extends Command
{
    protected $signature = 'cart:cleanup';
    protected $description = 'Cleanup abandoned guest carts';

    public function handle()
    {
        $this->info('Cleaning up abandoned guest carts...');

        DB::table('sessions')
            ->where('last_activity', '<', Carbon::now()->subDays(7)->getTimestamp())
            ->delete();

        $this->info('Cleanup completed.');
    }
}