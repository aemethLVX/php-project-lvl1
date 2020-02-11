<?php

namespace BrainGames\Games\BrainCalc;

function run($questions, $randFrom, $randTo)
{
    $error = false;
    $name = \BrainGames\Cli\welcome('What is the result of the expression?');

    for ($i = 0; $i < $questions; ++$i) {
        $code = rand(0, 2);
        $first = rand($randFrom, $randTo);
        $second = rand($randFrom, $randTo);
        $operations = \BrainGames\Cli\getOperations();

        $question = "{$first} {$operations[$code]} {$second}";
        $result = \BrainGames\Cli\calc($first, $second, $code);
        $answer = \BrainGames\Cli\getAnswer($question);

        if (!\BrainGames\Cli\checkAnswer($answer, $result)) {
            $error = true;
            break;
        }
    }

    \BrainGames\Cli\showResult($error, $name);
}
