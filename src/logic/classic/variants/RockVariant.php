<?php

namespace app\logic\classic\variants;

use app\logic\IVariant;
use app\Outcomes;

class RockVariant implements IVariant
{
    public function compareTo(IVariant $other): Outcomes
    {
        if ($other instanceof ScissorsVariant) {
            return Outcomes::FIRST_WINS();
        }
        if ($other instanceof RockVariant) {
            return Outcomes::DRAW();
        }
        if ($other instanceof PaperVariant) {
            return Outcomes::SECOND_WINS();
        }
        throw new \LogicException('Unexpected variant');
    }
}
