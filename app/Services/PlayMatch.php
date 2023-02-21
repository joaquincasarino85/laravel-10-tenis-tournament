<?php

namespace App\Services;

class PlayMatch  
{

    function __construct(
        public Player $p1,
        public Player $p2,
    ) {}

    public function getWinner(){

        $aditionalParamP1 = (array)$this->p1->aditionalParams;
        $aditionalParamP2 = (array)$this->p2->aditionalParams;

        foreach ($aditionalParamP1 as $key => $value) {
           if($value < $aditionalParamP2[$key]){
                return $this->p1;
           }
           elseif($value > $aditionalParamP2[$key]){
                return $this->p2;
           }
        }

        return rand(0, 1) ? $this->p1 : $this->p2;
    }

}
