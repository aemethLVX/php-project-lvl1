<?php

namespace BrainGames\Games\BrainGcd;

function run($questions, $randFrom, $randTo)
{
    $error = false;
    $name = \BrainGames\Cli\welcome('Find the greatest common divisor of given numbers.');

    for ($i = 0; $i < $questions; ++$i) {
        $first = rand($randFrom, $randTo);
        $second = rand($randFrom, $randTo);

        $question = "{$first} {$second}";
        $result = \BrainGames\Cli\gcd($first, $second);
        $answer = \BrainGames\Cli\getAnswer($question);

        if (!\BrainGames\Cli\checkAnswer($answer, $result)) {
            $error = true;
            break;
        }
    }

    \BrainGames\Cli\showResult($error, $name);
}
