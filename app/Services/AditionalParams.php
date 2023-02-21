<?php

namespace App\Services;

class AditionalParams  
{

    function __construct(
        protected int $ability,
        protected int $lucky,
    ) {}
}
