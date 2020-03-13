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

    /**
     * @return array
     */
    public function simulate()
    {
        $outcomes = [];
        foreach ($this->getOutcomesInOrder() as $outcome) {
            $outcomes[static::getOutcomeKey($outcome)] = 0;
        }
        for ($i = 0; $i < $this->repeats; ++$i) {
            $player1_variant = $this->player1->getVariant();
            $player2_variant = $this->player2->getVariant();
            $outcome = $player1_variant->compareTo($player2_variant);
            $outcomes[static::getOutcomeKey($outcome)] += 1;
        }
        return $outcomes;
    }

    /**
     * @param \Symfony\Component\Console\Output\OutputInterface $output
     * @param array $outcomes
     */
    public function printResults(OutputInterface $output, array $outcomes)
    {
        $table = new Table($output);
        $rows = [];
        foreach ($this->getOutcomesInOrder() as $outcome) {
            $rows[] = [
                $outcome->getKey(),
                $outcomes[static::getOutcomeKey($outcome)],
                $outcomes[static::getOutcomeKey($outcome)] / $this->repeats * 100,
            ];
        }
        $table
            ->setHeaders(['Outcome', 'Total wins', '% of wins'])
            ->setRows($rows)
        ;
        $table->render();
    }

    /**
     * @return \app\Outcomes[]
     */
    protected function getOutcomesInOrder() : array
    {
        return [
            Outcomes::FIRST_WINS(),
            Outcomes::DRAW(),
            Outcomes::SECOND_WINS(),
        ];
    }

    /**
     * @param \app\Outcomes $outcome
     * @return mixed
     */
    public static function getOutcomeKey(Outcomes $outcome)
    {
        return $outcome->getKey();
    }
}