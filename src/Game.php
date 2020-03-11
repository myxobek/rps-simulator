<?php

namespace app;

use app\logic\IStrategy;
use Symfony\Component\Console\Helper\Table;
use Symfony\Component\Console\Output\OutputInterface;

class Game
{
    /**
     * @var IStrategy
     */
    private IStrategy $player1;

    /**
     * @var IStrategy
     */
    private IStrategy $player2;

    /**
     * @var int
     */
    private int $repeats;

    public function __construct(IStrategy $player1, IStrategy $player2, int $repeats)
    {
        $this->player1 = $player1;
        $this->player2 = $player2;
        $this->repeats = $repeats;
    }

    public function simulate()
    {
        $outcomes = [
            Outcomes::FIRST_WINS()->getValue() => 0,
            Outcomes::DRAW()->getValue() => 0,
            Outcomes::SECOND_WINS()->getValue() => 0,
        ];
        for ($i = 0; $i < $this->repeats; ++$i) {
            $player1_variant = $this->player1->getVariant();
            $player2_variant = $this->player2->getVariant();
            $outcome = $player1_variant->compareTo($player2_variant);
            $outcomes[$outcome->getValue()] += 1;
        }
        return $outcomes;
    }

    public function printResults(OutputInterface $output, array $outcomes)
    {
        $table = new Table($output);
        $table
            ->setHeaders(['Outcome', 'Total wins', '% of wins'])
            ->setRows([
                ['First player wins', $outcomes[Outcomes::FIRST_WINS()->getValue()], $outcomes[Outcomes::FIRST_WINS()->getValue()] / $this->repeats * 100],
                ['Draw', $outcomes[Outcomes::DRAW()->getValue()], $outcomes[Outcomes::DRAW()->getValue()] / $this->repeats * 100],
                ['Second player wins', $outcomes[Outcomes::SECOND_WINS()->getValue()], $outcomes[Outcomes::SECOND_WINS()->getValue()] / $this->repeats * 100],
            ])
        ;
        $table->render();
    }
}