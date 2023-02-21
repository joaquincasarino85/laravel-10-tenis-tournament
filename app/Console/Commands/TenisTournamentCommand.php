<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Services\TenisTournamentService;

class TenisTournamentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenis-tournament';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Welcome to the Tenis Tournament';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        echo $this->description;
        $type = $this->ask('Female or Male tournament (F-M):');
        if($type != 'F' && $type != 'M'){
            echo 'Is not a valid option of tournament';
            return ;
        }
        $playersCount = $this->ask('How many players (4, 8, 16, 32, 64):');
        if(!in_array($playersCount, [4, 8, 16, 32, 64])){
            echo 'Is not a valid option of players';
            return ;
        }

        config()->set('app.tournament',[
            'type' => $type, 
            'playersCount' => $playersCount]);

        $service = app('tenisTournamentService');
        $service->configureAndPlay();
    }
}
