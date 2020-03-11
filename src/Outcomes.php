<?php

namespace app;

use MyCLabs\Enum\Enum;

/**
 * @method static Outcomes FIRST_WINS()
 * @method static Outcomes DRAW()
 * @method static Outcomes SECOND_WINS()
 */
class Outcomes extends Enum
{
    private const FIRST_WINS = 'first_wins';
    private const DRAW = 'draw';
    private const SECOND_WINS = 'second_wins';
}