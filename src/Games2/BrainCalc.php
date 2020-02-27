<?php

namespace BrainGames\Games\BrainCalc;

use function BrainGames\Cli\execute;

function run()
{
    $message = 'What is the result of the expression?';

    $step = function ($conf) {
        $first = rand($conf['from'], $conf['to']);
        $second = rand($conf['from'], $conf['to']);
        $operations = ['+', '-', '*'];
        $type = $operations[rand(0, count($operations) - 1)];

        $question = "{$first} {$type} {$second}";
        $answer = calc($first, $second, $type);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    execute($message, $step);
}

function calc(int $first, int $second, string $type)
{
    switch ($type) {
        case '+':
            return $first + $second;
        case '-':
            return $first - $second;
        case '*':
            return $first * $second;
    }
}
