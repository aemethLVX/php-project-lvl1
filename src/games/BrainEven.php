<?php

namespace BrainGames\Games\BrainEven;

function run()
{
    $error = false;
    $questionsQ = 3;
    $randFrom = 1;
    $randTo = 100;
    $name = \BrainGames\Cli\welcome();

    for ($i = 0; $i < $questionsQ; ++$i) {
        $num = rand($randFrom, $randTo);
        if (!\BrainGames\Cli\checkNumber($num)) {
            $error = true;
            break;
        }
    }

    \BrainGames\Cli\showResult($error, $name);
}
