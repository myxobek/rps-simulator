<?php

namespace app;

use app\logic\classic\strategies\OnlyPaperStrategy;
use PHPUnit\Framework\TestCase;
use Symfony\Component\Console\Output\BufferedOutput;
use Symfony\Component\Console\Output\ConsoleOutput;
use Symfony\Component\Console\Tests\Output\TestOutput;

class GameTest extends TestCase
{
    /**
     * @return array
     */
    public function providerSimulatePaperVsPaper() : array
    {
        return [
            [
                'repeats' => 1,
                'expected_draw_outcomes' => 1,
            ],
            [
                'repeats' => 10,
                'expected_draw_outcomes' => 10,
            ],
            [
                'repeats' => 100,
                'expected_draw_outcomes' => 100,
            ],
        ];
    }

    /**
     * @dataProvider providerSimulatePaperVsPaper
     * @param int $repeats
     * @param int $expected_draw_outcomes
     */
    public function testSimulatePaperVsPaper(int $repeats, int $expected_draw_outcomes)
    {
        $player1 = new OnlyPaperStrategy();
        $player2 = new OnlyPaperStrategy();
        $game = new Game($player1, $player2, $repeats);
        $outcomes = $game->simulate();
        $this->assertArrayHasKey(Game::getOutcomeKey(Outcomes::DRAW()), $outcomes);
        $this->assertEquals($expected_draw_outcomes, $outcomes[Game::getOutcomeKey(Outcomes::DRAW())]);
        $this->assertEquals(0, $outcomes[Game::getOutcomeKey(Outcomes::FIRST_WINS())]);
        $this->assertEquals(0, $outcomes[Game::getOutcomeKey(Outcomes::SECOND_WINS())]);
    }

    public function testRender()
    {
        $player1 = new OnlyPaperStrategy();
        $player2 = new OnlyPaperStrategy();
        $game = new Game($player1, $player2, 1);
        $outcomes = $game->simulate();

        $output = new BufferedOutput();
        $game->printResults($output, $outcomes);
        $console_output = $output->fetch();
        foreach (Outcomes::keys() as $outcome_key) {
            $this->assertStringContainsString($outcome_key, $console_output);
        }
    }
}
