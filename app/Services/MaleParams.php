<?php

namespace App\Services;
use App\Services\AditionalParams;
class MaleParams extends AditionalParams 
{
    function __construct(
        protected int $ability,
        protected int $lucky,
        protected int $strength,
        protected int $speed,
          
    ) {
        parent::__construct($ability, $lucky);
        $this->strength = $strength;
        $this->speed = $speed;
    }
}
