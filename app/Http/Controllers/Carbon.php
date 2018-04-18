<?php

namespace App\Http\Controllers;

class Carbon extends \DateTime
{
    public function now()
    {
        return new \DateTime('today');
    }
}

