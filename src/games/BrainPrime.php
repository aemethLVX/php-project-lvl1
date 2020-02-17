<?php

namespace BrainGames\Games\BrainPrime;

function run($try, $from, $to)
{
    $error = false;
    $welcomeMessage = 'Answer "yes" if given number is prime. Otherwise answer "no".';
    $name = \BrainGames\Cli\welcome($welcomeMessage);

    for ($i = 0; $i < $try; ++$i) {
        $num = rand($from, $to);
        $res = \BrainGames\Cli\isPrime($num);
        $answer = \BrainGames\Cli\getAnswer($num);

        if (!\BrainGames\Cli\checkAnswer($answer, $res)) {
            $error = true;
            break;
        }
    }

    \BrainGames\Cli\showResult($error, $name);
}
