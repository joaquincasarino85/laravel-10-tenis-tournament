<?php

namespace App\Services;
use App\Services\Draw;
use App\Services\FemaleParams;
use App\Services\MaleParams;
use App\Services\Player;

class TenisTournamentService  
{
    public function configureAndPlay(){

        $players = [];
        for ($i=0; $i < config('app')['tournament']['playersCount']; $i++) { 
            switch (config('app')['tournament']['type']) {
                case 'F':
                    $aditionalParamObj = new FemaleParams(rand(1,9),rand(1,9),rand(1,9));
                    break;
                case 'M':
                    $aditionalParamObj = new FemaleParams(rand(1,9),rand(1,9),rand(1,9),rand(1,9));
                    break;
            }

            $playerObj = new Player('Player '.$i, $aditionalParamObj);
            $players[] = $playerObj;
        }
        $draw = (new Draw($players))();
        $draw->prepareDraw();
    }

}
