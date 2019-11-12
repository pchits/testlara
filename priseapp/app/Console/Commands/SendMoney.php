<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Game;

class SendMoney extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'game:sendmoney {N}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send money prise';

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
    public function handle($N = 10)
    {
        //
        $games = Game::where('status', 'NEW')
                ->where('prise_type', 'money')
                ->take($N)
                ->get();

        $count = 0;

        foreach ($games as $g) {
            $g->send_money_to_user();
            $count++;
        }

        echo "Sent: $count prises";
    }
}
