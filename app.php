<?php
require __DIR__ . '/vendor/autoload.php';

use Symfony\Component\Console\Application;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

$app = new Application('simulate', '1.0.0');

$app
    ->register('simulate')
    ->addOption('repeats', null, InputOption::VALUE_REQUIRED, 'Total number of rounds', 100)
    ->setCode(function (InputInterface $input, OutputInterface $output) {
        $player1 = new \app\logic\classic\strategies\OnlyPaperStrategy();
        $player2 = new \app\logic\classic\strategies\RandomStrategy();
        $repeats = $input->getOption('repeats');
        $game = new \app\Game($player1, $player2, $repeats);
        $outcomes = $game->simulate();
        $game->printResults($output, $outcomes);
    })
    ->getApplication()
    ->setDefaultCommand('simulate', true)
    ->run();