<?php

namespace app\logic\classic\strategies;

use app\logic\classic\variants\PaperVariant;
use app\logic\classic\variants\RockVariant;
use app\logic\classic\variants\ScissorsVariant;
use PHPUnit\Framework\TestCase;

class RandomStrategyTest extends TestCase
{
    public function testGetVariant()
    {
        $strategy = new RandomStrategy();
        for ($i = 0; $i < 10; ++$i) {
            $variant = $strategy->getVariant();
            $this->assertContains(get_class($variant), [
                RockVariant::class,
                PaperVariant::class,
                ScissorsVariant::class,
            ]);
        }
    }
}
