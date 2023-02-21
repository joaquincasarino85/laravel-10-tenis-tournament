<?php

namespace App\Services;
use App\Services\AditionalParams;
class FemaleParams extends AditionalParams 
{
    function __construct(
        protected int $ability,
        protected int $lucky,
        protected int $reactionTime,
    ) {
        parent::__construct($ability, $lucky);
        $this->reactionTime = $reactionTime;
    }
}
