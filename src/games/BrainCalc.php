<?php

namespace BrainGames\Games\BrainCalc;

function run()
{
    $message = 'What is the result of the expression?';
    \BrainGames\Cli\run($message, __NAMESPACE__);
}

function calc(int $first, int $second, int $type)
{
    $operations = getOperations();
    switch ($operations[$type]) {
        case '+':
            return $first + $second;
        case '-':
            return $first - $second;
        case '*':
            return $first * $second;
    }
}

function getOperations()
{
    return ['+', '-', '*'];
}

function step(array $conf)
{
    $first = rand($conf['from'], $conf['to']);
    $second = rand($conf['from'], $conf['to']);
    $operations = getOperations();
    $code = rand(0, count($operations) - 1);

    $question = "{$first} {$operations[$code]} {$second}";
    $answer = calc($first, $second, $code);
    return [
        'question' => $question,
        'answer' => $answer
    ];
}
