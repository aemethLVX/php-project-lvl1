<?php

namespace BrainGames\Games\BrainPrime;

function run($questions, $randFrom, $randTo)
{
    $error = false;
    $name = \BrainGames\Cli\welcome('Answer "yes" if given number is prime. Otherwise answer "no".');

    for ($i = 0; $i < $questions; ++$i) {
        $num = rand($randFrom, $randTo);
        $result = \BrainGames\Cli\isPrime($num);
        $answer = \BrainGames\Cli\getAnswer($num);

        if (!\BrainGames\Cli\checkAnswer($answer, $result)) {
            $error = true;
            break;
        }
    }

    \BrainGames\Cli\showResult($error, $name);
}
