<?php

namespace BrainGames\Games\BrainGcd;

function run()
{
    $message = 'Find the greatest common divisor of given numbers.';
    \BrainGames\Cli\run($message, __NAMESPACE__);
}

function gcd(int $a, int $b)
{
    while ($a != $b) {
        if ($a > $b) {
            $a -= $b;
        } else {
            $b -= $a;
        }
    }
    return $a;
}

function step(array $conf)
{
    $first = rand($conf['from'], $conf['to']);
    $second = rand($conf['from'], $conf['to']);
    $question = "{$first} {$second}";
    $answer = gcd($first, $second);
    return [
        'question' => $question,
        'answer' => $answer
    ];
}
