<?php

namespace app\logic\classic\variants;

use app\logic\IVariant;
use app\Outcomes;
use PHPUnit\Framework\TestCase;

class ScissorsVariantTest extends TestCase
{
    /**
     * @return array
     */
    public function providerCompareTo() : array
    {
        return [
            [
                'other' => new PaperVariant(),
                'expected_outcome' => Outcomes::FIRST_WINS(),
            ]
        ];
    }

    /**
     * @param \app\logic\IVariant $other
     * @param \app\Outcomes $expected_outcome
     * @dataProvider providerCompareTo
     */
    public function testCompareTo(IVariant $other, Outcomes $expected_outcome)
    {
        $scissors_variant = new ScissorsVariant();
        $this->assertEquals($expected_outcome, $scissors_variant->compareTo($other));
    }
}