<?php

namespace app\logic\classic\strategies;

use app\logic\classic\variants\PaperVariant;
use app\logic\IVariant;
use app\logic\IStrategy;

class OnlyPaperStrategy implements IStrategy
{
    /**
     * @return IVariant
     */
    public function getVariant() : IVariant
    {
        return new PaperVariant();
    }
}