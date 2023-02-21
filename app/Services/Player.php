<?php

namespace App\Services;

class Player  
{

    function __construct(
        public string $name,
        public AditionalParams $aditionalParams
    ) {}
}
