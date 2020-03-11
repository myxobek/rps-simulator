<?php

namespace app\logic;

use app\Outcomes;

interface IVariant
{
    /**
     * @param \app\logic\IVariant $other
     * @return Outcomes
     */
    public function compareTo(IVariant $other) : Outcomes;
}
