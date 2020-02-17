<?php

namespace BrainGames\Games\BrainPrime;

function run($try, $from, $to)
{
    $error = false;
    $name = \BrainGames\Cli\welcome(
        'Answer "yes" if given number is prime. Otherwise answer "no".'
    );

    for ($i = 0; $i < $try; ++$i) {
        $num = rand($from, $to);
        $result = \BrainGames\Cli\isPrime($num);
        $answer = \BrainGames\Cli\getAnswer($num);

        if (!\BrainGames\Cli\checkAnswer($answer, $result)) {
            $error = true;
            break;
        }
    }

    \BrainGames\Cli\showResult($error, $name);
}
