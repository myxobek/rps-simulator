<?php

namespace app\logic\classic\strategies;

use app\logic\classic\variants\PaperVariant;
use PHPUnit\Framework\TestCase;

class OnlyPaperStrategyTest extends TestCase
{
    public function testGetVariant()
    {
        $strategy = new OnlyPaperStrategy();
        for ($i = 0; $i < 10; ++$i) {
            $variant = $strategy->getVariant();
            $this->assertEquals(get_class($variant), PaperVariant::class);
        }
    }
}
