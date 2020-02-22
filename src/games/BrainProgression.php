<?php

namespace BrainGames\Games\BrainProgression;

function run()
{
    $message = 'What number is missing in the progression?';
    \BrainGames\Cli\run($message, __NAMESPACE__);
}

function getProgression(int $start, int $length, int $step)
{
    $result = [];
    for ($i = 0, $a = $start; $i < $length; ++$i, $a += $step) {
        $result[] = $a;
    }
    return $result;
}

function step(array $conf)
{
    $start = rand($conf['from'], $conf['to']);
    $removedKey = rand(0, $conf['length'] - 1);
    $progression = getProgression($start, $conf['length'], $conf['step']);
    $answer = $progression[$removedKey];
    $progression[$removedKey] = '..';
    $question = implode(' ', $progression);

    return [
        'question' => $question,
        'answer' => $answer
    ];
}
