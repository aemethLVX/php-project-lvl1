<?php

namespace BrainGames\Games\BrainPrime;

use function BrainGames\Cli\execute;

function run()
{
    $message = 'Answer "yes" if given number is prime. Otherwise answer "no".';

    $step = function ($conf) {
        $question = rand($conf['from'], $conf['to']);
        $answer = isPrime($question) ? 'yes' : 'no';
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    execute($message, $step);
}

function isPrime(int $num)
{
    for ($x = 2; $x <= sqrt($num); ++$x) {
        if ($num % $x == 0) {
            return false;
        }
    }
    return true;
}

function step(array $conf)
{
    $question = rand($conf['from'], $conf['to']);
    $answer = isPrime($question) ? 'yes' : 'no';
    return [
        'question' => $question,
        'answer' => $answer
    ];
}
