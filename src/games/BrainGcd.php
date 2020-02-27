<?php

namespace BrainGames\Games\BrainGcd;

use function BrainGames\Cli\execute;

function run()
{
    $message = 'Find the greatest common divisor of given numbers.';

    $step = function ($conf) {
        $first = rand($conf['from'], $conf['to']);
        $second = rand($conf['from'], $conf['to']);
        $question = "{$first} {$second}";
        $answer = gcd($first, $second);
        return [
            'question' => $question,
            'answer' => $answer
        ];
    };

    execute($message, $step);
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
