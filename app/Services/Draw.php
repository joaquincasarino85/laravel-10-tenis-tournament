<?php

namespace App\Services;
use App\Services\PlayMatch;
class Draw  
{
    public int $totalRounds;
    public int $levelDraw;
    protected array $match;
    protected array $winner;

    function __construct(
        protected array $people
    ) {}

    function __invoke()
    {
        $this->totalRounds();
        shuffle($this->people);
        return $this;
    }

    protected function totalRounds(){
        $this->totalRounds = 0;
        $size = count($this->people);
        while(($size = $size / 2) != 1){
            $this->totalRounds++;
        }
    }

    public function prepareDraw(){
        $this->levelDraw = $this->levelDraw ?? 0;
        foreach($this->people as $k => $v){
            if($k % 2 == 1){
                $this->match[] = new PlayMatch($this->people[$k-1], $this->people[$k]); 
            }
        }
        echo "Matches of round: ".$this->levelDraw."\n";
        foreach ($this->match as $v) {
            echo "-".$v->p1->name." vs ".$v->p2->name." => ".$v->getWinner()->name."\n";
        }
        unset($this->people);
        foreach ($this->match as $v) {
            $this->people[] = $v->getWinner();
        }
        unset($this->match);
        $this->levelDraw++;
        if($this->levelDraw <= $this->totalRounds){
            $this->prepareDraw();
        }
    }

    protected function playLevelDraw(){
        $winner = [];
        foreach($this->match as $match){
            $winner[] = $match->getWinner();
        }
        $this->levelDraw++;
        return $winner;
    }
}
