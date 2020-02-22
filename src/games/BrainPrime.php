<?php

namespace BrainGames\Games\BrainPrime;

function run()
{
    $message = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    \BrainGames\Cli\run($message, __NAMESPACE__);
}

function isPrime(int $num)
{
    for ($x = 2; $x <= sqrt($num); ++$x) {
        if ($num % $x == 0) {
            return 'no';
        }
    }
    return 'yes';
}

function step(array $conf)
{
    $question = rand($conf['from'], $conf['to']);
    $answer = isPrime($question);
    return [
        'question' => $question,
        'answer' => $answer
    ];
}
