<?php

namespace app\logic\classic\variants;

use app\logic\IVariant;
use app\Outcomes;
use PHPUnit\Framework\TestCase;

class PaperVariantTest extends TestCase
{
    /**
     * @return array
     */
    public function providerCompareTo() : array
    {
        return [
            [
                'other' => new RockVariant(),
                'expected_outcome' => Outcomes::FIRST_WINS(),
            ],
            [
                'other' => new PaperVariant(),
                'expected_outcome' => Outcomes::DRAW(),
            ],
            [
                'other' => new ScissorsVariant(),
                'expected_outcome' => Outcomes::SECOND_WINS(),
            ],
        ];
    }

    /**
     * @param \app\logic\IVariant $other
     * @param \app\Outcomes $expected_outcome
     * @dataProvider providerCompareTo
     */
    public function testCompareTo(IVariant $other, Outcomes $expected_outcome)
    {
        $paper_variant = new PaperVariant();
        $this->assertEquals($expected_outcome, $paper_variant->compareTo($other));
    }
}