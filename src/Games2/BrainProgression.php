<?php

namespace BrainGames\Games\BrainProgression;

use function BrainGames\Cli\execute;

function run()
{
    $message = 'What number is missing in the progression?';

    $step = function ($conf) {
        $length = 10;
        $diff = 2;
        $start = rand($conf['from'], $conf['to']);
        $removedKey = rand(0, $length - 1);
        $progression = getProgression($start, $length, $diff);
        $answer = $progression[$removedKey];
        $progression[$removedKey] = '..';
        $question = implode(' ', $progression);

        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    execute($message, $step);
}

function getProgression(int $start, int $length, int $diff)
{
    $result = [];
    for ($i = 0; $i < $length; ++$i) {
        $result[] = $start + $diff * $i;
    }
    return $result;
}
