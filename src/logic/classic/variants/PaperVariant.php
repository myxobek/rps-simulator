<?php

namespace app\logic\classic\variants;

use app\logic\IVariant;
use app\Outcomes;

class PaperVariant implements IVariant
{
    public function compareTo(IVariant $other): Outcomes
    {
        if ($other instanceof RockVariant) {
            return Outcomes::FIRST_WINS();
        }
        if ($other instanceof PaperVariant) {
            return Outcomes::DRAW();
        }
        if ($other instanceof ScissorsVariant) {
            return Outcomes::SECOND_WINS();
        }
        throw new \LogicException('Unexpected variant');
    }
}
