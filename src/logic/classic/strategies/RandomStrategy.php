<?php

namespace app\logic\classic\strategies;

use app\logic\classic\variants\PaperVariant;
use app\logic\classic\variants\RockVariant;
use app\logic\classic\variants\ScissorsVariant;
use app\logic\IStrategy;
use app\logic\IVariant;

class RandomStrategy implements IStrategy
{
    /**
     * @return IVariant
     */
    public function getVariant() : IVariant
    {
        $all_variants = [
            new RockVariant(),
            new PaperVariant(),
            new ScissorsVariant(),
        ];
        $rand_key = array_rand($all_variants);
        return $all_variants[$rand_key];
    }
}